@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\personal\profile_bottom\team_report.css')}}?v={{Config('app.version')}}">

<section id="team_section" style="margin-bottom: 14rem">
    <div class="container">
        <div class="header_mr">
            <h2 class="main-header">দলের সদস্য</h2>
        </div>

        {{-- body_mr --}}
        <div class="body_mr">
            <div class="items @if($id == '1') active @endif">
                <a href="{{route('web_personal_team_member', ['id' => 1])}}" class="title">১ম জেন</a>
            </div>
            <div class="items @if($id == '2') active @endif">
                <a href="{{route('web_personal_team_member', ['id' => 2])}}" class="title">২য় জেন</a>
            </div>
            <div class="items @if($id == '3') active @endif">
                <a href="{{route('web_personal_team_member', ['id' => 3])}}" class="title">৩য় জেন</a>
            </div>
            <div class="items @if($id == '4') active @endif">
                <a href="{{route('web_personal_team_member', ['id' => 4])}}" class="title">৪র্থ জেন</a>
            </div>
            <div class="items @if($id == '5') active @endif">
                <a href="{{route('web_personal_team_member', ['id' => 5])}}" class="title">৫ম জেন</a>
            </div>
        </div>

        <div class="footer_mr">
            @foreach ($data as $item)
                <div class="items">
                    <div class="left">
                        <div class="left_left">
                            <img src="{{asset('./images/users_profile/'.$item['picture'])}}" alt="">
                        </div>
                        <div class="left_right">
                            <h2 class="header">{{$item['fName']}} {{$item['lName']}}</h2>
                            <p class="title">Total Deposit : {{$item['totalDeposit']}}৳</p>
                        </div>
                    </div>

                    <div class="right">
                        <h2 class="header">{{$item['totalAmount']}}৳</h2>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection