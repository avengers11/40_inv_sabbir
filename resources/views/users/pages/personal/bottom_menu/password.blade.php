@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\now\personal\profile_bottom\profile_info.css')}}">

<section id="persona_info" style="margin-bottom: 70px">
    <div class="container">
        <div class="header_mr">
            <h2 class="main-header">PASSWORD CHANGE</h2>
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
            <form action="{{route("users_personal_info_password_api")}}" method="post" enctype="multipart/form-data">
                <div style="margin-top: 40px" class="row">

                    <div class="col-6">
                        <p class="title">New password</p>
                        <input type="text" name="new_password" class="title" placeholder="New password...">
                    </div>
                    <div class="col-6">
                        <p class="title">Old password</p>
                        <input type="text" name="password" class="title" placeholder="Old password...">
                    </div>

                    <div class="col-6">
                        <button class="btn btn-success title">Save Changes</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>


@endsection
