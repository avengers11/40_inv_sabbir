@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\contact\contact.css')}}?v={{Config('app.version')}}">

<section id="contact_section" style="margin-bottom: 40px">
    <div class="container">
        <div class="header_mr">
            <h2 class="main-header">{{__("contact.Contact_US")}}</h2>
        </div>

        {{-- body_mr --}}
        <div class="body_mr">
            <a href="{{$adminData['teligram_link']}}" class="items">
                <img src="{{ asset('images\icons\telegram.png') }}" alt="">
                <h2 class="header">Telegram Group</h2>
            </a>
            <a href="{{$adminData['teligram_channel']}}" class="items">
                <img src="{{ asset('images\icons\telegram2.png') }}" alt="">
                <h2 class="header">Telegram Channel</h2>
            </a>

            <a href="{{$adminData['telegram_agent']}}" class="items">
                <img src="{{ asset('images\icons\whatsapp.png') }}" alt="">
                <h2 class="header">WhatsApp Group</h2>
            </a>
            <a href="{{$adminData['facebook_agent']}}" class="items">
                <img src="{{ asset('images\icons\facebook.png') }}" alt="">
                <h2 class="header">Facebook Group</h2>
            </a>
            <a href="{{$adminData['whatsApp_agent']}}" class="items">
                <img src="{{ asset('images\icons\livechat.png') }}" alt="">
                <h2 class="header">Agent</h2>
            </a>
        </div>

    </div>
</div>

@endsection
