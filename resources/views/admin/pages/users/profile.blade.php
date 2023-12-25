@extends('admin.layout.master')
@section('admin_master')
<!-- Example DataTables Card-->
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

<form action="{{route('api_users_update', ['id'=> $id])}}" method="post">
    <h2 class="text-center mb-5 text-success">User Profile</h2>
    <div class="row">

        <div class="col-12 mb-4">
            <div class="box">
                <label for="">This user join in : {{$userData['created_at']}}</label>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="box">
                <label for="">User status :
                    @if($userData['online_time'] > time())
                        <span class="btn btn-success">Online</span>
                    @else
                        <span class="btn btn-danger">Ofline</span>
                    @endif
                </label>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">First Name</label>
                <input type="text" name="fName" value="{{$userData['fName']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">Last Name</label>
                <input type="text" name="lName" value="{{$userData['lName']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">Username</label>
                <input type="text" name="userName" value="{{$userData['userName']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">Password</label>
                <input type="text" name="password" value="{{$userData['password']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">Number</label>
                <input type="text" name="mobileNumber" value="{{$userData['mobileNumber']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">E-mail</label>
                <input type="text" name="email" value="{{$userData['email']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">gen1st</label>
                <input type="text" name="gen1st" value="{{$userData['gen1st']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">gen2nd</label>
                <input type="text" name="gen2nd" value="{{$userData['gen2nd']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">gen3rd</label>
                <input type="text" name="gen3rd" value="{{$userData['gen3rd']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">gen4th</label>
                <input type="text" name="gen4th" value="{{$userData['gen4th']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">gen5th</label>
                <input type="text" name="gen5th" value="{{$userData['gen5th']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">invite</label>
                <input type="text" name="invite" value="{{$userData['invite']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">total_amount</label>
                <input type="text" name="totalAmount" value="{{$userData['totalAmount']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">Todays Amount</label>
                <input type="text" name="todaysAmount" value="{{$userData['todaysAmount']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">Bonus Amount</label>
                <input type="text" name="bonusAmount" value="{{$userData['bonusAmount']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="box">
                <label for="">total_recharge</label>
                <input type="text" name="totalDeposit" value="{{$userData['totalDeposit']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-12 mb-4">
            <div class="box">
                <label for="">total_withdaw</label>
                <input type="text" name="totalWithdraw" value="{{$userData['totalWithdraw']}}" class="form-control" />
            </div>
        </div>

        <div class="col-md-6 mt-5">
            <div class="box">
                <a style="width:100%" href="{{route('show_users_all')}}" class="btn btn-danger">Back</a>
            </div>
        </div>
   
        <div class="col-md-6 mt-5">
            <div class="box">
                <button style="width:100%" type="submit" class="btn btn-success">Update</button>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="box">
                <a style="width:100%" href="{{route('api_users_ban', ['id' => $userData['id']])}}" class="btn btn-danger">Ban</a>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="box">
                <a href="{{route('api_users_login', ['id' => $userData['id']])}}" style="width:100%" type="submit" class="btn btn-success">Login</a>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="box">
                <a style="width:100%" href="{{route('api_users_unban', ['id' => $userData['id']])}}" class="btn btn-danger">Unban</a>
            </div>
        </div>

    </div>
</form>

@endsection
