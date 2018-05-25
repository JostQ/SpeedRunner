@extends('layouts.app')

@section('content')
    <section class="container pt-5 mt-5">
        <div class="col-12">
            <div class="row">
                @if(!empty($errors->has('msg')))
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first('msg')}}
                    </div>
                @endif
                @if(!empty($errors->has('picture')))
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first('picture')}}
                    </div>
                @endif
            </div>
            <form method="post" name="postMsg" id="postMsg" enctype="multipart/form-data">
                @csrf
                    <div class="row d-flex justify-content-end">
                        <input type="file" name="picture"
                               id="file-input" class="join-file ">
                    </div>
                <div class="row">
                    <!-- List group -->
                    <div class="list-group col-4" id="myList" role="tablist">

                        @foreach($friends as $friend)
                            <a class="list-group-item list-group-item-action friend" data-toggle="list"
                               href="#message"
                               role="tab"
                               data-friend="{{$friend['friend_id']}}">{{ $friend->user->infos->firstname.' '.$friend->user->infos->lastname}} </a>
                        @endforeach

                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content col-8 message-content">
                        <div class="tab-pane " id="message" role="tabpanel" style="overflow: auto; height: 400px">

                        </div>
                    </div>
                    <div class="col-7 offset-4 ">
                        <div class="row">
                        <textarea class="form-control" placeholder="Exprimez-vous..." style="width: 100%;" name="msg"
                                  required></textarea>
                            <div class="col-1">
                                <button type="submit" id="publi" class="btn btn-primary ">Publier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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

        document.addEventListener("DOMContentLoaded", function (event) {

            $('.friend').on('click', function (event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '{{ route('messenger_friend') }}',
                    dataType: 'json',
                    data: {id: $(this).attr('data-friend')},
                    success: function (data) {
                        $('#message').empty();
                        console.log(data)
                        $(data.sender).each(function (index, item) {
                            console.log(item);
                            if(item['users_id'] !== item['recipient_id']){
                                $('#message').append($('<p>',{class : 'd-flex justify-content-end  alert-primary'}).html(item.message))
                                if(item.picture !== null){
                                    $('#message').append($('<img>', { src : '{{asset('thumbnails') . '/'}}' + item.picture}));
                                }
                            }
                        })
                        $(data.answer).each(function (index, item) {

                                $('#message').append($('<p>',{class:'alert-secondary'}).html(item.message))
                                if(item.picture !== null){
                                    $('#message').append($('<img>', { src : '{{asset('thumbnails') . '/'}}' + item.picture}));

                                }
                        })


                    },
                    error: function (data) {
                        console.log('erreur');
                    }
                });
            });
            $('#postMsg ').on('submit', function (event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('messenger_send_new') }}',
                    dataType: 'json',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        console.log(data);
                        if(data['friend-id'] !== data.id){
                            $('#message').append($('<p>',{class : 'd-flex justify-content-end alert-primary'}).html(data['msg']));
                        }else {
                            $('#message').append($('<p>').html(data['msg']));
                        }
                        if(data.picture !== undefined){
                            $('#message').append($('<img>', { src : '{{asset('thumbnails') . '/'}}' + data['picture']}));
                        }

                    },
                    error: function (data) {
                        console.log('erreur');
                    }
                })
            });
        })

    </script>
@endsection

