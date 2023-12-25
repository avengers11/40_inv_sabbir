@extends('admin.layout.master')
@section('admin_master')

<div class="container">
    <div class="row">
        @if (session() -> has('msg'))
            <div class="alert alert-success col-12" role="alert">
                <h4 class="alert-heading">Alert</h4>
                <hr>
                <p>{{session() -> get('msg')}}</p>
            </div>
        @endif
    </div>
</div>

<div class="row">

    <div class="container">
        <div style="width: 100%; display:block; padding-top:1rem; padding:1rem; border-top:2px solid green;border-bottom:2px solid green;margin-bottom:2rem;">
            <h4 class="text-center">Settings</h4>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h4 class="text-center text-primary">Website Info</h4>
            </div>
            <ul class="list-group list-group-flush">

                <form action="{{route('api_settings_logo')}}" method="post" enctype="multipart/form-data">
                    <li class="list-group-item">
                        <p><span>Logo : </span><input type="file" name="logo" ></p>
                        <button class="btn btn-success"><i class="fa-solid fa-clipboard-check"></i></button>
                    </li>
                </form>

                <form action="{{route('api_settings_title')}}" method="post">
                    <li class="list-group-item">
                        <input type="text" name="title" value="{{$adminData['title']}}" placeholder="Website title...">
                        <button class="btn btn-success"><i class="fa-solid fa-clipboard-check"></i></button>
                    </li>
                </form>

            </ul>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h4 class="text-center text-primary">Admin Info</h4>
            </div>
            <ul class="list-group list-group-flush">

                <form action="{{route('api_settings_update_account')}}" method="post">
                    <li class="list-group-item">
                        <p><span>Username : </span><input type="text" name="admin_username" value="{{$adminData['admin_username']}}" placeholder="Username..."></p>
                    </li>
                    <li class="list-group-item">
                        <p><span>Password : </span><input type="text" name="admin_password" value="{{$adminData['admin_password']}}" placeholder="Password..."></p>
                    </li>
                    <li class="list-group-item">
                        <button style="width: 100%;" type="submit" class="btn btn-success">UPDATE <i class="fa-solid fa-circle-check"></i></button>
                    </li>
                </form>

            </ul>
        </div>
    </div>

    <div class="col-12 mb-4">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h4 class="text-center text-primary">Web site notice!</h4>
            </div>
            <ul class="list-group list-group-flush">

                <form action="{{route('api_settings_notice_update')}}" method="post">
                    <li class="list-group-item">
                        <p style="width: 100%"><span>Header</span><input style="width: 100%" type="text" name="home_notice_header" value="{{$adminData['home_notice_header']}}" placeholder="header..."></p>
                    </li>
                    <li class="list-group-item">
                        <p style="width: 100%">
                            <span>Content</span>
                            <textarea name="home_notice_content" style="width: 100%;border:none;outline:none;" placeholder="Enter your notice content...">{{$adminData['home_notice_content']}}</textarea>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <button style="width: 100%;" type="submit" class="btn btn-success">UPDATE <i class="fa-solid fa-circle-check"></i></button>
                    </li>
                </form>

            </ul>
        </div>
    </div>


    <div class="col-12 mb-4 mt-5">
        <form action="{{route("api_settings_deposit_withdraw")}}" style="width: 100%;" method="post">
            <div class="card" style="width: 100%;">
                <div class="row">
                    <h6 class="text-center">Deposit Info</h6>
                    <div class="col-12">
                        <textarea name="deposit_info" id="" cols="30" rows="10" class="form-control">{{$adminData['deposit_info']}}</textarea>
                    </div>
    
                    <h6 class="text-center mt-5">Withdraw Info</h6>
                    <div class="col-12">
                        <textarea name="withdraw_info" id="" cols="30" rows="10" class="form-control">{{$adminData['withdraw_info']}}</textarea>
                    </div>
    
                    <div class="col-12 mt-5">
                        <button style="width: 100%;" type="submit" class="btn btn-success">UPDATE <i class="fa-solid fa-circle-check"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

<style>
li.list-group-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    text-align: center;
}
li.list-group-item input{
    border: none;
    outline: none;
    background: none;
}
</style>
@endsection
