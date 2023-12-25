/*JS isn't my expertise 😉*/
$(document).ready(function() {
    $("#menuButton").on("click", function(){
        $(".side-a").toggleClass("is-open");
        $("html").toggleClass("is-nav-open");
    });
      $("#darkMode").on("click", function(){
        $("html").toggleClass("is-dark");
    });
});

// window
$(window).click(function(){
    $("#searchWrapper").css("display", "none");
});

// ajax
$("#searchTitle").keyup(function(){
    if($("#searchTitle").val() == ""){
        $("#searchWrapper").css("display", "none");
    }

    $.ajax({
        "url" : urls.api_search,
        "method" : "POST",
        "data" : {
            "title" : $("#searchTitle").val()
        },
        success:function(data){
            $("#searchWrapper").css("display", "block");
            if(data == "[]"){
                return `
                <div class="search">
                    <p>No data found!</p>
                </div>
                `
            }
            const mapData = data.map((data)=>{
                return `
                <a href="${data.url}" class="search">
                    ${data.icons}
                    <p>${data.title}</p>
                </a>
                `
            });

            $("#searchWrapper").html(mapData);
        }
    })
});
