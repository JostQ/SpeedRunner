{{--@extends('layouts.app')--}}

{{--@section('content')--}}
    {{--file d'actu--}}
    <section id="actu" class="container pt-5 mt-5">
        <div class="row">
            <div class="col-12">
                <div class="container ajActu ">
                    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-ajStatue-tab" data-toggle="pill" href="#pills-ajStatue"
                               role="tab" aria-controls="pills-home" aria-selected="true">Créer une publication</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                               role="tab" aria-controls="pills-profile" aria-selected="false">Publier une Photo</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-ajStatue"
                             role="tabpanel" aria-labelledby="pills-ajStatue-tab">
                            <form action="{{ url('/status-textarea') }}" method="post"
                                  class="form-inline justify-content-center">
                                @csrf
                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Statut :</span>
                                        </div>


                                        <textarea class="form-control" aria-label="With textarea" name="statut"></textarea>
                                        <button type="submit" class="btn " value="ok" name="postStatue">Poster</button>
                                    </div>
                                </div>

                            </form>

                        </div>


                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                             aria-labelledby="pills-profile-tab">
                            <form action="{{ url('/upload-img') }}" method="post"
                                  class="form-inline justify-content-center">
                                @csrf
                                <div class="col-10">
                                    <div class="input-group">
                                        <div class="custom-file">

                                            <input type="file" class="custom-file-input" id="ajPhoto">
                                            <label class="custom-file-label" for="ajPhoto">Importer une image</label>

                                        </div>
                                        <div class="input-group-append">

                                            <button class="btn " type="button" name="postImg" value="ok">Publier
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mt-5">

                    <nav class="actu">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                               role="tab" aria-controls="nav-home" aria-selected="true">#Général</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                               role="tab" aria-controls="nav-profile" aria-selected="false">#Amis</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                               role="tab" aria-controls="nav-contact" aria-selected="false">#Ligue</a>

                        </div>
                    </nav>

                    {{--file générale--}}
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">

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
            </div>
        </div>
    </section>

{{--@endsection--}}

