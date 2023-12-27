$(document).ready(() => {
    // get_user_data();
})

$('.task_next').click(function () {
    $('.collect_earning').html('Collect Your Earning');
    $('.task_next').addClass('btn-primary');
    $('.task_next').removeClass('btn-danger');
    $('.task_next').removeClass('btn-success');
    $('.task_next').html('Loadding...');
    $('.task_next').attr('disabled', true);
    // ajax
    $.ajax({
        "url": urlsw.get_video,
        "method": "POST",
        'data': {
            "videoID": urlsw.id
        },
        success: function (data) {
            console.log(data);
            // video add
            let random_data = data.data;

            $('.video_wrapper .video').removeClass('d-none');
            $('.video_wrapper .img').addClass('d-none');

            $('.video_wrapper .video').attr('src', url + 'video/task_video/' + random_data.video);
            $('.task_next').html('Working...');
            $('.task_next').addClass('btn-success');
            $('.task_next').removeClass('btn-primary');
            $('.task_next').removeClass('btn-site');
            // collect commission
            var video_play = document.getElementById("myVideo");
            video_play.addEventListener('loadeddata', function () {
                video_play.play();
                setTimeout(() => {
                    var x = setInterval(() => {
                        $('.task_next').html(random_data.time - Number(video_play.currentTime).toFixed(0) + 's');
                        if (Number(video_play.currentTime).toFixed(0) > Number(random_data.time)) {
                            // btn relatet
                            $('.task_next').attr('disabled', false);
                            $('.task_next').html('Next Video');
                            $('.task_next').addClass('btn-site');
                            $('.task_next').removeClass('btn-danger');
                            $('.commission_recived').removeClass('d-none');

                            clearInterval(x);
                            $('.video_wrapper .video').addClass('d-none');
                            $('.video_wrapper .img').removeClass('d-none');
                            video_play.pause();
                            $('.collect_your_commission').removeClass('d-none');
                            $('.collect_your_commission').css('display', 'block');
                        }
                    }, 1000);
                }, 1000);
            }, false);
        }
    })
});


// collect commission
$('.collect_commission').click(() => {
    $('#collect_commission').html('Loadding...');
    $('.collect_commission').prop('disabled', true);
    // ajax
    $.ajax({
        "url": urlsw.get_commission,
        "method": "POST",
        success: function (data) {
            // get_user_data();
            if (data.st == true) {
                $('#collect_commission').html('Success');
                setTimeout(() => {
                    $('#collect_commission').html('Collect Your Commission');
                    $('.collect_your_commission').slideUp(500);
                    $('.collect_commission').prop('disabled', false);
                }, 1000);
            } else {
                $('#collect_commission').html(data.msg);
                $('.collect_commission').prop('disabled', true);
            }
            $('.commission_recived').addClass('d-none');
        }
    })
})

// close
$('button.btn.btn-danger.title').click(() => {
    $('.hidden_map_search').addClass('d-none');
    $('.task_next').html('Next Task');
});

// get_user_data
const get_user_data = () => {
    // ajax
    $.ajax({
        "url": url + "api/users/task/get_users_data",
        "method": "POST",
        success: function (data) {
            $('#user_total_amount').html(data.data.totalAmount + "$");
            $('#user_today_income').html(data.data.todayIncome + "$");
            $('#user_task').html(data.data.task);
            if (data.data.task < 1) {
                $('.task_next').attr('disabled', true);
                $('.task_next').html('No More Task Today!');
            }
        }
    })
}
