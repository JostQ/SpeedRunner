<div class="row">
    @foreach($listOfFriends as $friend)
        <div class="col-md-3 col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    @if(!empty($friend->user->infos->picture))
                        <img class="rounded-circle img-thumbnail m-2 imgprofil"
                             src="{{url('avatars/' . $friend->user->infos->picture)}}" alt="{{ $friend->user->name }}">
                        @else
                        <img class="rounded-circle img-thumbnail m-2 imgprofil"
                             src="{{asset('images/girlrun4.jpg')}}" alt="{{ $friend->user->name }}">
                    @endif

                    <a class="speedrun-primary" href="{{url('profile/'. $friend->user->id)}}">{{ $friend->user->name }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
