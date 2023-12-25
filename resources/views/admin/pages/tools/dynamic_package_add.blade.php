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
    <h4 class="mt-4 mb-5 text-center">Packages</h4>
    <form action="{{route("api_tools_package_add")}}" method="POST" class="mb-5" enctype="multipart/form-data">

        <div class="form-group mb-4">
            <label for="">Packages Img</label>
            <input type="file" class="form-control" required name="img"   placeholder="Packages name" />
        </div>

        <div class="form-group mb-4">
            <label for="">Packages name</label>
            <input type="text" class="form-control" required name="pk_name"   placeholder="Packages name" />
        </div>

        <div class="form-group mb-4">
            <label for="">Task</label>
            <input type="text" class="form-control" required name="task"   placeholder="Task..." />
        </div>

        <div class="form-group mb-4">
            <label for="">Commission</label>
            <input type="text" class="form-control" required name="commission"   placeholder="Commission..." />
        </div>

        <div class="form-group mb-4">
            <label for="">Amount</label>
            <input type="text" class="form-control" required name="amount"   placeholder="Amount..." />
        </div>

        <div class="form-group mb-4">
            <label for="">Expired days</label>
            <input type="text" class="form-control" required name="expired_date"   placeholder="Expired in..." />
        </div>

        <div class="row">
            <div class="col-6">
                <a href="{{route("packages.show_dynamic_package")}}" style="width: 100%" class="btn btn-danger">Back</a>
            </div>

            <div class="col-6">
                <button type="submit" style="width: 100%" class="btn btn-success">Add New</button>
            </div>
        </div>
    </form>
</div>
@endsection
