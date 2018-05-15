@extends('layouts.app')

@section('content')

    <div class="container" id="profile">

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <img src="https://www.runnersworld.com/sites/runnersworld.com/files/styles/listicle_slide_custom_user_desktop_1x/public/become_morning_runner_peopleimages_gettyimages-499778755.jpg?itok=g9qfiZO6"
                         alt="runneuse"
                         id="picprofil">
                </div>
                <div class="col-sm">
                    <button type="button" class="btn btn-light">Light</button>
                </div>
                <div class="col-sm">
                    One of three columns
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
    </div>



@endsection