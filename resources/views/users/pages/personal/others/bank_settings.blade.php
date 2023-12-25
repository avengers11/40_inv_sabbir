@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\personal\others\bank_settings.css')}}">

<section class="bank_settings">
    <div class="container">
        <div class="main-header">
            BANK SETTINGS
        </div>

        <div class="header_r">
            <a href="{{route('web_personal_bank', ['data' => 'bdt'])}}" class="btn btn-primary title text-light">Bank</a>
            <a href="{{route('web_personal_bank', ['data' => 'usdt'])}}" class="btn btn-secondary title text-light">USDT</a>
        </div>

        @if (session() -> has('msg'))
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
            </svg>
            <div class="alert alert-primary d-flex align-items-center mt-5 mb-5" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                <div>
                    <span class="title">{{ session() -> get('msg') }}</span>
                </div>
            </div>
        @endif

        <div class="bank @if($data != "bdt") d-none @endif">
            <form action="{{route("users_personal_bank_setting_bdt_api")}}" method="post">
                <p class="header mb-3">Submit your bank account</p>
                <div class="box_i mb-4">
                    <p class="title">Bank Name</p>
                    <select name="acc_bdt_method" class="form-select title" required>
                        <option value="{{$userData["acc_bdt_method"]}}">{{$userData["acc_bdt_method"]}}</option>
                        <option class="@if($userData["acc_bdt_method"] == "Bkash") d-none @endif" value="Bkash">Bkash</option>
                        <option class="@if($userData["acc_bdt_method"] == "Nagad") d-none @endif" value="Nagad">Nagad</option>
                        <option class="@if($userData["acc_bdt_method"] == "Rocket") d-none @endif" value="Rocket">Rocket</option>
                    </select>
                </div>
                <div class="box_i mb-4">
                    <p class="title">Bank number</p>
                <input type="text" placeholder="Please enter your bank number" class="title form-control" value="{{$userData["acc_bdt_number"]}}" name="acc_bdt_number" required>
                </div>
                <div class="box_i mb-4">
                    <p class="title">User Name</p>
                    <input type="text" placeholder="Please enter your bank username name" class="title form-control" value="{{$userData["acc_bdt_name"]}}" name="acc_bdt_name" required>
                </div>

                <input type="submit" value="CONFIRMED" class="btn btn-success title text-light">
            </form>
        </div>

        <div class="bank @if($data != "usdt") d-none @endif">
            <form action="{{route("users_personal_bank_setting_usdt_api")}}" method="post">
                <p class="header mb-3">Submit your USDT account</p>
                <div class="box_i mb-4">
                    <p class="title">Account type</p>
                    <select name="acc_usdt_method" class="form-select title" id="">
                        <option value="TRC20">TRC20</option>
                    </select>
                </div>
                <div class="box_i mb-4">
                    <p class="title">Account address</p>
                    <input type="text" placeholder="Please enter your bank address" class="title form-control" value="{{$userData["acc_usdt_address"]}}" name="acc_usdt_address" required>
                </div>
                <div class="box_i mb-4">
                    <p class="title">User Name</p>
                    <input type="text" placeholder="Please enter your bank username name" class="title form-control" value="{{$userData["acc_usdt_name"]}}" name="acc_usdt_name" required>
                </div>

                <input type="submit" value="CONFIRMED" class="btn btn-success title text-light">
            </form>
        </div>


    </div>
</section>

@endsection