<nav class="nav navbar">
    <a class="btn btn-outline-primary speedrun-primary" href="{{route('messages.create')}}">Nouveau message</a>
    @if (!(Request::is('messages')))
        <a class="btn btn-outline-primary nav-item speedrun-primary" href="{{route('messages')}}">Boite de réception</a>
    @endif
</nav>