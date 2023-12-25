@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\personal\personal.css')}}?v={{Config('app.version')}}" />

<div id="profile">
    <div style="margin-block: 0; border-radius:var(--size2) var(--size2) 0 0" class="header_text">Profile</div>

    <div class="top">
        <p>Balance</p>
        <h4>{{ number_format($userData['totalAmount'], 2) }} BDT</h4>
    </div>
    {{-- cards  --}}
    <div class="card_wrapper">
        <div class="card1">
            <a href="{{ route('web_deposit_show') }}" class="card_items">
                <i class="fa-solid fa-wallet"></i>
                <p class="title">Recharge</p>
            </a>

            <a href="{{ route('web_withdraw_show') }}" class="card_items">
                <i class="fa-solid fa-coins"></i>
                <p class="title">Cash-out</p>
            </a>
            <a href="{{ route('web_invite_show') }}" class="card_items">
                <i class="fa-solid fa-infinity"></i>
                <p class="title">Invite</p>
            </a>
        </div>

        <div class="card2">

            <a href="{{ route('web_personal_info') }}" class="card_items">
                <div class="left">
                    <img src="{{ asset('images\icons\personal_info.png') }}" alt="">
                    <p class="title">Change Personal Info</p>
                </div>
                <p class="emoji"><i class="fa-solid fa-arrow-right"></i></p>
            </a>

            <a href="{{ route('web_personal_password') }}" class="card_items">
                <div class="left">
                    <img src="{{ asset('images\icons\change_password.png') }}" alt="">
                    <p class="title">Change Passowrd</p>
                </div>
                <p class="emoji"><i class="fa-solid fa-arrow-right"></i></p>
            </a>

            <a href="{{ route('web_history_task_all_show') }}" class="card_items">
                <div class="left">
                    <img src="{{ asset('images\icons\history.png') }}" alt="">
                    <p class="title">Jobs History</p>
                </div>
                <p class="emoji"><i class="fa-solid fa-arrow-right"></i></p>
            </a>

            <a href="{{ route('web_history_account_deposit') }}" class="card_items">
                <div class="left">
                    <img src="{{ asset('images\icons\history.png') }}" alt="">
                    <p class="title">Recharge History</p>
                </div>
                <p class="emoji"><i class="fa-solid fa-arrow-right"></i></p>
            </a>

            <a href="{{ route('web_history_account_withdraw') }}" class="card_items">
                <div class="left">
                    <img src="{{ asset('images\icons\history.png') }}" alt="">
                    <p class="title">Cash-out History</p>
                </div>
                <p class="emoji"><i class="fa-solid fa-arrow-right"></i></p>
            </a>

        </div>
    </div>

</div>

@endsection


