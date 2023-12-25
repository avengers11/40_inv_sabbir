@extends('users.layout.master')
@section('master')
<link rel="stylesheet" href="{{asset('.\css\now\home\balance\deposit.css')}}">

<section class="deposit">
    @if (session() -> has('st'))
        <div style="margin-bottom: 20px" class="alert_wrapper @if(session() -> get('st') == true) success @else rejected @endif">
            @if(session() -> get('st') == true)
                <img src="{{ asset('images\icons\success.png') }}" alt="">
            @else
                <img src="{{ asset('images\icons\error.png') }}" alt="">
            @endif
            <div class="content">{{session() -> get('msg')}}</div>
        </div>
    @endif

    <form action="{{ route('api_deposit_submit') }}" method="post">
        <div class="header_mr">
            <h2>RECHARGE FORM</h2>
        </div>

        <div class="form_box">
            <label for="">Your recharge amount</label>
            <input type="text" name="amount" placeholder="Inter your recharge amount..." />
        </div>

        <div class="form_box">
            <label for="">Select recharge your method</label>
            <select name="method" id="method_type">
                @if (!empty(adminData()['bkash_number']))
                    <option value="Bkash">Bkash</option>
                @endif

                @if (!empty(adminData()['nagad_number']))
                    <option value="Nagad">Nagad</option>
                @endif

                @if (!empty(adminData()['rocket_number']))
                    <option value="Rocket">Rocket</option>
                @endif

                @if (!empty(adminData()['usdt_address']))
                    <option value="Upay">Upay</option>
                @endif
            </select>
        </div>

        <div class="form_box" >
            <label for="">Our <span id="method_text">Bkash</span> number</label>
            <div class="copy_our_num">
                <input class="copy_my_btn_t" type="text" name="number" value="{{ adminData()['bkash_number'] }}" disabled />
                <div class="btn btn-success copy_my_btn">COPY</div>
            </div>
        </div>

        <div class="form_box">
            <label for="">Your recharge number</label>
            <input type="text" name="number" placeholder="Inter your recharge number..." />
        </div>

        <div class="form_box">
            <label for="">Your recharge tranxID</label>
            <input type="text" name="tranx" placeholder="Inter your recharge tranxID..." />
        </div>
{{--
        <div class="form_box">
            <label for="">Your payment screen shot</label>
            <input type="file" name="amout" placeholder="Your payment screen shot..." />
        </div> --}}

        <button class="submit" type="submit">CONFIRMED</button>
    </form>
</div>

<!-- script -->
<script src="{{asset('.\js\now\deposit.js')}}"></script>
<script>
    // Select the text you want to copy
    $('.copy_my_btn').click(function(){
        const textToCopy = $('.copy_my_btn_t').val();
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
    $("#method_type").change(function(){
        let method = $(this).val();
        $("#method_text").html(method);

        $.ajax({
            "url" : '{{ route("api_deposit_method") }}',
            "method" : "POST",
            "data" : {
                "method" : method
            },
            success:function(data){
                console.log(data);
                $(".copy_my_btn_t").val(data.number);
            }
        })
    });
</script>

@endsection
