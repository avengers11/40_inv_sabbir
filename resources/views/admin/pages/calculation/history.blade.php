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
        <i class="fa fa-table"></i> DATA TABLE
    </div>

    @if ($calculation_his -> count() > 0)
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Amount</th>
                            <th>Info</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($calculation_his as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>{{$item['amount']}}</td>
                                <td>{{$item['msg']}}</td>
                                <td>{{$item['created_at']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <h4 class="text-center">No Data Found!</h4>
    @endif

    {{$calculation_his -> onEachSide(0)->links()}}
</div>
<!-- /.container-fluid-->

@endsection
