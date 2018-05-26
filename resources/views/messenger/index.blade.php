@extends('layouts.app')

@section('content')

    <div class="container mt-5 pt-5">
        @include('messenger.partials.header')
        @include('messenger.partials.flash')
        @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
    </div>
@stop
