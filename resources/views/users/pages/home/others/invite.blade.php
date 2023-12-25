@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('css\now\home\others\invite.css')}}?v={{Config('app.version')}}">

<section id="invite_section">
    <div class="container">
        <!--copy invitaion code-->
        <div class="copy_invitation_code_wrapper">
            <div class="top">
                <h2 class="header">Invitation link below</h2>
            </div>
            <div class="body">
                <p class="title">Copy link and share with your friends & family!</p>
                <div class="text">
                    <input style="width: 100%" type="text" style="color: green !important" class="form-controll header" id="copy_my_btn_t" value="{{url('account/signup/?reg='.$userData['invite'])}}">
                    <span class="copy_my_btn">
                        COPY
                    </span>
                </div>
            </div>
            <img class="qr_code" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{url('account/signup/?reg='.$userData['invite'])}}" alt="">
        </div>


        <!-- Swiper JS -->
        <div class="paclages_card_wrapper">
            <div class="paclages_card_wrapper_header">
                <h2 class="header">Commission information</h2>
            </div>

            @if ($admin_data['refer_bonuse'] != "0")
                <p class="title" style="margin-bottom:5px">আপনি রেফার করার সাথে সাথে পাবেন {{$admin_data['refer_bonuse']}} টাকা.</p>
                <p class="title">নিয়ম : {{$admin_data['refer_bonuse_info']}}</p>
            @endif

            @if ($admin_data['depositGen1st'] != "0" && $admin_data['taskGen1st'] != "0")
                <div style="margin-top: 50px" class="paclages_card_wrapper_footer">
                    <div class="cards">
                        <h2 class="header">ডিপজিট কমিশন</h2>
                        <p class="title">* ১ম জেনারেশন : {{$admin_data['depositGen1st']}} % </p>
                        <p class="title">* ২য় জেনারেশন : {{$admin_data['depositGen2nd']}} % </p>
                        <p class="title">* ৩য় জেনারেশন : {{$admin_data['depositGen3rd']}} % </p>
                    </div>
                    <div class="cards">
                        <h2 class="header">জেনারেশন কমিশন</h2>
                        <p class="title">* ১ম জেনারেশন : {{$admin_data['taskGen1st']}} % </p>
                        <p class="title">* ২য় জেনারেশন : {{$admin_data['taskGen2nd']}} % </p>
                        <p class="title">* ৩য় জেনারেশন : {{$admin_data['taskGen3rd']}} % </p>
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>

<script>
    // Select the text you want to copy
    $('.copy_my_btn').click(function(){
        const textToCopy = $('#copy_my_btn_t').val();
        $(this).html("COPING...");
        setTimeout(() => {
            $(this).html("COPY");
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
</script>
@endsection
