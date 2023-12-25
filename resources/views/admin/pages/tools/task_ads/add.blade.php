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

<div class="container">
    <h4 class="mt-4 mb-5 text-center">ADD NEW ADS </h4>
    <form action="{{route('api_show_tools_ads_add')}}" method="POST" class="mb-5" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Cover img</label>
            <input type="file" class="form-control" required name="img" />
        </div>

        <div class="form-group mb-4">
            <label for="">Add Video</label>
            <input type="file" class="form-control" required name="video" />
        </div>

        <div class="form-group mt-2">
            <label for="">Title</label>
            <input type="text" class="form-control" required name="title"  placeholder="Title..." />
        </div>

        <div class="form-group mt-2">
            <label for="">Description</label>
            <input type="text" class="form-control" required name="header"  placeholder="Description..." />
        </div>

        <div class="form-group mt-2">
            <label for="">Video Duration</label>
            <input type="text" class="form-control" required name="time"  placeholder="Video duration..." />
        </div>

        <div class="row mt-4">
            <div class="col-6">
                <a href="{{route('ads.show_tools_show')}}" style="width: 100%" class="btn btn-danger">Back</a>
            </div>

            <div class="col-6">
                <button type="submit" style="width: 100%" class="btn btn-success">Add New</button>
            </div>
        </div>
    </form>
</div>
@endsection
