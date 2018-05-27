<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="card media alert {{ $class }}">
    <h4 class="media-heading">
        <a class="speedrun-primary" href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</h4>
    <p>
        <strong>Dernier message:</strong> {{ $thread->latestMessage['body'] }}
    </p>
    <p>
        <small><strong>Créateur:</strong> {{ $thread->creator()->name }}</small>
    </p>
    <p>
        <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
    </p>
</div>