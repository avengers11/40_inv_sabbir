@extends('users.layout.master')
@section('master')

{{-- cards  --}}
<div style="cursor: auto" class="header_top">
    <a class="card_t" href="{{ route('web_personal_show') }}">
        @if (session()->has('csrf'))
            <img src="{{ asset('images/users_profile/'.$userData['picture']) }}" alt="">
        @else
            <img src="{{ asset('images/users_profile/random4.jpg') }}" alt="">
        @endif
        <p class="title">PROFILE</p>
    </a>

    <a class="card_t" href="{{ route('web_support_post_show') }}">
        <i class="fa-regular fa-pen-to-square"></i>
        <p class="title">STATUS</p>
    </a>

</div>

<div class="card">
    <a href="{{ route('web_support_post_show') }}" class="card_items">
        <i class="fa-solid fa-circle-plus"></i>
        <p class="title">New <span>Post</span></p>
    </a>

    <a href="{{ route('web_task_show') }}" class="card_items">
        <i class="fa-solid fa-video"></i>
        <p class="title">Your <span>Jobs</span></p>
    </a>
    {{-- <a href="{{ route('web_company_show') }}" class="card_items">
        <i class="fa-solid fa-circle-info"></i>
        <p class="title">Compnay <span>Info</span></p>
    </a> --}}
    <a href="{{ route('web_invite_show') }}" class="card_items">
        <i class="fa-solid fa-qrcode"></i>
        <p class="title">Invite <span>Friends</span></p>
    </a>

    <a href="{{ route('web_support_show') }}" class="card_items">
        <i class="fa-solid fa-headset"></i>
        <p class="title">Live <span>Chat</span></p>
    </a>

    <a href="{{ route('web_personal_team_report', ['id' => 1]) }}" class="card_items">
        <i class="fa-solid fa-square-share-nodes"></i>
        <p class="title">My <span>Team</span></p>
    </a>

    <a href="{{ route('web_vip_show') }}" class="card_items">
        <i class="fa-solid fa-briefcase"></i>
        <p class="title">Community <span>Work</span></p>
    </a>
</div>

{{-- banner  --}}
<img class="banner" src="{{ asset('images\icons\refer_earn.jpg') }}" alt="">

{{-- post  --}}
<ul style="margin-bottom:50px" class="main-feed-list">
    @foreach ($post as $item)
        @php
            $userData = App\Models\user_account::where('id', $item['userID']) -> first();
        @endphp
        <li class="main-feed-item">
            <article class="common-post">
                <header class="common-post-header u-flex">
                    <img src="{{ asset('images/users_profile/'.$userData['picture']) }}" class="user-image" width="40" height="40" alt="" />
                    <div class="common-post-info">
                        <div class="user-and-group u-flex">
                            <a href="https://www.facebook.com/eladsc" target="_blank">{{ $userData['fName']." ".$userData['lName'] }}</a>
                        </div>
                        <div class="time-and-privacy">
                            <time datetime="">
                                @php
                                    // $newFate = new DateTime($item['created']); echo $newFate -> format('d M, Y h:i:S A');
                                    $str = strtotime($item['created_at']);
                                    $now = time();
                                    $new_time = $now-$str;
                                    $muniteq = intval($new_time/60);
                                    $hours = intval($new_time/60/60);
                                    $day = intval($new_time/60/60/24);
                                    if($muniteq < 60){
                                        echo $muniteq."  m";
                                    }else if($hours < 61){
                                        echo $hours."  h";
                                    }else{
                                        echo $day."  d";
                                    }
                                @endphp
                                ago
                            </time>
                        <span class="icon icon-privacy">🌎</span></div>
                    </div>
                </header>
                <div class="common-post-content common-content">
                    <p style="{{ $item['style'] }}">{{ $item['content'] }}</p>
                    <div class="embed-content">
                        <img class="embed-content-image" src="{{ asset('images/new_post/'.$item['img']) }}" alt="" />
                    </div>
                </div>
                {{-- <div class="summary u-flex">
                    <div class="reactions">❤️</div>
                    <div class="reactions-total">28</div>
                </div>
                <section class="actions-buttons">
                    <ul class="actions-buttons-list u-flex">
                        <li class="actions-buttons-item">
                            <button class="actions-buttons-button"><span class="icon">❤️</span><span class="text">Like</span></button>
                        </li>
                    </ul>
                </section> --}}
            </article>
        </li>
    @endforeach
</ul>

<div class="paginate title mt-5">
    {{$post -> onEachSide(1) -> links()}}
</div>

@endsection
