@extends('users.layout.master')
@section('master')

<div class="header_mr">
    <h2 class="main-header">COMPANY NOTIFICATION</h2>
</div>

{{-- post  --}}
@if (session()->has('csrf'))
    @if (\App\Models\company_profile_likes::where('user_id', $userData['id'])->exists())
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
                    </article>
                </li>
            @endforeach
        </ul>
    @else
        <a href="{{ route('web_company_show') }}" class="not_purchess">
            <p>Goto Company Profile</p>
        </a>
    @endif

@else
    <a href="{{ route('web_company_show') }}" class="not_purchess">
        <p>Goto Company Profile</p>
    </a>
@endif

@endsection
