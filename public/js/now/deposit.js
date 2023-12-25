// btn click 
$(".rechrage_method .mr_b").click(function(){
    $(".rechrage_method .mr_b").addClass("btn-outline-secondary");
    $(".rechrage_method .mr_b").removeClass("btn-outline-success");
    $(".rechrage_method .mr_b").removeClass("btn-outline-success active text-light");
    $(this).addClass("active text-light");
    if($(this).hasClass('btn-outline-secondary')){
        $(this).removeClass("btn-outline-secondary");
        $(this).addClass("btn-outline-success");
    }else{
        $(this).addClass("btn-outline-secondary");
        $(this).removeClass("btn-outline-success");
    }
});
$(".recharge_amount .mr_b").click(function(){
    $(".recharge_amount .mr_b").addClass("btn-outline-secondary");
    $(".recharge_amount .mr_b").removeClass("btn-outline-success active text-light");
    $(this).addClass("active text-light");
    if($(this).hasClass('btn-outline-secondary')){
        $(this).removeClass("btn-outline-secondary");
        $(this).addClass("btn-outline-success");
    }else{
        $(this).addClass("btn-outline-secondary");
        $(this).removeClass("btn-outline-success");
    }
    // usd or bdt 
    if($(this).html() == "BDT"){
        $(".all_amount_box.bdt").removeClass('d-none');
        $(".all_amount_box.usdt").addClass('d-none');
    }else{
        $(".all_amount_box.bdt").addClass('d-none');
        $(".all_amount_box.usdt").removeClass('d-none');
    }
});

$(".all_amount_box .mr_b").click(function(){
    $(".all_amount_box .mr_b").addClass("btn-outline-secondary");
    $(".all_amount_box .mr_b").removeClass("btn-outline-success");
    $(".all_amount_box .mr_b").removeClass("btn-outline-success active text-light");
    $(this).addClass("active text-light");
    if($(this).hasClass('btn-outline-secondary')){
        $(this).removeClass("btn-outline-secondary");
        $(this).addClass("btn-outline-success");
    }else{
        $(this).addClass("btn-outline-secondary");
        $(this).removeClass("btn-outline-success");
    }
    // usdt or bdt 
    if($(".recharge_amount button.btn.title.mr_b.active").html() == "BDT"){
        $('#exchange_amount').html(Number($(this).children("span").html()/Number($('#dollar_rate').val())).toFixed(2));
        $("#current_amount").html($(this).children("span").html()+"৳");
    }else{
        $('#exchange_amount').html($(this).children("span").html());
        $("#current_amount").html($(this).children("span").html()+"$");
    }
});

// box click 
$(".deposit .container .payment_part_2 .box_r .drop_down .box_m").click(function(){
    $(".deposit .container .payment_part_2 .box_r .drop_down .box_m").removeClass("active");
    $(this).addClass("active");
    $(".drop_down").addClass("d-none");
    // okay 
    let type = $(".rechrage_method button.btn.btn-outline-success.title.mr_b.active.text-light").html();
    let method;
    if(type == "USDT"){
        method = $(".usdt .drop_down .box_m.active .title").html();
    }else{
        method = $(".bdt .drop_down .box_m.active .title").html();
    }
    $(".select_payment_method").html("Your payment method is "+method);
});

// payment method 
$('#payment_method').click(function(){
    if($(".drop_down").hasClass("d-none")){
        $(".drop_down").removeClass("d-none");
    }else{
        $(".drop_down").addClass("d-none");
    }
});

// payment 01 
$('.payment_part_1 button.btn.btn-success.next.title').click(function(){
    if($(".rechrage_method button.btn.title.mr_b.active").html() == "Bank Card"){
        $('.payment_part_2.bdt').removeClass("d-none");
        $('.payment_part_1').addClass("d-none");
        $(".amount_send").html($("#current_amount").html());
    }else{
        $('.payment_part_2.usdt').removeClass("d-none");
        $('.payment_part_1').addClass("d-none");
        $(".amount_send").html(Number($("#exchange_amount").html())+"$");
    }
    $('.order_amount').html($("#exchange_amount").html()+"$");
    count_sown();
});

// payment 02
$('.payment_part_2 button.btn.btn-success.next.title').click(function(){
    if($(".rechrage_method button.btn.title.mr_b.active").html() == "Bank Card"){
        if($("#number").val() == ""){
            alert("please enter your account number")
            return false;
        }
        $('.payment_part_3.bdt').removeClass("d-none");
        $('.payment_part_2').addClass("d-none");
        let method = $(".bdt .drop_down .box_m.active .title").html();
        if(method == "Bkash"){
            $("img.bkash").removeClass("d-none");
            $(".my_payment_address").html($("#deposit_bkash").val());
        }else if(method == "Nagad"){
            $("img.nagad").removeClass("d-none");
            $(".my_payment_address").html($("#deposit_nagad").val());
        }else{
            $("img.rocket").removeClass("d-none");
            $(".my_payment_address").html($("#deposit_rocket").val());
        }
    }else{
        $('.payment_part_3.usdt').removeClass("d-none");
        $('.payment_part_2').addClass("d-none");
        $(".my_payment_address").html($("#deposit_usdt").val());
    }
});

// count down 
const count_sown = () => {
    let time = 300;
    setInterval(() => {
        time--;
        let minutes = Math.floor(time / 60);
        let seconds = time % 60;
        $("#count_sown").html(minutes+":"+seconds);
        if(time < 1){
            location.reload();
        }
    }, 1000);
}

// confirm 
$('.confirm').click(function(){
    $('.confirm').html('Loadding...');
    let amount = $("#exchange_amount").html();
    let number = $("#number").val();
    let type = $(".rechrage_method button.btn.btn-outline-success.title.mr_b.active.text-light").html();
    let orderId = $(".order_id").html();
    let tranxid;
    let method;
    if(type == "USDT"){
        method = $(".usdt .drop_down .box_m.active .title").html();
        tranxid = $(".usdt .tranxID").val();
    }else{
        method = $(".bdt .drop_down .box_m.active .title").html();
        tranxid = $(".bdt .tranxID").val();
    }
    // ajax 
    $.ajax({
        "url" : url+"api/users/deposit/submit",
        "method" : "POST",
        "data" : {
            "number" : number,
            "amount" : amount,
            "orderID" : orderId,
            "method" : method,
            "tranx" : tranxid,
            "type" : type,
        },
        success:function(data){
            if(data.st == true){
                $('.confirm').html('SUCCESS');
            }else{
                $('.confirm').html('Try Again');
            }
            $('.deposit_notice').removeClass('d-none');
            $("#alert_deposit").html(data.msg);
        }
    })

});


// copy 
// Select the text you want to copy
$('i.copy_my_btn').click(function(){

    let type = $(".rechrage_method button.btn.btn-outline-success.title.mr_b.active.text-light").html();
    var textToCopy = "";
    if(type == "USDT"){
        textToCopy = $(".usdt .my_payment_address").html();
    }else{
        textToCopy = $(".bdt .my_payment_address").html();
    }

    $(this).addClass('fa-spinner');
    $(this).removeClass('fa-copy');
    $(this).removeClass('fa-circle-check');
    setTimeout(() => {
        $(this).removeClass('fa-spinner');
        $(this).removeClass('fa-copy');
        $(this).addClass('fa-circle-check');
    }, 500);
    try {
    // Use the newer Clipboard API if available
    navigator.clipboard.writeText(textToCopy).then(function() {
    }, function() {
        // If Clipboard API is not available, use document.execCommand() instead
        const textField = document.createElement("textarea");
        textField.value = textToCopy;
        document.body.appendChild(textField);
        textField.select();
        document.execCommand("copy");
        textField.remove();
        });
    } catch (err) {
        // Fallback to document.execCommand() if Clipboard API is not available
        const textField = document.createElement("textarea");
        textField.value = textToCopy;
        document.body.appendChild(textField);
        textField.select();
        document.execCommand("copy");
        textField.remove();
    }
});