@include('components.homecss')
<header class="header-area header-one transparent-header">
    <div class="container-fluid">
        <!--====== Header Top Bar ======-->
        <div class="header-top-bar text-white main-bg d-none d-xl-block">
            <div class="row">
                <div class="col-lg-6">
                    <!--====== Top Left ======-->
                    <div class="top-left">
                        <span>Welcome to {{env("APP_NAME")}}</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!--====== Top Right ======-->
                    <div class="top-right float-lg-right">
                        <ul class="social-link">
                            <li><a href="/admin/login" class="btn btn-sm btn-warning">Admin Area</a></li>
                            {{-- <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<!--====== End Area ======-->
<!--====== Start Banner Section ======-->
<section class="banner-section">
    <!--=== Hero Wrapper ===-->
    <div class="hero-wrapper-one gray-bg">
        <div class="container">
            <div class="row align-items-lg-center">
                <div class="col-xl-6 col-lg-12">
                    <!--=== Hero Content ===-->
                    <div class="hero-content">
                        <h1 class="wow fadeInUp" data-wow-delay=".4s">Green Environments
                            Make You Happy and
                            provide Oxygen</h1>
                        <p class="wow fadeInDown" data-wow-delay=".6s">We Provide Beautiful Gardening & Landscaping
                        </p>
                        <div class="hero-button mb-30 wow fadeInUp" data-wow-delay=".7s">
                            <a href="/farmer/register" class="main-btn golden-btn mb-10">Farmer SignUp</a>
                            <a href="/farmer/login" class="main-btn filled-btn mb-10">Farmer Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12">
                    <!--=== Hero Image Box ===-->
                    <div class="hero-image-box d-xl-block d-none wow fadeInRight" data-wow-delay=".75s">
                        <img src="{{ asset('homepage/images/hero/woman.jpg') }}" alt="Hero Image">
                        <div class="shape hero-svg">
                            <svg width="237" height="569" viewBox="0 0 237 569" fill="none">
                                <path
                                    d="M0.552583 568.307L1.99989 0.226473C1.99989 0.226473 237.025 -9.37181 236.276 284.731C235.527 578.834 0.552583 568.307 0.552583 568.307Z"
                                    fill="#F1D2A9" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End Banner Section ======-->
<!--====== Start Features Section ======-->
<section class="features-section-two p-r z-1">
    <!--=== Features Wrapper ===-->
    <div class="features-wrapper-two main-bg wow fadeInDown">
        <div class="shape shape-one"><span><img src="{{ asset('homepage/images/shape/leaf-5.png') }}"
                    alt="Leaf"></span></div>
        <div class="shape shape-two"><span><img src="{{ asset('homepage/images/shape/leaf-5.png') }}"
                    alt="Leaf"></span></div>
        <div class="shape shape-three"><span><img src="{{ asset('homepage/images/shape/leaf-5.png') }}"
                    alt="Leaf"></span></div>
        <div class="features-area pb-30">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--=== Features Item ===-->
                    <div class="single-features-item-two mb-40 wow fadeInUp">
                        <div class="text">
                            <div class="icon">
                                <i class="fl-icon flaticon-watering-plants"></i>
                                <a href="#" class="icon-btn"><i class="fal fa-long-arrow-right"></i></a>
                            </div>
                            <h5 class="title">Garden
                                Maintenance</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--=== Features Item ===-->
                    <div class="single-features-item-two mb-40 wow fadeInDown">
                        <div class="text">
                            <div class="icon">
                                <i class="fl-icon flaticon-watering-plants"></i>
                                <a href="#" class="icon-btn"><i class="fal fa-long-arrow-right"></i></a>
                            </div>
                            <h5 class="title">Garden
                                Overhauls</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--=== Features Item ===-->
                    <div class="single-features-item-two mb-40 wow fadeInUp">
                        <div class="text">
                            <div class="icon">
                                <i class="fl-icon flaticon-watering-plants"></i>
                                <a href="#" class="icon-btn"><i class="fal fa-long-arrow-right"></i></a>
                            </div>
                            <h5 class="title">Landscape
                                Design</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>
<!--====== End Features Section ======-->
@include('components.homefooter')
@include('components.homejs')
