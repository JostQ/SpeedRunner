@extends('layouts.app')

@section('content')
    {{--file d'actu--}}
    <section class="container pt-5 mt-5">
        <div class="row justify-content-center">

            <div class="container">
                <div class="row  col-12">
                    @if($errors->has('message'))
                        <div class="alert alert-warning" role="alert">
                            {{ $errors->first('message') }}<i class="far fa-times-circle ml-1"></i>
                        </div>
                    @endif
                        @if($errors->has('picture'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('picture') }}<i class="far fa-times-circle ml-1"></i>
                            </div>
                        @endif
                    @if(isset($success))
                        <div class="alert alert-success" role="alert">
                            {{ $success }}<i class="far fa-check-circle ml-1"></i>
                        </div>
                    @endif
                </div>
            </div>

            <nav class="actu col-12">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">

                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                       role="tab" aria-controls="nav-home" aria-selected="true">#Général</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                       role="tab" aria-controls="nav-profile" aria-selected="false">#Amis</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                       role="tab" aria-controls="nav-contact" aria-selected="false">#Ligue</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary " data-toggle="modal" data-target="#Modal">
                        Créer une publication
                        <i class="fas fa-pencil-alt ml-1"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalLabel">Publication <i class="far fa-edit"></i></h5>
                                    <label for="custom-file-input" id="custom" class="btn btn-primary ml-1">Image<i
                                                class="far fa-images ml-1"></i></label>

                                    <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" name="statut" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <textarea class="form-control" id="message-text" placeholder="Exprimez-vous..."
                                                  name="message" required></textarea>
                                        <input type="file" name="picture" id="custom-file-input" class="join-file">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Publier
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

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(function () {
            $('#custom-file-input').on('change', function () {
                console.log($(this).val())
            })
        })
    </script>

@endsection