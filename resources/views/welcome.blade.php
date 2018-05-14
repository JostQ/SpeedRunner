@extends('layouts.app')

@section('page-specific-scripts')
<script defer>
    var jumbotron = document.getElementById('slider');
    number = 1;
    setInterval(function() {
            if (number ===4) {
                number = 1;
            }
            jumbotron.style.backgroundImage = `url("{{ asset('storage/img/')}}/${number}.jpg")`;
            number++;

        }, 2000);
</script>
@endsection

@section('content')

    <div class="jumbotron-fluid" id="slider">
        <div class="container">
            <h2 class="display-2">Lorem ipsum dolor sit amet.</h2>
        </div>
    </div>

@endsection

