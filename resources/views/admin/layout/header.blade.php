<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{adminData()['title']}}</title>
    <link rel="icon" type="image/x-icon" href="{{asset("images/site/".adminData()['logo'])}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha512-NZ19NrT58XPK5sXqXnnvtf9T5kLXSzGQlVZL9taZWeTBtXoN3xIfTdxbkQh6QSoJfJgpojRqMfhyqBAAEeiXcA==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link rel="stylesheet" href="{{asset('css\old\admin\admin.css')}}">
    <script src='{{asset('js\old\jQuery.js')}}'></script>
    <script src="{{asset('js/old/url.js')}}"></script>

</head>

<body>
    <!-- partial:index.partial.html -->

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="{{route('admin_show')}}">Admin Panel</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    {{-- DESHBORD --}}
                    <li class="nav-item {{Route::is('admin_show') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="{{route('admin_show')}}">
                            <i class="fa fa-fw fa-dashboard"></i>
                            <span class="nav-link-text">DESHBORD</span>
                        </a>
                    </li>
                    {{-- all users  --}}
                    <li class="nav-item {{Route::is('show_users_all') || Route::is('show_users_active') || Route::is('show_users_ban') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="AllUsers">
                        <a class="nav-link nav-link-collapse {{Route::is('show_users_all') || Route::is('show_users_active') || Route::is('show_users_ban') ? "active" : "collapsed"}}" data-toggle="collapse" href="#collapseAllUsers" data-parent="#exampleAccordion">
                            <i class="fa-solid fa-users"></i>
                            <span class="nav-link-text">USERS</span>
                          </a>
                        <ul class="sidenav-second-level {{Route::is('show_users_all') || Route::is('show_users_active') || Route::is('show_users_ban') ? "show" : "collapse"}}" id="collapseAllUsers">
                            <li>
                                <a style="color: {{Route::is('show_users_all') ? "green !important" : "none"}}" href="{{route('show_users_all')}}">ALL USERS</a>
                            </li>
                            <li>
                                <a style="color: {{Route::is('show_users_active') ? "green !important" : "none"}}" href="{{route('show_users_active')}}">ALL ACTIVE USERS</a>
                            </li>
                            <li>
                                <a style="color: {{Route::is('show_users_ban') ? "green !important" : "none"}}" href="{{route('show_users_ban')}}">ALL BAN USERS</a>
                            </li>
                        </ul>
                    </li>

                    {{-- all RECHARGE  --}}
                    <li class="nav-item {{Route::is('show_recharge_record') || Route::is('show_recharge_new') || Route::is('show_recharge_success') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="ALLRECHARGE">
                        <a class="nav-link nav-link-collapse {{Route::is('show_recharge_record') || Route::is('show_recharge_new') || Route::is('show_recharge_success') ? "active" : "collapsed"}}" data-toggle="collapse" href="#collapseALLRECHARGE" data-parent="#exampleAccordion">
                            <i class="fa-solid fa-wallet"></i>
                            <span class="nav-link-text">RECHARGE</span>
                          </a>
                        <ul class="sidenav-second-level {{Route::is('show_recharge_record') || Route::is('show_recharge_new') || Route::is('show_recharge_success') ? "show" : "collapse"}}" id="collapseALLRECHARGE">
                            <li>
                                <a style="color: {{Route::is('show_recharge_new') ? "green !important" : "none"}}" href="{{route('show_recharge_new')}}">NEW RECHARGE</a>
                            </li>
                            <li>
                                <a style="color: {{Route::is('show_recharge_success') ? "green !important" : "none"}}" href="{{route('show_recharge_success')}}">SUCCESS RECHARGE</a>
                            </li>
                            {{-- <li>
                                <a style="color: {{Route::is('show_recharge_record') ? "green !important" : "none"}}" href="{{route('show_recharge_record')}}">MONTHLY RECORD</a>
                            </li> --}}
                        </ul>
                    </li>
                    {{-- all withdraw  --}}
                    <li class="nav-item {{Route::is('show_withdraw_record') || Route::is('show_withdraw_new') || Route::is('show_withdraw_success') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="AllWIthdraw">
                        <a class="nav-link nav-link-collapse {{Route::is('show_withdraw_record') || Route::is('show_withdraw_new') || Route::is('show_withdraw_success') ? "active" : "collapsed"}}" data-toggle="collapse" href="#collapseAllWIthdraw" data-parent="#exampleAccordion">
                            <i class="fa-solid fa-money-bill"></i>
                            <span class="nav-link-text">WITHDRAW</span>
                          </a>
                        <ul class="sidenav-second-level {{Route::is('show_withdraw_record') || Route::is('show_withdraw_new') || Route::is('show_withdraw_success') ? "show" : "collapse"}}" id="collapseAllWIthdraw">
                            <li>
                                <a style="color: {{Route::is('show_withdraw_new') ? "green !important" : "none"}}" href="{{route('show_withdraw_new')}}">NEW WITHDRAW</a>
                            </li>
                            <li>
                                <a style="color: {{Route::is('show_withdraw_success') ? "green !important" : "none"}}" href="{{route('show_withdraw_success')}}">SUCCESS WITHDRAW</a>
                            </li>
                            {{-- <li>
                                <a style="color: {{Route::is('show_withdraw_record') ? "green !important" : "none"}}" href="{{route('show_withdraw_record')}}">MONTHLY RECORD</a>
                            </li> --}}
                        </ul>
                    </li>
                    {{-- all PAYMENT  --}}
                    <li class="nav-item {{Route::is('show_payment') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="PAYMENT">
                        <a class="nav-link" href="{{route('show_payment')}}">
                            <i class="fa-regular fa-credit-card"></i>
                            <span class="nav-link-text">PAYMENT</span>
                        </a>
                    </li>
                    {{-- all CONTACT  --}}
                    <li class="nav-item {{Route::is('show_contact') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="CONTACT">
                        <a class="nav-link" href="{{route('show_contact')}}">
                            <i class="fa-brands fa-telegram"></i>
                            <span class="nav-link-text">CONTACT</span>
                        </a>
                    </li>
                    {{-- all users  --}}
                    <li class="nav-item {{Route::is('packages.*') || Route::is('ads.*') || Route::is('post.*') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="tools">
                        <a class="nav-link nav-link-collapse {{Route::is('packages.*') || Route::is('ads.*') || Route::is('post.*') ? "active" : "collapsed"}}" data-toggle="collapse" href="#collapsetools" data-parent="#exampleAccordion">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                            <span class="nav-link-text">TOOLS</span>
                          </a>
                        <ul class="sidenav-second-level {{Route::is('packages.*') || Route::is('ads.*') || Route::is('post.*') ? "show" : "collapse"}}" id="collapsetools">
                            <li>
                                <a style="color: {{Route::is('packages.show_dynamic_package') ? "green !important" : "none"}}" href="{{route('packages.show_dynamic_package')}}">Packages</a>
                            </li>
                            <li>
                                <a style="color: {{Route::is('ads.show_tools_show') ? "green !important" : "none"}}" href="{{route('ads.show_tools_show')}}">Video ads</a>
                            </li>
                            <li>
                                <a style="color: {{Route::is('post.show_tools_users') ? "green !important" : "none"}}" href="{{route('post.show_tools_users')}}">Users Post</a>
                            </li>
                            <li>
                                <a style="color: {{Route::is('post.show_tools_users_company') ? "green !important" : "none"}}" href="{{route('post.show_tools_users_company')}}">Company Post</a>
                            </li>
                        </ul>
                    </li>
                    {{-- all SETTINGS  --}}
                    <li class="nav-item {{Route::is('show_settings') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="SETTINGS">
                        <a class="nav-link" href="{{route('show_settings')}}">
                            <i class="fa-solid fa-gears"></i>
                            <span class="nav-link-text">SETTINGS</span>
                        </a>
                    </li>

                    {{-- all SETTINGS  --}}
                    {{-- <li class="nav-item {{Route::is('show_calculation') ? "active" : ""}}" data-toggle="tooltip" data-placement="right" title="SETTINGS">
                        <a class="nav-link" href="{{route('show_calculation')}}">
                            <i class="fa-solid fa-calculator"></i>
                            <span class="nav-link-text">CALCULATION</span>
                        </a>
                    </li> --}}

                </ul>

                {{-- navbar end  --}}
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                            <i class="fa fa-fw fa-angle-left"></i>
                          </a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">

                    {{-- <li id="navbar_message_btn" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-envelope"></i>
                            <span class="">Messages
                              <span class="badge badge-pill badge-primary">New</span>
                            </span>
                        </a>
                    </li> --}}

                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2">
                            <div class="input-group">
                                <input class="form-control" type="text" id="search_username" placeholder="Search for...">
                                <span class="input-group-append">
                                <button id="search_btn" class="btn btn-primary" type="button">
                                  <i class="fa fa-search"></i>
                                </button>
                              </span>
                            </div>
                        </form>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                    </li>

                </ul>

            </div>
        </nav>


        <div class="content-wrapper">
            <div class="container-fluid">


<script>
    $('#search_btn').click(function(){
        if($('#search_username').val().length > 0){
            $('#search_btn').html('<i class="fa-solid fa-hourglass-end"></i>');
            // ajax
            $.ajax({
                "url" : url+"api/admin/search_profile/"+$('#search_username').val(),
                "method" : "get",
                "data" : {},
                success:function(data){
                    if(data.st == true){
                        $('#search_btn').html('<i class="fa-solid fa-check"></i>');
                        window.location.href=url+"admin/users/profile/"+data.data.id;
                    }else{
                        $('#search_btn').html('<i class="fa-solid fa-xmark"></i>');
                    }
                    console.log(data);
                }
            });
        }else{
            $('#search_btn').html('<i class="fa fa-search"></i>');
        }

    });

    // update msg
    $('#navbar_message_btn').click(function(){
        $.ajax({
            "url" : url+"api/admin/update_notification_data",
            "method" : "get",
            "data" : {},
            success:function(){}
        })
    });
</script>
