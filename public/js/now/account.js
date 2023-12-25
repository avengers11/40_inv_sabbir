// account login
$('.account_login').submit(function(e){
    e.preventDefault();
    $('.submit').val('Loadding...');
    $('.password_error').html('');
    $('.username_error').html('');

    // ajax
    $.ajax({
        'url' : urls.login,
        'method' : 'POST',
        'data' : {
            'userName' : $('.username').val(),
            'password' :$('.password').val(),
        },
        success:function(data){
            if(data.st == true){
                $('.submit').val('SUCCESS');
                window.location.href=urls.home;
            }else{
                if(data.password != 'undefined'){
                    $('.password_error').html(data.password);
                }
                if(data.username != 'undefined'){
                    $('.username_error').html(data.username);
                }
            }
        }
    });
});



/*
==================
     SIGN UP
==================
*/

// create account
$('.account_signup').submit(function(e){
    e.preventDefault();

    $('#create_account').val('Loadding...');
    $('#create_account').attr('disabled', true);

    $('.username').children('.error').html("");
    $('.number').children('.error').html("");
    $('.invite').children('.error').html("");
    $('.con_pass').children('.error').html("");
    $('.password').children('.error').html("");
    $('.send_code').children('.error').html("");

    if($('.password').children('.box').children('input').val().length < 6){
        setTimeout(() => {
            $('.password').children('.error').html("Password must be 6 digit!");
            $('#create_account').val('Try Again');
            $('#create_account').attr('disabled', false);
        }, 200);
        return false;
    }

    // if($("#shoe_code").val() == "" || sessionStorage.getItem('code') != $("#shoe_code").val()){
    //     $('.send_code .error').html("Your varification code does't match!");
    //     setTimeout(() => {
    //         $('#create_account').val('Try Again');
    //         $('#create_account').attr('disabled', false);
    //     }, 200);
    //     return false;
    // }

    // ajax
    $.ajax({
        'url' : urls.signup_insert,
        'method' : 'POST',
        'data' : {
            'fName' : $('.fName').children('.box').children('input').val(),
            'lName' : $('.lName').children('.box').children('input').val(),
            'username' : $('.username').children('.box').children('input').val(),
            'number' : $('.number').children('.box').children('input').val(),
            'con_password' : $('.con_pass').children('.box').children('input').val(),
            'invite' : $('.invite').children('.box').children('input').val(),
            'password' : $('.password').children('.box').children('input').val(),
        },
        success:function(data){
            if(data.st == true){
                $('#create_account').val('SUCCESS');
                window.location.href=urls.home;
                sessionStorage.removeItem('code');
                sessionStorage.removeItem('time');
            }else{
                if(data.username != 'undefined'){
                    $('.username').children('.error').html(data.username);
                }
                if(data.number != 'undefined'){
                    $('.number').children('.error').html(data.number);
                }
                if(data.invite != 'undefined'){
                    $('.invite').children('.error').html(data.invite);
                }
                if(data.password != 'undefined'){
                    $('.con_pass').children('.error').html(data.password);
                }
                if(data.one_device != 'undefined'){
                    $('#ondevice_error').html('<h2 class="text-center mb-5 mt-5 text-danger">'+data.one_device+'</h2>');
                }
                $('#create_account').val('Try Again');
            }
            $('#create_account').attr('disabled', false);
        }
    });
});

// ===================
// nex_button
$("#nex_button").click(function(){
    if($(".part2").hasClass('d-none') == false){
        $(".part3").removeClass('d-none');
        $("#nex_button").addClass('d-none');
        $("#create_account").removeClass('d-none');
    }
    if($(".part2").hasClass('d-none')){
        $(".part2").removeClass('d-none');
    }
});

// ready
$(window).ready(function(){
    startCoundown();
});

// ================
$("#sendCode").click(function(){
    $("#sendCode").html("Loading...");
    // check in
    let old_time = sessionStorage.getItem('time');
    let new_time = Math.floor(new Date().getTime());
    let time_left = Math.floor((old_time-new_time)/1000);
    if(time_left > 1){
        startCoundown();
        return false;
    }

    let number = $("#mobileNumber").val();
    $.ajax({
        "url" : urls.send_code,
        "method" : "POST",
        "data" : {
            "number" : number
        },
        success:function(data){
            sessionStorage.setItem('code', data.code);
            sessionStorage.setItem('time', Math.floor(new Date().getTime() + 80000));
            startCoundown();
        }
    });
});
// ======
function startCoundown() {
    let old_time = sessionStorage.getItem('time');
    var x = setInterval(() => {
        let new_time = Math.floor(new Date().getTime());
        let time_left = Math.floor((old_time-new_time)/1000);
        if(time_left < 1){
            clearInterval(x);
            $("#sendCode").html("SEND");
        }else{
            $("#sendCode").html(time_left+"s");
        }
        console.log(time_left);
    }, 1000);
}
