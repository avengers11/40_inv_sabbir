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
            <h4 class="text-center">Deposit Payment Account</h4>
        </div>
    </div>

    <form class="col-12" action="{{route('api_payment_account')}}" method="post">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h4 class="text-center text-primary">BKASH</h4>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <p><span>Status : </span>@if(empty($adminData['bkash_number']))<span class="text-danger">Off</span>@else <span class="text-success">On</span>@endif</span></p>
                        </li>

                        <li class="list-group-item">
                            <input style="width: 100%;" type="text" name="bkash_number" value="{{$adminData['bkash_number']}}" placeholder="Payment number...">
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h4 class="text-center text-primary">NAGAD</h4>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <p><span>Status : </span>@if(empty($adminData['nagad_number']))<span class="text-danger">Off</span>@else <span class="text-success">On</span>@endif</span></p>
                        </li>

                        <li class="list-group-item">
                            <input style="width: 100%;" type="text" name="nagad_number" value="{{$adminData['nagad_number']}}" placeholder="Payment number...">
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h4 class="text-center text-primary">ROCKET</h4>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <p><span>Status : </span>@if(empty($adminData['rocket_number']))<span class="text-danger">Off</span>@else <span class="text-success">On</span>@endif</span></p>
                        </li>

                        <li class="list-group-item">
                            <input style="width: 100%;" type="text" name="rocket_number" value="{{$adminData['rocket_number']}}" placeholder="Payment number...">
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h4 class="text-center text-primary">Upay</h4>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <p><span>Status : </span>@if(empty($adminData['usdt_address']))<span class="text-danger">Off</span>@else <span class="text-success">On</span>@endif</span></p>
                        </li>

                        <li class="list-group-item">
                            <input style="width: 100%;" type="text" name="usdt_address" value="{{$adminData['usdt_address']}}" placeholder="Payment number...">
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-12">
                <button style="width: 100%;" type="submit" class="btn btn-success">UPDATE <i class="fa-solid fa-circle-check"></i></button>
            </div>
        </div>
    </form>

    <div class="container mt-5">
        <div style="width: 100%; display:block; padding-top:1rem; padding:1rem; border-top:2px solid green;border-bottom:2px solid green;margin-bottom:2rem;">
            <h4 class="text-center">Withdraw Payment Account</h4>
        </div>
    </div>

    <form class="col-12" action="{{route('api_payment_account_withdraw')}}" method="post">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h4 class="text-center text-primary">BKASH</h4>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <p><span>Status : </span>@if(empty($adminData['withdraw_bkash_number']))<span class="text-danger">Off</span>@else <span class="text-success">On</span>@endif</span></p>
                        </li>

                        <li class="list-group-item">
                            <input style="width: 100%;" type="text" name="withdraw_bkash_number" value="{{$adminData['withdraw_bkash_number']}}" placeholder="Payment number...">
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h4 class="text-center text-primary">NAGAD</h4>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <p><span>Status : </span>@if(empty($adminData['withdraw_nagad_number']))<span class="text-danger">Off</span>@else <span class="text-success">On</span>@endif</span></p>
                        </li>

                        <li class="list-group-item">
                            <input style="width: 100%;" type="text" name="withdraw_nagad_number" value="{{$adminData['withdraw_nagad_number']}}" placeholder="Payment number...">
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h4 class="text-center text-primary">ROCKET</h4>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <p><span>Status : </span>@if(empty($adminData['withdraw_rocket_number']))<span class="text-danger">Off</span>@else <span class="text-success">On</span>@endif</span></p>
                        </li>

                        <li class="list-group-item">
                            <input style="width: 100%;" type="text" name="withdraw_rocket_number" value="{{$adminData['withdraw_rocket_number']}}" placeholder="Payment number...">
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h4 class="text-center text-primary">Upay</h4>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <p><span>Status : </span>@if(empty($adminData['withdraw_usdt_address']))<span class="text-danger">Off</span>@else <span class="text-success">On</span>@endif</span></p>
                        </li>

                        <li class="list-group-item">
                            <input style="width: 100%;" type="text" name="withdraw_usdt_address" value="{{$adminData['withdraw_usdt_address']}}" placeholder="Payment number...">
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-12">
                <button style="width: 100%;" type="submit" class="btn btn-success">UPDATE <i class="fa-solid fa-circle-check"></i></button>
            </div>
        </div>
    </form>

    <div class="container">
        <div style="width: 100%; display:block; padding-top:1rem; padding:1rem; border-top:2px solid green;border-bottom:2px solid green;margin-bottom:2rem; margin-top:2rem;">
            <h4 class="text-center">Payment Details</h4>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h4 class="text-center text-primary">Withdraw</h4>
            </div>
            <ul class="list-group list-group-flush">

                <form action="{{route('api_payment_withdraw_limit')}}" method="post">
                    <li class="list-group-item">
                        <input style="width: 100%;" type="text" name="minWithdraw" value="{{$adminData['minWithdraw']}}" placeholder="Min withdraw...">
                    </li>

                    <li class="list-group-item">
                        <input style="width: 100%;" type="text" name="maxWithdraw" value="{{$adminData['maxWithdraw']}}" placeholder="Max withdraw...">
                    </li>

                    <li class="list-group-item">
                        <input style="width: 100%;" type="text" name="nextWIthdraw" value="{{$adminData['nextWIthdraw']}}" placeholder="Next withdraw...">
                    </li>

                    <li class="list-group-item">
                        <button style="width: 100%;" type="submit" class="btn btn-success">UPDATE <i class="fa-solid fa-circle-check"></i></button>
                    </li>
                </form>

            </ul>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h4 class="text-center text-primary">Recharge</h4>
            </div>
            <ul class="list-group list-group-flush">

                <form action="{{route('api_payment_recharge_limit')}}" method="post">
                    <li class="list-group-item">
                        <input style="width: 100%;" type="text" name="minDeposit" value="{{$adminData['minDeposit']}}" placeholder="Min withdraw...">
                    </li>

                    <li class="list-group-item">
                        <input style="width: 100%;" type="text" name="maxDeposit" value="{{$adminData['maxDeposit']}}" placeholder="Max withdraw...">
                    </li>

                    <li class="list-group-item">
                        <button style="width: 100%;" type="submit" class="btn btn-success">UPDATE <i class="fa-solid fa-circle-check"></i></button>
                    </li>
                </form>

            </ul>
        </div>
    </div>

    <div class="container">
        <div style="width: 100%; display:block; padding-top:1rem; padding:1rem; border-top:2px solid green;border-bottom:2px solid green;margin-bottom:2rem; margin-top:2rem;">
            <h4 class="text-center">Commission Details</h4>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h4 class="text-center text-primary">Recharge Commission</h4>
            </div>
            <ul class="list-group list-group-flush">
                <form action="{{route('api_payment_recharge_com')}}" method="post">
                    <li class="list-group-item">
                        <input type="text" name="depositGen1st" value="{{$adminData['depositGen1st']}}" style="width: 100%;" placeholder="1st gen...">
                    </li>

                    <li class="list-group-item">
                        <input type="text" name="depositGen2nd" value="{{$adminData['depositGen2nd']}}" style="width: 100%;" placeholder="2nd gen...">
                    </li>

                    <li class="list-group-item">
                        <input type="text" name="depositGen3rd" value="{{$adminData['depositGen3rd']}}" style="width: 100%;" placeholder="3rd gen...">
                    </li>

                    <li class="list-group-item">
                        <input type="text" name="depositGen4th" value="{{$adminData['depositGen4th']}}" style="width: 100%;" placeholder="4th gen...">
                    </li>

                    <li class="list-group-item">
                        <input type="text" name="depositGen5th" value="{{$adminData['depositGen5th']}}" style="width: 100%;" placeholder="5th gen...">
                    </li>
                    <li class="list-group-item">
                        <button style="width: 100%;" type="submit" class="btn btn-success">UPDATE <i class="fa-solid fa-circle-check"></i></button>
                    </li>
                </form>

            </ul>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h4 class="text-center text-primary">Genaration Commission</h4>
            </div>
            <ul class="list-group list-group-flush">

                <form action="{{route('api_payment_genaration_com')}}" method="post">
                    <li class="list-group-item">
                        <input type="text" name="gen1st" value="{{$adminData['taskGen1st']}}" style="width: 100%;" placeholder="1st gen...">
                    </li>

                    <li class="list-group-item">
                        <input type="text" name="gen2nd" value="{{$adminData['taskGen2nd']}}" style="width: 100%;" placeholder="2nd gen...">
                    </li>

                    <li class="list-group-item">
                        <input type="text" name="gen3rd" value="{{$adminData['taskGen3rd']}}" style="width: 100%;" placeholder="3rd gen...">
                    </li>

                    <li class="list-group-item">
                        <input type="text" name="gen4th" value="{{$adminData['taskGen4th']}}" style="width: 100%;" placeholder="4th gen...">
                    </li>

                    <li class="list-group-item">
                        <input type="text" name="gen5th" value="{{$adminData['taskGen5th']}}" style="width: 100%;" placeholder="5th gen...">
                    </li>
                    <li class="list-group-item">
                        <button style="width: 100%;" type="submit" class="btn btn-success">UPDATE <i class="fa-solid fa-circle-check"></i></button>
                    </li>
                </form>

            </ul>
        </div>
    </div>

    <div class="col-md-12 mb-4">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h4 class="text-center text-primary">Withdraw Fee</h4>
            </div>
            <ul class="list-group list-group-flush">
            <form action="{{route('api_payment_withdraw_charge')}}" method="post">
                <li class="list-group-item">
                    <input type="text" name="withdraw_charge" value="{{$adminData['withdraw_charge']}}" placeholder="Account balance...">
                    <button class="btn btn-success"><i class="fa-solid fa-clipboard-check"></i></button>
                </li>
            </form>
            </ul>
        </div>
    </div>

    <div class="col-md-12 mb-4">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h4 class="text-center text-primary">Account creating bonuse & Task bonuse & Refer bonuse & info</h4>
            </div>
            <ul class="list-group list-group-flush">
            <form action="{{route('api_payment_signup_bonuse')}}" method="post">
                <li class="list-group-item">
                    <input type="text" name="offer_balance" value="{{$adminData['offer_balance']}}" placeholder="Account creating bonuse...">
                    <button class="btn btn-success"><i class="fa-solid fa-clipboard-check"></i></button>
                </li>
                <li class="list-group-item">
                    <input type="text" name="task_commission" value="{{$adminData['task_commission']}}" placeholder="Task bonuse...">
                    <button class="btn btn-success"><i class="fa-solid fa-clipboard-check"></i></button>
                </li>
                <li class="list-group-item">
                    <input type="text" name="refer_bonuse" value="{{$adminData['refer_bonuse']}}" placeholder="Refer bonuse...">
                    <button class="btn btn-success"><i class="fa-solid fa-clipboard-check"></i></button>
                </li>

                <li class="list-group-item">
                    <textarea name="refer_bonuse_info" class="form-control" cols="30" rows="10">{{$adminData['refer_bonuse_info']}}</textarea>
                    <button class="btn btn-success"><i class="fa-solid fa-clipboard-check"></i></button>
                </li>
            </form>
            </ul>
        </div>
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
