@extends('admin.layout.master')
@section('admin_master')
<!-- Example DataTables Card-->
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

<div class="card p-3 mb-3">
    <h4 class="mt-4 mb-5 text-center">Packages</h4>
    <form action="{{route("tools_post_users_company_api")}}" method="POST" class="mb-5" enctype="multipart/form-data">

        <div class="form-group mb-4">
            <label for="">Img</label>
            <input type="file" class="form-control" name="img"   placeholder="name" />
        </div>

        <div class="form-group mb-4">
            <label for="">Write your content here</label>
            <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Content..."></textarea>
        </div>

        <div class="row">
            <div class="col-6">
                <button type="submit" style="width: 100%" class="btn btn-success">Add New</button>
            </div>
        </div>

    </form>
</div>

<div class="card mb-3">
    @if ($post -> count() > 0)
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>IMG</th>
                            <th>CONTENT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($post as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>
                                    @if ($item['img'] != "default.png")
                                        <img  style="width: 5rem; height:5rem" src="{{asset('images/company/'.$item['img'])}}" />
                                    @else
                                        Only Text
                                    @endif
                                </td>
                                <td>{{$item['content']}}</td>
                                <td>
                                    <a onclick="return confirm('You want to delete this item??')" href="{{route('tools_post_company_delete_api', ['id' => $item['id']])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <h4 class="text-center">No Data Found!</h4>
    @endif

    {{$post -> onEachSide(0)->links()}}
</div>
<!-- /.container-fluid-->

@endsection
