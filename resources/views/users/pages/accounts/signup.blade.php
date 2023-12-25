<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{adminData()['title']}}</title>
    <link rel="icon" type="image/x-icon" href="{{asset("images/site/".adminData()['logo'])}}">

    <!-- css -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha512-NZ19NrT58XPK5sXqXnnvtf9T5kLXSzGQlVZL9taZWeTBtXoN3xIfTdxbkQh6QSoJfJgpojRqMfhyqBAAEeiXcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="{{asset('.\css\now\account\login.css')}}">
   <!-- script -->
   <script src="{{asset('js\old\jQuery.js')}}"></script>
   <script src="{{asset('js\old\url.js')}}?v={{Config('app.version')}}"></script>

</head>
<body>

    <section class="accounts">

        <div class="container">
            <div class="header_mr">
                <a href="{{route('web_account_show_login')}}">
                  <i class="fa-solid fa-arrow-left title"></i>
                </a>
                <p class="title site_name" style="text-transform: uppercase">costco(usa)</p>
                <span></span>
            </div>

            <form method="post" class="account_signup">

                <div class="row" style="width: 100%">
                    <p class="title text-center">Create a new account within a few moments</p>

                    <div class="col-12" id="ondevice_error"></div>

                    <span class="part1 row">
                        <div class="col-6 fName">
                            <div class="box mt-0" style="width: 100%">
                                <input required type="text" class="title" placeholder="First name..." required />
                            </div>
                            <p class="title error"></p>
                        </div>
                        <div class="col-6 lName">
                            <div class="box mt-0" style="width: 100%">
                                <input required type="text" class="title" placeholder="Last name..." required />
                            </div>
                            <p class="title error"></p>
                        </div>
                    </span>

                    <div class="col-12 mt-3 username part2 d-none">
                        <div class="box mt-0" style="width: 100%">
                            <input required type="text" class="title" placeholder="Username..." required/>
                        </div>
                        <p class="title error"></p>
                    </div>

                    <div class="row mt-3 part2 d-none" style="width: 100%">
                       <div class="col-12 number">
                            <div class="box mt-0" style="width: 100%">
                                <input type="text" minlength="11" maxlength="11" id="mobileNumber" class="title" placeholder="Your mobile number..." required/>
                                {{-- <div id="sendCode" style="width: 7rem;margin-top: 19px;" class="btn btn-primary">SEND</div> --}}
                            </div>
                            <p class="title error"></p>
                       </div>
                       {{-- <div class="col-12 send_code">
                            <div class="box mt-0" style="width: 100%">
                                <input id="shoe_code" type="number" class="title" placeholder="Number varification code..." required/>
                            </div>
                            <p class="title error"></p>
                        </div> --}}
                    </div>

                    <div class="password_box box part3 d-none row" style="width: 100%">
                        <div class="col-6 password">
                            <div class="box mt-0" style="width: 100%">
                                <input required type="text" class="title" placeholder="Password..." required/>
                            </div>
                            <p class="title error"></p>
                        </div>
                        <div class="col-6 con_pass">
                            <div class="box mt-0" style="width: 100%">
                                <input required type="text" class="title" placeholder="Confirmed password..." required/>
                            </div>
                            <p class="title error"></p>
                        </div>
                    </div>


                    <div class="col-12 mt-3 invite part3 d-none">
                        <div class="box mt-0" style="width: 100%">
                            <input type="text" class="title" placeholder="Invitation code..." value="@if(isset($_REQUEST['reg'])){{$_REQUEST['reg']}}@endif" />
                        </div>
                        <p class="title error"></p>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="box" style="width: 100%">
                            <div id="nex_button" class="title">NEXT</div>
                            <input type="submit" id="create_account" class="title submit d-none" value="CONFIRMED" />
                        </div>
                    </div>

                    <div class="box box_footer">
                        <p class="title">Already a member? <a href="{{route('web_account_show_login')}}">Login now</a> <i class="fa-solid fa-arrow-right"></i></p>
                    </div>

                </div>

            </form>

        </div>

    </section>


    <script>
        const urls = {
            'signup_check' : '{{route('api_users_accounts_signup_check')}}',
            'signup_insert' : '{{route('api_users_accounts_signup_insert')}}',
            'home' : '{{route('web_home_show')}}',
            'send_code' : '{{route('api_users_accounts_signup_send')}}',
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{asset('.\js\now\account.js')}}?v={{Config('app.version')}}"></script>

</body>
</html>
