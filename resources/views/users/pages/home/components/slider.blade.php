<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<style>
.mySwiper {
    width: 100%;
    height: 30vh;
    border: 1px solid var(--border-color);
    border-bottom: none;
    border-top: none;
}

.swiper-slide {
    font-size: 18px;
    color: #fff;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.mySwiper .swiper-slide img{
    width: 100%;
    height: 30vh
}

.parallax-bg {
    position: absolute;
    left: 0;
    top: 0;
    width: 130%;
    height: 100%;
    -webkit-background-size: cover;
    background-size: cover;
    background-position: center;
}

/* swipper 2 */
.mySwiper2 {
    width: 100%;
    height: 20vh;
}
.mySwiper2 img{
    width: 100%;
    height: 20vh;
    border-radius:7px;
}
</style>

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
      @foreach ($slider as $item)
        <div class="swiper-slide"><img src="{{asset('images/home/slider/'.$item['img'])}}" /></div>
      @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    // slider st 
    var swiper = new Swiper(".mySwiper", {
        speed: 600,
        parallax: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        loop:true,
        autoplay:{
            delay:3000
        }
        
    });
</script>