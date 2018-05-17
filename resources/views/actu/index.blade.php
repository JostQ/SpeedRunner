@extends('layouts.app')

@section('content')
    {{--file d'actu--}}
    <section class="container pt-5 mt-5">
        <div class="row justify-content-center">
            <nav class="actu col-12">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">

                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                       role="tab" aria-controls="nav-home" aria-selected="true">#Général</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                       role="tab" aria-controls="nav-profile" aria-selected="false">#Amie</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                       role="tab" aria-controls="nav-contact" aria-selected="false">#Ligue</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary " data-toggle="modal" data-target="#Modal">
                        <i class="fas fa-pencil-alt"></i>
                        Créer une publication
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">Publication <i class="far fa-edit"></i></h5>
                                    <button id="bilal" class="btn btn-primary ml-3">Image <i class="far fa-images"></i></button>

                                    <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('/post-status')}}" method="post" name="statut">
                                    @csrf
                                <div class="modal-body">

                                    <textarea class="form-control" id="message-text" placeholder="Exprimez-vous..." name="message"></textarea>
                                    <input type="file" name="picture" id="inputImg">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Publier
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </nav>

            {{--file générale--}}

            <div class="tab-content col-12" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                     aria-labelledby="nav-home-tab">
                    @foreach($generales as $generale)
                        <div class="card ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="{{--img dans le bdd--}}" alt="profilPict">
                                    </div>
                                    <div class="col-10">
                                        <h5 class="card-title speedrun-title">Lorem
                                            Ipsum{{--pseudo des utilisateurs--}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="card-text">{{$generale->message}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                {{--file amie--}}
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    {{--@foreach()--}}
                    <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <img src="{{--img dans le bdd--}}" alt="profilPict">
                                </div>
                                <div class="col-10">
                                    <h5 class="card-title speedrun-title">Lorem
                                        Ipsum{{--pseudo des utilisateurs--}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit
                                    voluptatem
                                    accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                                    illo
                                    inventore veritatis et quasi architecto beatae vitae dicta sunt
                                    explicabo.{{--Statut des utilisateurs--}}</p>
                            </div>
                        </div>
                    </div>
                    {{--@endforeach--}}
                </div>

                {{--file ligue--}}
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    {{--@foreach()--}}
                    <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <img src="{{--img dans le bdd--}}" alt="profilPict">
                                </div>
                                <div class="col-10">
                                    <h5 class="card-title speedrun-title">Lorem
                                        Ipsum{{--pseudo des utilisateurs--}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit
                                    voluptatem
                                    accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                                    illo
                                    inventore veritatis et quasi architecto beatae vitae dicta sunt
                                    explicabo.{{--Statut des utilisateurs--}}</p>
                            </div>
                        </div>
                    </div>
                    {{--@endforeach--}}
                </div>
            </div>
        </div>
    </section>

@endsection

@section('page-specific-scripts')
    <script defer>
        $( document ).ready(function() {
            $('#btn-file').click(function(e){
                alert('test')
                e.preventDefault();
                //$('#inputImg').click();
            });

        });
    </script>
@endsection

