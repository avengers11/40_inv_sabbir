// open notice 
$('.box_r').click(function(){
    $('.box_r').removeClass("active");
    $(this).addClass("active");
});

// withdraw submit 
$('.confirm').click(function(){
    $('.confirm').html('Loadding...');
    if(!$(".box_r").hasClass("active")){
        $('.confirm').html('Try Again');
        alert("Please select a method!");
        return false;
    }
    if($('.box_r.active input').val() == ""){
        $('.confirm').html('Try Again');
        window.location.href = url+"personal/bank/bdt";
        return false;
    }
    // ajax
    $.ajax({
        'url' : url+'api/users/withdraw/submit',
        'method' : 'POST',
        'data' : {
            'amount' : $('#amount').val(),
            'type' : $('.box_r.active input').val(),
        },
        success:function(data){
            if(data.st == true){
                $('.confirm').html('Success');
            }else{
                $('.confirm').html('Try Again');
            }
            $(".withdraw_notice").removeClass('d-none');
            $("#alert_withdraw").html(data.msg);
        }
    });

});