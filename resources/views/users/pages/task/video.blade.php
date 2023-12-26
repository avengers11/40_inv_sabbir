@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\task\task.css')}}?v={{Config('app.version')}}">

<section id="task" style="margin-bottom:14rem">

   <div class="container">
        <div class="video_wrapper">
            <video id="myVideo" src="{{asset('video/task_video/'.$videoTask['video'])}}" class="video"></video>
        </div>
        <button class="task_next title btn btn-success" @if($userData['task'] < 1) disabled @endif>@if($userData['task'] < 1) No more works today!  @else Start Video  @endif</button>
   </div>

</section>


<!-- hidden  -->
<div class="hidden_notice commission_recived d-none">
    <div class="container">
        <div class="container_wrapper">
            <div class="top">
                <h4 class="header text-warning">
                    <span>
                        <i class="fa-solid fa-hand-point-right text-success"></i>
                    </span>
                     <span>Your Commission</span>
                    <span>
                        <img class="close" src="{{ asset('images\icons\close.png') }}" alt="">
                    </span>
                </h4>
            </div>

            <div class="bottom">
                <div class="bottom_top">
                    <div class="products_wrapper">
                        <p class="title text-light">Commission : <span>@php echo $adminData['task_commission'] @endphp</span> BDT</p>
                    </div>
                </div>
                <div class="bottom_bottom">
                    <a href="{{ route('api_task_get_commission', ['id' => $id]) }}" class="btn btn-success title collect_commission">
                        COLLECT
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- script -->
<script>
    const urlsw = {
        "get_video" : '{{ route('api_task_get_video') }}',
        "id" : '{{ $id }}'
    }
</script>
<script src="{{asset('.\js\now\task.js')}}"></script>

@endsection
