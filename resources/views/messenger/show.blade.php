@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-5">
        @include('messenger.partials.header')
        <div class="col-12 mx-auto">
            <h1>{{ $thread->subject }}</h1>
            @each('messenger.partials.messages', $thread->messages, 'message')

            @include('messenger.partials.form-message')
        </div>
    </div>
@stop
