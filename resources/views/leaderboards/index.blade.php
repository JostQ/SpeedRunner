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
            <td>{{$user->firstname}}</td>
            <td>{{$user->level}}</td>
            <td>{{$user->exp}}</td>
            <td>{{$user->average_speed}}</td>
            <td>{{$user->total_distance}}</td>
        </tr>
    @endforeach
    </tbody>
</table>