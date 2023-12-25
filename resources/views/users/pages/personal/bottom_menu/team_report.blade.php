@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\personal\profile_bottom\team_report.css')}}?v={{Config('app.version')}}">
<section id="team_section" class="mb-5">
    <div class="container">

        <div class="header_mr">
            <h2 class="main-header">TEAM REPORT</h2>
        </div>

        <div class="team_report_wrapper">
            <li>
                <span class="header text-center">
                    Team Total Deposit
                </span>

                <span class="title text-center">
                    {{$totalDeposit}} BDT
                </span>
            </li>
            <li>
                <span class="header text-center">
                    Team Total Withdraw
                </span>
                <span class="title text-center">
                    {{$totalWithdraw}} BDT
                </span>
            </li>
            <li>
                <span class="header text-center">
                    Total Team Amount
                </span>

                <span class="title text-center">
                    {{$totalAmount}} BDT
                </span>
            </li>
            <li>
                <span class="header text-center">
                    Total Team Member
                </span>
                <span class="title text-center">
                    {{$totalUsers}}
                </span>
            </li>
            <li>
                <span class="header text-center">
                    Total Team Revenue
                </span>

                <span class="title text-center">
                    {{$totalTeamRevenue}} BDT
                </span>
            </li>
            <li>
                <span class="header text-center">
                    Total Generation Commission
                </span>
                <span class="title text-center">
                    {{$totalGenCommission}} BDT
                </span>
            </li>
        </div>

    </div>
</section>


<link rel="stylesheet" href="{{asset('.\css\now\personal\profile_bottom\team_report.css')}}?v={{Config('app.version')}}">

<section id="team_section" style="margin-bottom: 14rem">
    <div class="container">
        {{-- body_mr --}}
        <div class="body_mr">
            <div class="items @if($id == '1') active @endif">
                <a href="{{route('web_personal_team_report', ['id' => 1])}}" class="title">1st Gen</a>
            </div>
            <div class="items @if($id == '2') active @endif">
                <a href="{{route('web_personal_team_report', ['id' => 2])}}" class="title">2nd Gen</a>
            </div>
            <div class="items @if($id == '3') active @endif">
                <a href="{{route('web_personal_team_report', ['id' => 3])}}" class="title">3rd Gen</a>
            </div>
        </div>

        <div class="footer_mr">
            @foreach ($data as $item)
                <div class="items">
                    <div class="left">
                        <div class="left_left">
                            <img src="{{asset('images/users_profile/'.$item['picture'])}}" alt="">
                        </div>
                        <div class="left_right">
                            <h2 class="header">{{$item['fName']}} {{$item['lName']}}</h2>
                            <p class="title">Total Deposit : {{$item['totalDeposit']}} BDT</p>
                        </div>
                    </div>

                    <div class="right">
                        <h2 class="header">{{$item['totalAmount']}} BDT</h2>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection
