<div class="row">
    @foreach($user as $success)
    <div class="col-md-3 col-sm-12">
        <div class="card successObtained mb-3" id="success-{{$success->id}}">
            <div class="card-header">
                {{$success->name}}
            </div>
            <div class="card-image text-center">
                <img class="p-4 " src="{{asset('icons/medal.svg')}}" alt="">
            </div>
            <div class="card-body">
                {{$success->description}}
            </div>
        </div>
    </div>
    @endforeach
</div>