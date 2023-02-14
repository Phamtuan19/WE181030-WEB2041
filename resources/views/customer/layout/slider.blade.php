{{-- <!-- Slider Show -->
@if (request()->path() == 'store')
    <div class="container mt-4">
        <div class="row" style="">
            <div class="col-lg-12">
                <div class="swiper mySwiper-slider" >
                    <div class="swiper-wrapper" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">

                        @foreach ($sliders as $slider)
                            <div class="swiper-slide">
                                <img src="{{ $slider->image_path }}" alt="{{ $slider->image_path }}"
                                    class="slider_image" style="width: 100%; height: 450px; cursor: pointer; border-radius: 5px">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
@endif --}}
