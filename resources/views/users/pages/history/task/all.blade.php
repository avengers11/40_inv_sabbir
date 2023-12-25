@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\history\history.css')}}?v={{Config('app.version')}}">

<section id="History" style="margin-bottom: 14rem">
    <div class="container">
        <div class="header_mr">
            <h2 class="main-header">কাজের হিস্ট্রি</h2>
        </div>

        {{-- body_mr --}}
        <div class="body_mr">
            <div class="items {{Route::is('web_history_task_today_show') ? 'active' : ''}}">
                <a href="{{route('web_history_task_today_show')}}" class="header">আজকের হিস্ট্রি</a>
            </div>
            <div class="items {{Route::is('web_history_task_all_show') ? 'active' : ''}}">
                <a href="{{route('web_history_task_all_show')}}" class="header">সকল হিস্ট্রি</a>
            </div>
        </div>

        <div class="footer_mr">
            @if ($data == '[]')
                <h2 class="title text-danger">No data found!</h2>
            @endif

            @foreach ($data as $item)
                <div class="items">
                    <p class="title"> আপনার কমিশন : {{$item -> commission}}৳</p>
                    <hr>
                    <p class="title">{{$item -> date}}</p>
                </div>
            @endforeach
        </div>

        <div class="paginate title mt-5">
            <!--{{$data -> onEachSide(1) -> links()}}-->
        </div>

    </div>
</div>

@endsection
