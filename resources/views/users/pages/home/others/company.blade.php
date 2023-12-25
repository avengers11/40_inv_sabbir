@extends('users.layout.master')
@section('master')

@if (session() -> has('st'))
<div style="width: 90%" class="alert_wrapper @if(session() -> get('st') == true) success @else rejected @endif">
    @if(session() -> get('st') == true)
        <img src="{{ asset('images\icons\success.png') }}" alt="">
    @else
        <img src="{{ asset('images\icons\error.png') }}" alt="">
    @endif
    <div class="content">{{session() -> get('msg')}}</div>
</div>
@endif

<div class="company_profile">
    <img class="cover" src="{{ asset('images\icons\cover_img.jpeg') }}" alt="">
    <div class="content">
        <img class="profile" src="{{asset("images/site/".adminData()['logo'])}}" alt="">
        <h2 class="header">Company Profile</h2>
        <p class="title">{{ $like }} Following</p>
        <div class="btn_wrapper">
            <Button class="contact">Contact Us</Button>
            @if (session()->has('csrf'))
                @if (!\App\Models\company_profile_likes::where('user_id', $userData['id'])->exists())
                    <form action="{{ route('api_chat_like', ['id' => $userData['id']]) }}" method="post">
                        <Button class="flow">Follow</Button>
                    </form>
                @else
                    <Button style="background: rgb(182, 0, 0)" class="flow">Following</Button>
                @endif
            @else
            <Button  class="flow" ><a href="{{ route('web_account_show_login') }}">Login Now</a></Button>
            @endif

        </div>
    </div>
</div>

{{-- post  --}}
<ul style="margin-bottom:50px" class="main-feed-list">
    @foreach ($post as $item)
        <li class="main-feed-item">
            <article class="common-post">
                <header class="common-post-header u-flex">
                    <img src="{{ asset('images\users_profile\random4.jpg') }}" class="user-image" width="40" height="40" alt="" />
                    <div class="common-post-info">
                        <div class="user-and-group u-flex">
                            <a href="https://www.facebook.com/eladsc" target="_blank">Admin</a>
                        </div>
                        <div class="time-and-privacy"><time datetime="">
                            @php
                                // $newFate = new DateTime($item['created']); echo $newFate -> format('d M, Y h:i:S A');
                                $str = strtotime($item['created_at']);
                                $now = time();
                                $new_time = $now-$str;
                                $muniteq = intval($new_time/60);
                                $hours = intval($new_time/60/60);
                                $day = intval($new_time/60/60/24);
                                if($muniteq < 60){
                                    echo $muniteq."m";
                                }else if($hours < 61){
                                    echo $hours."h";
                                }else{
                                    echo $day."d";
                                }
                            @endphp
                            ago
                        </time><span class="icon icon-privacy">🌎</span></div>
                    </div>
                </header>
                <div class="common-post-content common-content">
                    <p>{{ $item['content'] }}</p>
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

@endsection
