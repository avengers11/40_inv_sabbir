<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>{{adminData()['title']}}</title>
        <link rel="icon" type="image/x-icon" href="{{asset("images/site/".adminData()['logo'])}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" />
        <link rel="stylesheet" href="{{ asset('css\now\main.css') }}">
        <link rel="stylesheet" href="{{ asset('css\now\home\home.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('js\old\main.js') }}"></script>
    </head>
    <body>
        <!-- partial:index.partial.html -->
        <button class="icon-button e-dark-mode-button u-animation-click" id="darkMode" aria-label="Dark Mode"><span class="icon" aria-hidden="true">🌜</span></button>
        <div class="common-structure">
            <header class="main-header u-flex">
                <div class="start u-flex">
                    <a href="{{ route('web_home_show') }}"><img style="width:55px; margin-right:10px" src="{{asset("images/site/".adminData()['logo'])}}" alt=""></a>
                    <div class="search-box-wrapper">
                        <input type="search" class="search-box" id="searchTitle" placeholder="Search anythings..." />
                        <span class="icon-search" aria-label="hidden">🔎</span>
                    </div>
                </div>
                <nav class="main-nav">
                    <ul class="main-nav-list u-flex">
                        @if (!session()->has('csrf'))
                            <li style="align-items: center" class="user-nav-item u-only-small">
                                <a href="{{ route('web_account_show_login') }}" class="icon-button alt-text" aria-label="Home"><i class="fa-solid fa-right-from-bracket"></i></a>
                            </li>
                        @endif
                        <li class="main-nav-item u-only-small">
                            <button aria-label="Menu" class="main-nav-button u-animation-click" id="menuButton"><span class="icon icon-hamburger" aria-hidden="true"></span></button>
                        </li>
                    </ul>
                </nav>

                @if (!session()->has('csrf'))
                    <nav class="user-nav">
                        <ul class="user-nav-list u-flex">
                            <li class="user-nav-item">
                                <a href="{{ route('web_account_show_login') }}" class="icon-button alt-text" aria-label="Home"><i class="fa-solid fa-right-from-bracket"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif

                <div class="end"></div>
            </header>


            <nav class="user-nav">
                <ul class="user-nav-list u-flex">
                    <li class="user-nav-item">
                        <a href="{{ route('web_home_show') }}" class="icon-button alt-text @if(Route::is("web_home_show")) active @endif" aria-label="Home"><i class="fa-solid fa-house-user"></i></a>
                    </li>
                    <li class="user-nav-item">
                        <a href="{{ route('web_support_post_show') }}" class="icon-button alt-text @if(Route::is("web_support_post_show")) active @endif" aria-label="Post"><i class="fa-solid fa-circle-plus"></i></a>
                    </li>
                    <li class="user-nav-item">
                        <a href="{{ route('web_task_show') }}" class="icon-button alt-text @if(Route::is("web_task_show")) active @endif" aria-label="Jobs"><i class="fa-solid fa-video"></i></a>
                    </li>
                    <li class="user-nav-item">
                        <a href="{{ route('web_info_show') }}" class="icon-button alt-text @if(Route::is("web_info_show")) active @endif" aria-label="Notification"><i class="fa-solid fa-bell"></i></a>
                    </li>
                </ul>
            </nav>
            <aside class="side-a">
                <section class="common-section">
                    <h2 class="section-title u-hide">User Navigation</h2>
                    <ul class="common-list">
                        <li class="common-list-item">
                            <a href="{{ route('web_personal_show') }}" class="common-list-button">
                                <span class="icon"><i class="fa-solid fa-user"></i></span>
                                <span class="text">Profile</span>
                            </a>
                        </li>
                        <li class="common-list-item">
                            <a href="{{ route('web_vip_show') }}" class="common-list-button">
                                <span class="icon"><i class="fa-solid fa-box-open"></i></span>
                                <span class="text">Platform Jobs</span>
                            </a>
                        </li>
                        <li class="common-list-item">
                            <a href="{{ route('web_company_show') }}" class="common-list-button">
                                <span class="icon"><i class="fa-solid fa-building"></i></span>
                                <span class="text">Company</span>
                            </a>
                        </li>
                        <li class="common-list-item">
                            <a href="{{ route('web_task_show') }}" class="common-list-button">
                                <span class="icon"><i class="fa-solid fa-video"></i></span>
                                <span class="text">Jobs</span>
                            </a>
                        </li>
                        <li class="common-list-item">
                            <a href="{{ route('web_personal_team_report', ['id' => 1]) }}" class="common-list-button">
                                <span class="icon"><i class="fa-solid fa-users"></i></span>
                                <span class="text">My Team</span>
                            </a>
                        </li>
                        <li class="common-list-item">
                            <a href="{{ route('web_history_task_all_show') }}" class="common-list-button">
                                <span class="icon"><i class="fa-solid fa-clock-rotate-left"></i></span>
                                <span class="text">Jobs History</span>
                            </a>
                        </li>
                        <li class="common-list-item">
                            <a href="{{ asset('apps/Costco USA.apk') }}" download="CostcoUSA" class="common-list-button">
                                <span class="icon"><i class="fa-solid fa-download"></i></span>
                                <span class="text">Download Apps</span>
                            </a>
                        </li>

                        @if (session()->has('csrf'))
                            <li class="common-list-item">
                                <a href="{{ route('web_users_logout') }}" class="common-list-button">
                                    <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                                    <span class="text">Log Out</span>
                                </a>
                            </li>
                        @endif

                    </ul>
                </section>
            </aside>
            <main class="main-feed">

                <div style="display: none;" id="searchWrapper">
                </div>

                @yield('master')

            </main>
            <aside class="side-b">
                <section class="common-section">
                    <h2 class="section-title">Welcome</h2>
                    <ul class="common-list">
                        <li class="common-list-item">
                            <a class="common-list-button is-ads">
                                <div class="text">
                                    <h4 class="ads-title">Thank you for visit our site.</h4>
                                    <p class="ads-url">{{ url('') }}</p>
                                </div>
                            </a>
                        </li>
                    </ul>

                </section>
            </aside>
        </div>
        <!-- partial -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            const urls = {
                "api_search" : '{{ route("api_search") }}'
            }
        </script>
        <script src="{{ asset('js\now\home.js') }}"></script>
    </body>
</html>
