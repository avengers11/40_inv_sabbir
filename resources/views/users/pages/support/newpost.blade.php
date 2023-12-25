@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('css\now\support\new_post.css') }}">

<form action="{{ route('api_chat_newpost') }}" method="POST" enctype="multipart/form-data">
    <div class="newPost">
        <div class="hader_top">
            <a href="{{ route('web_home_show') }}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <button>POST</button>
        </div>

        @if (session() -> has('st'))
            <div style="width: 90%" class="alert_wrapper @if(session() -> get('st') == true) success @else rejected @endif">
                @if(session() -> get('st') == true)
                    <img src="{{ asset('images\icons\success.png') }}" alt="">
                @else
                    <img src="{{ asset('images\icons\error.png') }}" alt="">
                @endif
                <div class="content">{{session() -> get('msg')}}</div>
            </div>
        @endif

        <div class="wrapper">
            <a class="card_t" href="{{ route('web_personal_show') }}">
                @if (session()->has('csrf'))
                    <img src="{{ asset('images/users_profile/'.$userData['picture']) }}" alt="">
                @else
                    <img src="{{ asset('images/users_profile/random4.jpg') }}" alt="">
                @endif
                <p class="title">{{ $userData['fName'] }} {{ $userData['lName'] }}</p>
            </a>

            <div class="body_mr">
                <textarea class="content" name="content" placeholder="What's on your mind?"></textarea>

                <input type="hidden" id="style" name="style">
                <img id="img" src="" />

                <li id="photoVideo">
                    <i class="fa-solid fa-images"></i>
                    <p>Photo/Video</p>
                    <input style="opacity: 0" type="file" id="file" name="file">
                </li>
                <li>
                    <i class="fa-solid fa-camera"></i>
                    <p>Camera</p>
                </li>
                <li>
                    <i class="fa-solid fa-palette"></i>
                    <p>Background Color</p>
                </li>

                {{--
                <input type="hidden" id="style" name="style">
                <div class="button">
                    <div class="left">
                        <button type="submit" id="submit">POST</button>
                        <i class="fa-solid fa-file"></i>
                    </div>
                    <div class="right" id="delete">
                        <i class="fa-solid fa-trash"></i>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</form>

<script>
    let action = $(".newPost .wrapper .body_mr .action span");
    action.click(function(){
        let name = "";
        let value = "";

        // class add remove
        if($(this).hasClass("active")){
            $(this).removeClass('active');
            name = $(this).attr('name');
            value = "unset";
        }else{
            $(this).addClass('active');
            name = $(this).attr('name');
            value = $(this).attr('value');
        }

        $(".content").css(name, value);
        $("#style").val($(".content").attr("style"));
    });
    // file
    $("#photoVideo").click(function(){
        $("#file").click();
    });
    // delete
    $("#delete").click(function(){
        $(".content").val("");
        action.removeClass("active");
        $("#style").val("");
        $("#img").attr("src", "");
    });
    // file on change
    $("#file").change(function(e){
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            console.log(e);
            $("#img").attr("src", e.target.result);
        };
        reader.readAsDataURL(file);
        // console.log(e.target.result);
    })
    // submit
    $("#submit").click(function(){
    });
</script>

@endsection
