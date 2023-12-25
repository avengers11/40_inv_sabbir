@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\home\balance\deposit.css')}}">

<form action="{{ route('api_withdraw_submit') }}" method="post">
    <section class="deposit">
        @if (session() -> has('st'))
            <div style="margin-bottom: 20px" class="alert_wrapper @if(session() -> get('st') == true) success @else rejected @endif">
                @if(session() -> get('st') == true)
                    <img src="{{ asset('images\icons\success.png') }}" alt="">
                @else
                    <img src="{{ asset('images\icons\error.png') }}" alt="">
                @endif
                <div class="content">{{session() -> get('msg')}}</div>
            </div>
        @endif
        <div class="header_mr">
            <h2>CASH-OUT FORM</h2>
        </div>

        <div class="form_box">
            <label for="">Your cash-out amount</label>
            <input type="text" name="amount" placeholder="Inter your cash-out amount..." />
        </div>

        <div class="form_box">
            <label for="">Select your cash-out your method</label>
            <select name="method" id="">
                @if (!empty(adminData()['withdraw_bkash_number']))
                    <option value="Bkash">Bkash</option>
                @endif

                @if (!empty(adminData()['withdraw_nagad_number']))
                    <option value="Nagad">Nagad</option>
                @endif

                @if (!empty(adminData()['withdraw_rocket_number']))
                    <option value="Rocket">Rocket</option>
                @endif

                @if (!empty(adminData()['withdraw_usdt_address']))
                    <option value="Upay">Upay</option>
                @endif
            </select>
        </div>

        <div class="form_box">
            <label for="">Your cash-out number</label>
            <input type="text" name="address" placeholder="Inter your cash-out number..." />
        </div>

        <button class="submit">CONFIRMED</button>
    </div>
</form>

@endsection
