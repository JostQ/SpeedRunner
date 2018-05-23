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
            <div class="col-4">
                <div class="row">

                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">

            <div class="col-7 ">
                <div class="row">
                    <textarea class="form-control" placeholder="Exprimez-vous..." rows="2"></textarea>
                </div>
            </div>
            <div class="col-1">
                <div class="row justify-content-center mt-2">
                    <button type="submit" id="publi" class="btn btn-primary">Publier
                    </button>
                </div>
            </div>
            </form>
        </div>
    </section>
@endsection

