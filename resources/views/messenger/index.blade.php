@extends('layouts.app')

@section('content')
    <section class="container pt-5 mt-5">
        <div class="row">
            <!-- List group -->
            <div class="list-group col-4" id="myList" role="tablist">

                @foreach($friends as $friend)
                <a class="list-group-item list-group-item-action  " data-toggle="list" href="#message{{$friend['id']}}"
                   role="tab">{{$friend->users->infos['lastname']}}</a>
                @endforeach

            </div>

            <!-- Tab panes -->
            <div class="tab-content col-8 message-content">

                {{--foreach des message--}}
                @foreach($messages as $message)
                <div class="tab-pane " id="message" role="tabpanel">
                    {{$message['message']}}
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection

