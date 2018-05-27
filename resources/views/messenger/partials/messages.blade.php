<div class="col-lg-4 @if($message->user->id === \Illuminate\Support\Facades\Auth::id()) offset-lg-8 @endif">
    <div class="card text-white @if($message->user->id === \Illuminate\Support\Facades\Auth::id()) bg-primary @else bg-primary-muted @endif mb-3">
        <div class="card-header">
            <img src={{ asset('/avatars/'.$message->user->infos->picture) }} ?s=64"
                 alt="{{ $message->user->name }}"
                 class="rounded-circle img-thumbnail img-fluid mx-2 imgprofil">
            <h5 class="d-inline media-heading">{{ $message->user->name }}</h5>
        </div>
        <div class="card-body">
            <p>{{ $message->body }}</p>
        </div>
        <div class="card-footer">
            <div class="text-light">
                <small>Posté il y a {{ $message->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
</div>
