@extends('layouts.app')

@section('content')
    <section class="container pt-5 mt-5">
        <div class="row">
            <!-- List group -->
            <div class="list-group col-4" id="myList" role="tablist">

                {{--@foreach()--}}
                <a class="list-group-item list-group-item-action active " data-toggle="list" href="#message"
                   role="tab">{{--Nom du contact--}}Valentin </a>
                {{--@endforeach--}}

            </div>

            <!-- Tab panes -->
            <div class="tab-content col-8 message-content">

                {{--foreach des message--}}
                {{--@foreach()--}}
                <div class="tab-pane active" id="message" role="tabpanel">
                    {{--liste des messages--}}
                </div>
                {{--@endforeach--}}

            </div>
        </div>
    </section>
@endsection

