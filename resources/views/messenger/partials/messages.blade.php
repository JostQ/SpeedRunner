<div class="media mb-5">
    <a class="pull-left mr-3" href="#">
        <img src={{ asset('/avatars/'.$message->user->infos->picture) }} ?s=64"
             alt="{{ $message->user->name }}" class="rounded-circle img-thumbnail img-fluid mx-2 imgprofil">
    </a>
    <div class="media-body">
        <h5 class="media-heading">{{ $message->user->name }}</h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>