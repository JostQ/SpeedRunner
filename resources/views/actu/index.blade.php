<div class="container">
    <div class="row col-12">
        @if($errors->has('message'))
            <div class="alert alert-warning" role="alert">
                {{ $errors->first('message') }}<i
                        class="far fa-times-circle ml-1"></i>
            </div>
        @endif
        @if($errors->has('picture'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('picture') }}<i
                        class="far fa-times-circle ml-1"></i>
            </div>
        @endif
        @if(isset($success))
            <div class="alert alert-success" role="alert">
                {{ $success }}<i class="far fa-check-circle ml-1"></i>
            </div>
        @endif
    </div>
</div>

{{--Navigation entre les canaux actualité--}}
@if(\Illuminate\Support\Facades\Request::is('actu'))
    <div class="container">
        <div class="row">
            <nav class="actu col-md-3 col-sm-12">
                <div class="nav nav-pills flex-column" id="nav-tab" role="tablist">
                    <a class="nav-link active" id="nav-home-tab"
                       data-toggle="tab" href="#nav-home"
                       role="tab" aria-controls="nav-home"
                       aria-selected="true">#Général</a>
                    <a class="nav-link" id="nav-contact-tab" data-toggle="tab"
                       href="#nav-contact"
                       role="tab" aria-controls="nav-contact" aria-selected="false">#Ligue</a>
                    <button class="btn btn-outline-primary text-truncate mt-3"
                            data-toggle="modal" data-target="#Modal">
                        Créer une publication
                        <i class="fas fa-pencil-alt ml-1"></i>
                    </button>
                </div>


                {{--Bouton de pop de la fenêtre modale--}}
                @endif
            </nav>
            {{--Fil général--}}

            <div class="tab-content @if(\Illuminate\Support\Facades\Request::is('actu/*')) {{'col-12'}} @else col-md-9 col-sm-12  @endif "
                 id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                     aria-labelledby="nav-home-tab">
                    @foreach($generales as $generale)
                        <div class="card mb-4" data-id="{{ $generale->users->id }}">
                            <div class="card-header">
                                <div class="row">
                                    <img src="{{asset('/avatars/')}}/@if(isset($generale->users->infos->picture)){{$generale->users->infos->picture}}@else{{'girlrun4.jpg'}}@endif"
                                         alt="profilPict"
                                         class="rounded-circle img-thumbnail img-fluid mx-2 actuPic"
                                         style="width: 75px;height:75px; object-fit: cover">
                                    <div>
                                        <p>{{strtoupper(substr($generale->users->name, 0, 1)) . substr($generale->users->name, 1)}}</p>
                                        <h5 class="card-title speedrun-title">{{--$namePost--}}</h5>
                                        <p>Posté le : {{$generale->created_at}}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <p class="card-text ml-3">{{$generale->message}}</p>
                                    @if($generale->picture !== null)
                                        <div class="col-12">
                                            <div class="row">
                                                <img src="{{asset('thumbnails') . '/'  . $generale->picture }}"
                                                     alt="image">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{--Fil ligue--}}
                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                     aria-labelledby="nav-contact-tab">
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
                                <p class="card-text">Sed ut perspiciatis unde omnis iste
                                    natus error sit
                                    voluptatem
                                    accusantium doloremque laudantium, totam rem
                                    aperiam, eaque ipsa quae ab
                                    illo
                                    inventore veritatis et quasi architecto beatae vitae
                                    dicta sunt
                                    explicabo.{{--Statut des utilisateurs--}}</p>
                            </div>
                        </div>
                    </div>
                    {{--@endforeach--}}
                </div>
            </div>
        </div>
    </div>



