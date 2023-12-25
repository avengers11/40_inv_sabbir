@extends('admin.layout.master')
@section('admin_master')
<div class="container">
    <div class="row">
        @if (session() -> has('msg'))
            <div class="alert alert-success col-12" role="alert">
                <h4 class="alert-heading">Alert</h4>
                <hr>
                <p>{{session() -> get('msg')}}</p>
            </div>
        @endif
    </div>
</div>

<div class="contaner">
    <div class="row">
        <div class="col-12">
            <div class="card" style="width: 100%;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Available Amount : {{$adminData['available_amount']}} ৳</li>
                    <li class="list-group-item">Total Deposit : {{$total_deposit}} ৳</li>
                    <li class="list-group-item">Total Withdraw : {{$total_withdraw}} ৳</li>
                    <br>
                    <hr>
                    <li class="list-group-item">Site Promotion & Others : {{$adminData['site_promotion']}} ৳</li>
                    <li class="list-group-item">We Recived : {{$adminData['we_recived']}} ৳</li>
                </ul>
            </div>
        </div>

        <div class="col-12 mt-5 mb-5">
            <form style="border:1px solid green" class="p-2" action="{{route('api_calculation_add')}}">
                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="number" name="amount" class="form-control" placeholder="Inter Amount..."/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Info</label>
                    <input type="text" name="msg" class="form-control" placeholder="Type Info..."/>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Type</label>
                    <select name="type" class="form-select" >
                        <option value="Promotion">Site Promotion & Others?</option>
                        <option value="Recived">We Recived</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
        <div class="col-12 mb-5">
            <a href="{{route('show_calculation_history')}}" style="width:100%" class="btn btn-success">History</a>
        </div>

    </div>
</div>

@endsection
