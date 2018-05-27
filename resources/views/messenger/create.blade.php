@extends('layouts.app')

@section('content')
    <div class="container mt-5 pt-5">
        @include('messenger.partials.header')
        <form action="{{ route('messages.store') }}" method="post">
            @csrf
            <div class="col-md-6 mx-auto">
                <h1>Créez une nouvelle conversation</h1>
                <!-- Subject Form Input -->
                <div class="form-group">
                    <label>Sujet</label>
                    <input type="text" class="form-control" name="subject" placeholder="Sujet"
                           value="{{ old('subject') }}">
                </div>

                <!-- Message Form Input -->
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                </div>

                @if($users->count() > 0)
                    <label>Ajoutez des participants </label>
                    <div class="checkbox">
                        @foreach($users as $user)
                            <label class="mr-2" title="{{ $user->name }}">
                                <input class="mr-2" type="checkbox" name="recipients[]" value="{{ $user->id }}">
                                <span>{{ $user->name }}</span>
                            </label>
                        @endforeach
                    </div>
            @endif

            <!-- Submit Form Input -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>
            </div>
        </form>
    </div>
@stop
