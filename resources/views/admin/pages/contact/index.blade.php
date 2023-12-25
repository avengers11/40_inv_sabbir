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

<div class="row">

    <div class="container">
        <div style="width: 100%; display:block; padding-top:1rem; padding:1rem; border-top:2px solid green;border-bottom:2px solid green;margin-bottom:2rem;">
            <h4 class="text-center">Contact Information</h4>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h4 class="text-center text-primary">All Links</h4>
            </div>
            <ul class="list-group list-group-flush">
                <form action="{{route('api_contact_telegram')}}" method="post">
                    <li class="list-group-item">
                        <input type="text" class="form-control" name="teligram_link" value="{{$adminData['teligram_link']}}" placeholder="Telegram group link...">
                    </li>
                    <li class="list-group-item">
                        <input type="text" class="form-control" name="teligram_channel" value="{{$adminData['teligram_channel']}}" placeholder="Telegram channel link...">
                    </li>
                    <li class="list-group-item">
                        <input type="text" class="form-control" name="telegram_agent" value="{{$adminData['telegram_agent']}}" placeholder="Telegram agent link...">
                    </li>
                    <br>
                    <br>
                    <li class="list-group-item">
                        <input type="text" class="form-control" name="facebook_agent" value="{{$adminData['facebook_agent']}}" placeholder="Facebook group link...">
                    </li>
                    <li class="list-group-item">
                        <input type="text" class="form-control" name="whatsApp_agent" value="{{$adminData['telegram_agent']}}" placeholder="WhatsApp group link...">
                    </li>
                    <input type="submit" value="CONFIRMED" class="btn btn-success mt-3" style="width: 100%" />
                </form>
            </ul>
        </div>
    </div>

</div>

<style>
li.list-group-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    text-align: center;
}
li.list-group-item input{
    border: none;
    outline: none;
    background: none;
}
</style>
@endsection
