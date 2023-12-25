@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\personal\others\gift.css')}}">

<section class="redeem_code">
    <div class="container">
        <div class="main-header">
            REDEEM CODE
        </div>
        <form action="" method="post">
            <h2 class="header mb-3"></h2>
            <div class="box_r">
                <i class="fa-solid fa-gift title"></i>
                <input type="text" class="title redeem_code_txt" placeholder="Write your redeem code..." required>
            </div>
            <input type="submit" value="REDEEM" class="title btn btn-success">
        </form>
    </div>
</section>
{{-- scrip  --}}
<script>
let form = $('form');
let btn = $('form .btn-success');

form.submit(function(e){
    e.preventDefault();
    btn.val('Loadding...');
    btn.attr('disabled', true);
    $('.header.mb-3').html("");
    // ajax 
    $.ajax({
        'url' : url+'api/personal/redeem_code',
        'method' : 'POST',
        'data' : {
            'redeem_code' : $('.redeem_code_txt').val()
        },
        success:function(e){
            if(e.st == true){
                btn.val('SUCCESS');
                $('.header.mb-3').html('You are recived <span class="amount">'+e.amount+'</span> BDT from REDEEM CODE '+$('.redeem_code_txt').val()+'<span>:)</span>');
            }else{
                btn.val('TRY AGAIN');
                $('.header.mb-3').html(e.msg);
            }
            btn.attr('disabled', false);
        }
    });
});
</script>
@endsection