<!-- Slider Show -->
@if (request()->path() == 'store')
<div class="container-fluid mt-1">
    <div class="row" style="">
        <div class="col-lg-12 px-0">
            <div class="swiper mySwiper-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://shopdunk.com/images/thumbs/0011623_banner PC valentine (1).jpeg"
                            alt="" class="slider_image">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://shopdunk.com/images/thumbs/0011621_Banner PC (2) (1).png"
                            alt="" class="slider_image">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://shopdunk.com/images/thumbs/0011615_banner PC iphone 14 Pro Max (9).jpeg"
                            alt="" class="slider_image">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://shopdunk.com/images/thumbs/0011626_Banner PC (29).png"
                            alt="" class="slider_image">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://shopdunk.com/images/thumbs/0011613_banner PC ipad gen 9 (2).jpeg"
                            alt="" class="slider_image">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
@endif
