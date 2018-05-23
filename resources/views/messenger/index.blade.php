@extends('layouts.app')

@section('content')
    @if(!empty($errors->has('msg')))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('msg')}}
        </div>
    @endif
    <section class="container pt-5 mt-5">
        <form method="post" name="postMsg" id="postMsg">
            @csrf
            <div class="row">
                <!-- List group -->
                <div class="list-group col-4" id="myList" role="tablist">

                    @foreach($friends as $friend)
                       <a class="list-group-item list-group-item-action  " data-toggle="list"
                                href="#message"
                                role="tab" data-friend="{{$friend['friend_id']}}">{{ $friend->user->infos->firstname.' '.$friend->user->infos->lastname}} </a>
                    @endforeach

                </div>

                <!-- Tab panes -->
                <div class="tab-content col-8 message-content">

                    {{--foreach des message--}}
                    @foreach($messages as $message)
                        <div class="tab-pane " id="message" role="tabpanel">
                            {{$message['message']}}
                        </div>
                    @endforeach
                </div>
                <div class="col-7 offset-4 ">
                    <div class="row">
                        <textarea class="form-control" placeholder="Exprimez-vous..." rows="2" name="msg "
                                  required></textarea>
                        <div class="col-1">
                            <button type="submit" id="publi" class="btn btn-primary ">Publier
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </section>


    <script>

        let form = document.getElementById('postMsg');
        let conversations = form.getElementsByTagName('a');

        function friend() {
            if (document.getElementById('friend-id')) {
                document.getElementById('friend-id').remove()
            }
        }

        for (i = 0; i < conversations.length; i++) {
            conversations[i].onclick = function () {

                let newInput = document.createElement('input');
                let dataFriend = this.getAttribute('data-friend');
                newInput.setAttribute('type', 'hidden');
                newInput.setAttribute('name', 'friend-id');
                newInput.setAttribute('id', 'friend-id');
                newInput.setAttribute('value', dataFriend);

                friend();

                form.appendChild(newInput);

            };
        }

    </script>
@endsection

