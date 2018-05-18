{{--@extends('layouts.app')--}}

{{--@section('content')--}}

    <div class="container mt-5 pt-5" id="importGpx">
        <div class="row justify-content-center">
            <h2>Importez vos données GPX</h2>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 col-md-12 offset-lg-3">
                <form action="{{ route('add_gpx') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="gpxFile">
                        </div>
                        <div class="form-group">
                            <label for="">Nom de la course</label>
                            <input id="raceName" type="text" class="form-control" name="raceName" value="Course {{ $numberOfRacesDone + 1 }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary d-block" type="submit">C'est parti !</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--@endsection--}}