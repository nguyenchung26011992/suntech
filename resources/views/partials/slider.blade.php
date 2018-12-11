<!-- Home -->
<div class="home">
    <div class="home_slider_container">

        <!-- Home Slider -->
        <div class="owl-carousel owl-theme home_slider">

            <!-- Home Slider Item -->
            @if (!empty($sliders))
            @foreach ($sliders as $item)
            <div class="owl-item">
                <div class="home_slider_background" style="background-image:url({!! asset($item->image) !!})"></div>
                <div class="home_slider_content">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <div class="home_slider_title">The Premium System Education</div>
                                <div class="home_slider_subtitle">Future Of Education Technology</div>
                                <div class="home_slider_form_container">
                                    <form action="#" id="home_search_form_1" class="home_search_form d-flex flex-lg-row flex-column align-items-center justify-content-between">
                                        <div class="d-flex flex-row align-items-center justify-content-start">
                                            <input type="search" class="home_search_input" placeholder="Keyword Search" required="required">
                                        </div>
                                        <button type="submit" class="home_search_button">search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>

    <!-- Home Slider Nav -->
    <div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
    <div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
</div>
