<?php

namespace App\Http\Controllers;

use App\Model\Gpx;
use App\Model\Info;
use App\Model\Race;
use App\Model\Waypoint;
use Validator;
use App\Model\Success;
use App\Model\SuccessHasUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GpxController extends Controller
{


    public function index()
    {
        $numberOfRacesDone = Race::where('users_id', Auth::user()->id)->count();
        return view('gpx.index')
            ->with('numberOfRacesDone', $numberOfRacesDone);
    }

    public function add(Request $request)
    {

        $rules = [
            'gpxFile' => 'required|max:1024',
            'raceName' => 'required'
        ];

        $messages = [
            'gpxFile.required' => 'Fichier GPX manquant',
            'gpxFile.mimes' => 'Extension de fichier accepté : GPX - XML',
            'gpxFile.size' => 'Taille du fichier maximum autorisé 1Mo',
            'raceName.required' => 'Nom de la course manquant'
        ];


        if (!empty($request->gpxFile)){
            $gpx = $request->gpxFile;
            if($gpx->getClientOriginalExtension() !== 'gpx' && $gpx->getClientOriginalExtension() !== 'xml'){
                $error = $messages['gpxFile.mimes'];
            }
        }



        $validator = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails() || isset($error)){
            $jsonError = ['status' => 'KO', 'errors' => $validator->errors()];
            if(isset($error)){
                $jsonError['mimes'] = $error;
            }
            return json_encode($jsonError);
        }

        $gpxName = time() . '.xml';
        $request->file('gpxFile')->move(public_path('/gpxFile/gpx_name'), $gpxName);

        $xmlFile = simplexml_load_file(public_path('/gpxFile/gpx_name') . '/' . $gpxName);

        $jsonEncode = json_encode($xmlFile);

        $jsonDecode = json_decode($jsonEncode, true);

        $start = [];
        $end = [];
        $waypoints = [];
        $count = count($jsonDecode['trk']['trkseg']['trkpt']);
        $j = 0;
        $percentage = 0.0875;
        $g = $percentage;

        $date = new \DateTime($jsonDecode['metadata']['time']);
        $date = $date->format('d-m-Y');

        for ($i = 0; $i < $count; $i++) {

            $lat = $jsonDecode['trk']['trkseg']['trkpt'][$i]['@attributes']['lat'];
            $lon = $jsonDecode['trk']['trkseg']['trkpt'][$i]['@attributes']['lon'];

                // Récupération des données de départ
            if ($i === 0) {
                $startTime = new \DateTime($jsonDecode['trk']['trkseg']['trkpt'][$i]['time']);
                $start['time'] = $startTime->format('U');
                $start['lat'] = $lat;
                $start['lon'] = $lon;
            }

                // Récupération des données de quelques Waypoints
            if ($i === intval($count * $g)) {
                $wayTime = new \DateTime($jsonDecode['trk']['trkseg']['trkpt'][$i]['time']);
                $waypoints[$j]['time'] = $wayTime->format('U');
                $waypoints[$j]['lat'] = $lat;
                $waypoints[$j]['lon'] = $lon;
                $j++;
                $g = $g + $percentage;
            }

                // Récupération des données de fin
            if ($i === $count - 1) {
                $endTime = new \DateTime($jsonDecode['trk']['trkseg']['trkpt'][$i]['time']);
                $end['time'] = $endTime->format('U');
                $end['lat'] = $lat;
                $end['lon'] = $lon;
            }
        }

        // Ajout des données GPX dans la DB
        $json = ['status' => 'ok', 'start' => $start, 'waypoints' => $waypoints, 'end' => $end, 'date' => $date];


        $addGpx = new Gpx();

        $addGpx->startLat = $start['lat'];
        $addGpx->startLon = $start['lon'];
        $addGpx->startTime = $start['time'];
        $addGpx->endLat = $end['lat'];
        $addGpx->endLon = $end['lon'];
        $addGpx->endTime = $end['time'];
        $addGpx->users_id = Auth::user()->id;

        $addGpx->save();

        foreach ($waypoints as $waypoint){

            $addWay = new Waypoint();

            $addWay->lat = $waypoint['lat'];
            $addWay->lon = $waypoint['lon'];
            $addWay->time = $waypoint['time'];
            $addWay->gpx_id = $addGpx->id;

            $addWay->save();
        }

        // Suppression du fichier XML
        unlink(public_path('/gpxFile/gpx_name') . '/'. $gpxName);

        if ($addGpx->save()){

            $json = [ 'status' => 'ok', 'start' => $start, 'waypoints' => $waypoints, 'end' => $end, 'date' => $date];

            return json_encode($json);
        }

        return json_encode(['status' => 'saveError']);

    }

    public function addRace(Request $request)
    {

        // Création d'une nouvelle trace
        $addRace = new Race();
        $addRace->name = $request->name;
        $addRace->time = $request->time;
        $addRace->speed = $request->speed;
        $addRace->date_done = $request->date_done;
        $addRace->distance_done = $request->distance_done;
        $addRace->users_id = Auth::user()->id;
        $addRace->gpx_id = Gpx::all()->last()->id;



        // Mise à jour des informations.

        $addInfo = Info::find(Auth::user()->id);
        $addInfo->total_distance = Race::where('users_id', '=', Auth::user()->id)->sum('distance_done');
        $addInfo->average_speed = Race::where('users_id', '=', Auth::user()->id)->avg('speed');



        // Calcul d'expérience
        $expPerKm = function ($km) {
            $exp = (round($km)) * 100;
            return $exp;
        };

        $userInfos = Info::find(Auth::user()->id);
        $userInfos->exp += $expPerKm($request->distance_done);

        $levels = [];
        $experienceNeeded = [];
        for ($i = 1; $i <= 100; $i++) {
            array_push($levels, $i);
            array_push($experienceNeeded, (($i - 1) + 100) * $i * 4);
        }
        // XP(n) = n-1+100 * n*4
        array_reverse($experienceNeeded);

        for ($i = 0; $i < count($levels); $i++) {
            if ($userInfos->exp >= $experienceNeeded[$i]) {
                $userInfos->level = $i + 1;
            }
        }

        // Calcul de la ligue

        $computeLeague = $userInfos->level / 5;

        $userInfos->leagues_id = 20 - floor($computeLeague);


        if($userInfos->save() && $addInfo->save() && $addRace->save()){
            $success = $this->success();

            return $success;
        }

        return json_encode(['status' => 'KO']);

    }

    public function success()
    {
        $authUserId = Auth::user()->id;
        $userInfos = Info::find($authUserId);
        $racesDone = Race::where('users_id', $authUserId)->get( );
        $successInfos = SuccessHasUser::where('users_id', Auth::user()->id)->pluck('success_id')->all();

        $avgSpeed = $userInfos->average_speed;
        $kmRun = $userInfos->total_distance;
        $numberOfRacesDone = count($racesDone);
        $successUnlocked = [];

        $unlocks = new SuccessHasUser();
        if ($avgSpeed >= 15) {
            if (array_search(4, $successInfos) === false) {
                $unlocks->users_id = $authUserId;
                $unlocks->success_id = 4;
                $unlocks->save();
                $successUnlocked[] = Success::find(4);
            }
        }

        if ($kmRun >= 50) {
            if (array_search(2, $successInfos) === false) {
                $unlocks->users_id = $authUserId;
                $unlocks->success_id = 2;
                $unlocks->save();
                $successUnlocked[] = Success::find(2);
            }
        }

        if ($numberOfRacesDone >= 50) {
            if (array_search(3, $successInfos) === false) {
                $unlocks->users_id = $authUserId;
                $unlocks->success_id = 3;
                $unlocks->save();
                $successUnlocked[] = Success::find(3);
            }
        }

        if ($numberOfRacesDone >= 5) {
            if (array_search(1, $successInfos) === false) {
                $unlocks->users_id = $authUserId;
                $unlocks->success_id = 1;
                $unlocks->save();
                $successUnlocked[] = Success::find(1);

            }
        }
        if(!empty($successUnlocked)) {
            return json_encode($successUnlocked);
        }
    }
}
