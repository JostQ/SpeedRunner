<table class="table">
    <thead>
        <tr>
            <td>Pseudo</td>
            <td>Niveau</td>
            <td>Expérience</td>
            <td>Vitesse Moyenne</td>
            <td>Distance totale</td>
        </tr>
    </thead>
    <tbody>
    @foreach($leaderboards as $user)
        <tr>
            <td><a href="{{url('/profile')}}/{{$user->users_id}}">{{DB::table('users')->where('id', $user->users_id)->get()[0]->name}}</a></td>
            <td>{{$user->level}}</td>
            <td>{{$user->exp}}</td>
            <td>{{ round($user->average_speed, 2) }}</td>
            <td>{{ round($user->total_distance, 2) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>