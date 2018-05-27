<h2>Add a new message</h2>
<form action="{{ route('messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
        
    <!-- Message Form Input -->
    <div class="form-group">
        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
    </div>

    @if($users->count() > 0)
            <label>Ajoutez des participants </label>
        <div class="checkbox">
            @foreach($users as $user)
                <label class="mr-2" title="{{ $user->name }}">
                    <input class="mr-2" type="checkbox" name="recipients[]" value="{{ $user->id }}">
                    <span>{{ $user->name }}</span>
                </label>
            @endforeach
        </div>
    @endif

    <!-- Submit Form Input -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </div>
</form>