<?php

namespace App\Http\Controllers;

use App\Model\Gpx;
use App\Model\Info;
use App\Model\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
//        $validatedData = $request->validate([
//            'gpxFile' => 'required|mimes:xml|'
//        ]);

        $gpxName = time() . '.xml';
        $request->file('gpxFile')->move(public_path('/gpxFile/gpx_name'), $gpxName);

        $xmlFile = simplexml_load_file(public_path('/gpxFile/gpx_name') . '/'. $gpxName);

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

        for ($i = 0; $i < $count; $i++){

            $lat = $jsonDecode['trk']['trkseg']['trkpt'][$i]['@attributes']['lat'];
            $lon = $jsonDecode['trk']['trkseg']['trkpt'][$i]['@attributes']['lon'];

            if ($i === 0){
                $startTime = new \DateTime($jsonDecode['trk']['trkseg']['trkpt'][$i]['time']);
                $start['time'] = $startTime->format('U');
                $start['lat'] = $lat;
                $start['lon'] = $lon;
            }

            if ($i === intval($count * $g)){
                $wayTime = new \DateTime($jsonDecode['trk']['trkseg']['trkpt'][$i]['time']);
                $waypoints[$j]['time'] = $wayTime->format('U');
                $waypoints[$j]['lat'] = $lat;
                $waypoints[$j]['lon'] = $lon;
                $j++;
                $g = $g + $percentage;
            }

            if ($i === $count - 1){
                $endTime = new \DateTime($jsonDecode['trk']['trkseg']['trkpt'][$i]['time']);
                $end['time'] = $endTime->format('U');
                $end['lat'] = $lat;
                $end['lon'] = $lon;
            }
        }

        $json = [ 'status' => 'ok', 'start' => $start, 'waypoints' => $waypoints, 'end' => $end, 'date' => $date];



        $addGpx = new Gpx();
        $addGpx->gpx = $gpxName;
        $addGpx->users_id = Auth::user()->id;

        $addGpx->save();

        return json_encode($json);
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

        $addRace->save();

        // Mise à jour des informations.

        $addInfo = Info::find(Auth::user()->id);
        $addInfo->total_distance = Race::where('users_id','=', Auth::user()->id)->sum('distance_done');
        $addInfo->average_speed = Race::where('users_id','=', Auth::user()->id)->avg('speed');

        $addInfo->save();

        // Calcul d'expérience
        $expPerKm = function($km) {
            $exp = (round($km))*100;
            return $exp;
        };

        $userInfos = Info::find(Auth::user()->id);
        $userInfos->exp += $expPerKm($request->distance_done);

        // Calcul du niveau

        // Deux tableaux
        // 1 tableau [1,2,3,4,5,6,7]
        // 2 tableau [100,200,400,800 etc]




            $levels = [];
            $experienceNeeded = [];
            for($i = 1; $i <= 100; $i++) {
                array_push($levels, $i);
                array_push($experienceNeeded, (($i-1) +100) * $i*4 );
            }
            // XP(n) = n-1+100 * n*4
            array_reverse($experienceNeeded);

            for($i = 0; $i < count($levels); $i++) {
                if($userInfos->exp >= $experienceNeeded[$i]) {
                    $userInfos->level = $i+1;
                }
            }

        // Calcul de la ligue

        $computeLeague = $userInfos->level / 5;

        $userInfos->leagues_id = 20 - floor($computeLeague);
        $userInfos->save();

    }
}
