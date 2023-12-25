@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{ asset('css\now\home\others\vip.css') }}">

<div id="vip">
    <h2 class="header_text">Your All Works</h2>

    <div class="not_purchess">
        <p>You have total {{ $userData['task'] }} works today</p>
    </div>

    @if (session() -> has('st'))
        <div class="alert_wrapper @if(session() -> get('st') == true) success @else rejected @endif">
            @if(session() -> get('st') == true)
                <img src="{{ asset('images\icons\success.png') }}" alt="">
            @else
                <img src="{{ asset('images\icons\error.png') }}" alt="">
            @endif
            <div class="content">{{session() -> get('msg')}}</div>
        </div>
    @endif

    <div class="vip_wrapper">

        @foreach ($videoTask as $item)
            <div class="vip">
                <img src="{{ asset('images/task/'.$item['img']) }}" alt="">
                <div class="left">
                    <h4>{{ $item['title'] }}</h4>
                    <p class="title">{{ $item['header'] }}</p>
                    <div class="btn btn-primary">
                        <a href="{{ route('web_session_task_show', ['id' => $item['id']]) }}">Start Video</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

@endsection
