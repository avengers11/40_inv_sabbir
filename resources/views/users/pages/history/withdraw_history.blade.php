@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\now\history\history.css')}}?v={{Config('app.version')}}">

<section id="History" style="margin-bottom: 14rem">
    <div class="container">
        <div class="header_mr">
            <h2 class="main-header">Withdraw History</h2>
        </div>

        <div class="footer_mr">
            @if ($data == '[]')
                <h2 class="title text-danger">No data found!</h2>
            @endif

            @foreach ($data as $item)
                <div class="items {{$item['st']}}">
                    <h2 class="header mb-5" style="color:#f96262; margin-bottom:10px">Payment method {{$item['method']}}</h2>
                    <p class="title">Payment status : <span style="text-transform: uppercase; color:#0d8af0" class="text-warning">{{$item['st']}}</span></p>
                    <p class="title">Payment amount : <span style="text-transform: uppercase; color:green;" class="text-success">{{$item['amount']}} BDT</span></p>
                    <p class="title">Payment ID : <span style="text-transform: uppercase;color:orange" class="text-danger">{{$item['orderID']}}</span></p>
                    <hr>
                    <p class="title" style="text-transform: uppercase;color:blue; margin-top:5px">
                        @php
                            $newDate = new DateTime($item['created']);
                            echo $newDate -> format('d M, Y h:i A');
                        @endphp
                    </p>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection
