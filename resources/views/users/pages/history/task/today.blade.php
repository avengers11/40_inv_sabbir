@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\now\history\history.css')}}?v={{Config('app.version')}}">

<section id="History" style="margin-bottom: 14rem">
    <div class="container">
        <div class="header_mr">
            <h2 class="main-header">{{__("history.task_history")}}</h2>
        </div>

        <div class="footer_mr">
            @if ($data == '[]')
                <h2 class="title text-danger">No data found!</h2>
            @endif

            @foreach ($data as $item)
                <div class="items">
                    <p class="title" style="margin-bottom:10px"> {{ $item -> info }} : <span style="text-transform: uppercase; color:green;" class="text-success">{{$item -> commission}} BDT</span></p>
                    <hr>
                    <p class="title" style="text-transform: uppercase;color:blue; margin-top:5px">
                        @php
                            $newDate = new DateTime($item['created_at']);
                            echo $newDate -> format('d M, Y h:i A');
                        @endphp
                    </p>
                </div>
            @endforeach
        </div>

        <div class="paginate title mt-5">
            {{$data -> onEachSide(1) -> links()}}
        </div>

    </div>
</div>

@endsection
