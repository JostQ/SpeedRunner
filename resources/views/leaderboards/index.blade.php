<table class="table mt-3">
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
            <td>{{ round($user->average_speed, 2) }}</td>
            <td>{{ round($user->total_distance, 2) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>