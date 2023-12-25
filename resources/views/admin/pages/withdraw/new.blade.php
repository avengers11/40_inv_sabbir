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

    @if ($user_account -> count() > 0)
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Account</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($user_account as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                               
                                @if ($item['method'] == "TRC20")
                                    <td>{{$item['amount']."$ , ".$adminData['withdraw_charge'].'% charge'}} = @php echo $item['amount']-(($item['amount']*$adminData['withdraw_charge'])/100).'$' @endphp</td>
                                @else
                                    <td>{{$item['amount']*$adminData['dollar_rate']."৳ , ".$adminData['withdraw_charge'].'% charge'}} = @php echo ($item['amount']-(($item['amount']*$adminData['withdraw_charge'])/100))*$adminData['dollar_rate'].'৳' @endphp</td>
                                @endif
                               
                                <td>{{$item['method']}}</td>
                                <td>{{$item['address']}}</td>
                               <td>{{$item['created_at']}}</td>
                                <td>
                                    <a onclick="return confirm('You want to reject this item??')" href="{{route('api_withdraw_rejected', ['id' => $item['id']])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    <a onclick="return confirm('You want to accept this item??')" href="{{route('api_withdraw_success', ['id' => $item['id']])}}" class="btn btn-success"><i class="fa-solid fa-square-check"></i></a>
                                    <a href="{{route('show_users_profile', ['id' => $item['userID']])}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
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

    {{$user_account -> onEachSide(0)->links()}}
</div>
<!-- /.container-fluid-->

@endsection
