@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{ asset('css\now\home\others\vip.css') }}">

<div id="vip" style="margin-bottom: 40px">
    <h2 class="header_text">Community Work</h2>

    <div class="not_purchess">
        <p style="font-weight: bold">Purchases any of the package below and get our membership!</p>
    </div>

    @if (session() -> has('st'))
        <div style="width: 100%" class="alert_wrapper @if(session() -> get('st') == true) success @else rejected @endif">
            @if(session() -> get('st') == true)
                <img src="{{ asset('images\icons\success.png') }}" alt="">
            @else
                <img src="{{ asset('images\icons\error.png') }}" alt="">
            @endif
            <div class="content">{{session() -> get('msg')}}</div>
        </div>
    @endif

    <div class="vip_wrapper">

        @foreach ($package_data as $item)
            <div class="vip">
                <img src="{{ asset('images/vip/'.$item['img']) }}" alt="">
                <div class="left">
                    <h4>{{ $item['pk_name'] }}</h4>
                    <p class="title">Package price {{ $item['amount'] }} BDT</p>
                    <p class="title">Daily profit {{ adminData()['task_commission']*$item['task'] }} BDT</p>
                    <p class="title">Daily jobs {{ $item['task'] }}</p>
                    @if(\App\Models\package_history::where('user_id', $userData['id']) -> where('pk_id', $item['id']) -> where('expired_date', '>', time()) -> exists())
                        @php
                            $data = \App\Models\package_history::where('user_id', $userData['id']) -> where('pk_id', $item['id']) -> where('expired_date', '>', time()) -> first();
                        @endphp
                        <p class="expire_days title">Expired in {{number_format(($data['expired_date'] - time())/86400, 0)}} days later</p>
                        <button class="btn btn-success text-light title">Membership Activated</button>
                    @else
                        <p class="title">Package validity {{ $item['expired_date'] }} days</p>
                        <button class="btn btn-primary"><a href="{{route('users_packages_buynow_api', ['id' => $item['id']])}}" class="btn btn-danger text-light title">Buy Membership</a></button>
                    @endif

                </div>
            </div>
        @endforeach

    </div>
</div>

@endsection
