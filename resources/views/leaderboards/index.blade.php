@foreach($leaderboards as $user)
    <div class="card mb-3">
        <div class="card-header">{{ $user->firstname }} Niveau : {{ $user->level }} Expérience : {{ $user->exp }} </div>
    </div>
@endforeach