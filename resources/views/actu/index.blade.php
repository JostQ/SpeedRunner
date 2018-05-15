@extends('layouts.app')

@section('content')
    {{--file d'actu--}}
<section class="container">
    <div class="row">
        <div class="col-4">nav dans les options du file d'actu</div>
        <div class="col-8">
            <div class="container ajActu ">
                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-ajStatue-tab" data-toggle="pill" href="#pills-ajStatue" role="tab" aria-controls="pills-home" aria-selected="true">Créer une publication</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Publier une Photo</a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active justify-content-center" id="pills-ajStatue" role="tabpanel" aria-labelledby="pills-ajStatue-tab">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Statut :</span>
                            </div>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
                            <button type="submit" class="btn " value="ok" name="postStatue">Poster</button>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="ajPhoto">
                                <label class="custom-file-label" for="ajPhoto">Importer une image</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn " type="button" name="postImg" value="ok">Publier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="actu">
                    {{--@foreach()--}}
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title">{{--pseudo des utilisateurs--}}</h5>
                            <p class="card-text">{{--Statut des utilisateurs--}}</p>
                        </div>
                    </div>
                    {{--@endforeach--}}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
