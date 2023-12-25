@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\now\personal\profile_bottom\profile_info.css')}}">

<section id="persona_info" style="margin-bottom: 70px">
    <div class="container">
        <div class="header_mr">
            <h2 class="main-header">PERSONAL INFO</h2>
        </div>

        @if (session() -> has('st'))
            <div style="margin-top: 20px" class="alert_wrapper @if(session() -> get('st') == true) success @else rejected @endif">
                @if(session() -> get('st') == true)
                    <img src="{{ asset('images\icons\success.png') }}" alt="">
                @else
                    <img src="{{ asset('images\icons\error.png') }}" alt="">
                @endif
                <div class="content">{{session() -> get('msg')}}</div>
            </div>
        @endif

        {{-- body_mr --}}
        <div class="body_mr">
            <form action="{{route("users_personal_info_personal_update_api")}}" method="post" enctype="multipart/form-data">
                <div class="row mt-5">
                    <img src="{{asset('./images/users_profile/'.$userData['picture'])}}" name="img" />

                    <div class="col-6">
                        <input type="file" style="width: 100%" name="img" class="form-control title">
                    </div>

                    <div class="col-6">
                        <p class="title">First name</p>
                        <input type="text" name="fName" value="{{$userData['fName']}}" class="title" placeholder="First name...">
                    </div>
                    <div class="col-6">
                        <p class="title">Last name</p>
                        <input type="text" name="lName" value="{{$userData['lName']}}" class="title" placeholder="Last name...">
                    </div>
                    <div class="col-6">
                        <p class="title">Mobile number</p>
                        <input type="text" name="mobileNumber" value="{{$userData['mobileNumber']}}" class="title" placeholder="Mobile number...">
                    </div>
                    <div class="col-6">
                        <p class="title">Your email</p>
                        <input type="text" name="email" value="{{$userData['email']}}" class="title" placeholder="Your email...">
                    </div>
                    <div class="col-6 mt-5">
                        <button class="btn btn-success title">Save Changes</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>


@endsection
