<div class="row mt-3">
    @foreach($user as $success)
    <div class="col-3">
        <div class="card successObtained" id="success-{{$success->id}}">
            <div class="card-header">
                {{$success->name}}
            </div>
            <div class="card-body">
                {{$success->description}}
            </div>
        </div>
    </div>
    @endforeach
</div>