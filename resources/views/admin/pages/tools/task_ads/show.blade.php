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

<div class="card mb-3">
    <div class="card-header">
        <span>
            <i class="fa fa-table"></i>
            <span>DATA TABLE</span>
        </span>
        <a href="{{route('ads.show_tools_add')}}" class="btn btn-success float-right">Add New</a>
    </div>

    @if ($ads -> count() > 0)
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Video</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($ads as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>
                                    <video style="width: 5rem; height:5rem" src="{{asset('video/task_video/'.$item['video'])}}" controls></video>
                                </td>
                                <td>{{$item['time']}}</td>
                                <td>
                                    <a onclick="return confirm('You want to delete this item??')" href="{{route('api_show_tools_ads_delete', ['id' => $item['id']])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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

    {{$ads -> onEachSide(0)->links()}}
</div>
<!-- /.container-fluid-->

@endsection
