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

    @if ($monthlyData -> count() > 0)
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr.Number</th>
                            <th>Total Amount</th>
                            <th>Total Withdraw</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = ($monthlyData->currentPage() - 1) * $monthlyData->perPage() + 1 @endphp
                        @foreach ($monthlyData as $item)
                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$item['total_amount']}}</td>
                                <td>{{$item['row']}}</td>
                                <td>{{$item['date']}}</td>
                            </tr>
                            @php $counter++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <h4 class="text-center">No Data Found!</h4>
    @endif

    {{$monthlyData -> onEachSide(0)->links()}}
</div>
<!-- /.container-fluid-->

@endsection
