@include('components.homecss')

<header class="header-area header-one transparent-header">
    <div class="container-fluid">
        <!--====== Header Top Bar ======-->
        <div class="header-top-bar text-white main-bg d-none d-xl-block">
            <div class="row">
                <div class="col-lg-6">
                    <!--====== Top Left ======-->
                    <div class="top-left">
                    <i class="fa fa-tractor text-green me-2"></i> <span>Welcome to {{env("APP_NAME")}}</span>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    
                    <!--====== Top Right ======-->
                    <div class="top-right float-lg-right">
                        
                        <ul class="social-link" >
                            <li style="display: flex;">
                            
                                <a href="index.html" class="nav-item nav-link">Home</a>
                                <a href="about.html" class="nav-item nav-link active">About</a>
                                <a href="service.html" class="nav-item nav-link">Services</a>
                                <a href="/admin/login" class="btn btn-lg btn-warning">Admin Area</a>
                            </li>
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
                        <h1 class="wow fadeInUp" data-wow-delay=".4s"> Revolutionizing Agriculture Ecosystem Management</h1>
                        <p class="wow fadeInDown" data-wow-delay=".6s">Welcome to AgroData, where data-driven innovation meets sustainable farming practices. We empower farmers and agricultural businesses to revolutionize their operations by harnessing the power of data and advanced analytics.
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

        <!-- About Start -->
        <div class="container-xxl py-5" style="background-color: #80808042;">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('homepage/images/autumn_harvest_season.jpg') }}" >
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-90 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('homepage/images/images.jpg') }}" style="margin-top: 10%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('homepage/images/hero_image_nexus_ceres_1.png') }}" style="margin-top: 10%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('homepage/images/food_agriculture.jpeg') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-green fw-normal">About Us</h5>
                        <h1 class="mb-2 fs-sm-4 fs-lg-6" >Welcome to <i class="fa fa-tractor text-green me-2"></i>{{env("APP_NAME")}}</h1>
                        <p class="mb-2">Our platform connects farmers and RAB in Rwanda, providing valuable tools and resources to help both groups achieve their goals. For farmers, we offer crop monitoring, soil analysis, and irrigation management tools, as well as access to finance information.</p>
                        <p class="mb-2">For RAB, we offer powerful data management and analytics tools to inform policy decisions and identify areas for improvement.</p>
                        <p class="mb-2">We believe in the power of technology to drive sustainable and inclusive growth in the sector, and we are committed to empowering farmers and supporting the Ministry in their efforts to build a prosperous and sustainable future for Rwanda.</p>
                        <div class="row g-4 mb-2">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-green mb-0" data-toggle="counter-up">15</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Years of</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-green mb-0" data-toggle="counter-up">50</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Popular</p>
                                        <h6 class="text-uppercase mb-0">Master Chefs</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-green py-3 px-5 mt-2" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Features Start -->
    <div class="container-xxl feature py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded text-green fw-semi-bold py-1 px-3">Why Choosing Us!</p>
                    <h1 class="display-5 mb-4" style="font-size: 3rem;">Few Reasons Why People Choosing Us!</h1>
                    <p class="mb-4">By choosing our Agriculture ecosystem management and analytics system, farmers and the Ministry of Agriculture in Rwanda can benefit from our extensive experience, innovative solutions, collaboration, commitment to sustainability, affordability, comprehensive guide and support, top-notch data security, real-time insights, user-friendly interface, scalability, mobile accessibility, and continuous improvement.</p>
                    <a class="btn btn-green py-3 px-5" href="">Explore More</a>
                </div>
                <div class="col-lg-6">
                    <div class="choose row g-4 align-items-center">
                        <div class="col-md-6">
                            <div class="row g-4" style="gap: 2rem;">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="feature-box border rounded p-4">
                                        <i class="fa fa-check fa-3x text-green mb-3"></i>
                                        <h4 class="mb-3">Innovative Solutions</h4>
                                        <p class="mb-3">Our platform provides innovative solutions such as Crop monitoring, weather tracking, soil analysis, and irrigation management tools.</p>
                                        <a class="fw-semi-bold text-green" href="">Read More <i
                                                class="fa fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="feature-box border rounded p-4">
                                        <i class="fa fa-check fa-3x text-green mb-3"></i>
                                        <h4 class="mb-3">Guide & Support</h4>
                                        <p class="mb-3">Provide extensive user guides and offer personalized support to help farmers maximize the benefits of our system.</p>
                                        <a class="fw-semi-bold text-green" href="">Read More <i
                                                class="fa fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row g-4" style="gap: 2rem;">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="feature-box border rounded p-4">
                                        <i class="fa fa-check fa-3x text-green mb-3"></i>
                                        <h4 class="mb-3">Scalability</h4>
                                        <p class="mb-3">Our platform provides Ability to scale our system to meet the needs of individual farmers and large agricultural operations alike.</p>
                                        <a class="fw-semi-bold text-green" href="">Read More <i
                                                class="fa fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="feature-box border rounded p-4">
                                        <i class="fa fa-check fa-3x text-green mb-3"></i>
                                        <h4 class="mb-3">User-Friendly</h4>
                                        <p class="mb-3">farmers can easily access the tools they need to manage their crops and make informed decisions.</p>
                                        <a class="fw-semi-bold text-green" href="">Read More <i
                                                class="fa fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->
    <!-- Callback Start -->
    <div class="container-fluid callback my-5 pt-5" style="background-color: #0B3D2C;">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                            <p class="d-inline-block border rounded text-green fw-semi-bold py-1 px-3">Get In Touch
                            </p>
                            <h1 class="display-5 mb-5">Request A Call-Back</h1>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="mail" placeholder="Your Email">   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="mobile" placeholder="Your Mobile">   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 100px"></textarea>
                                    
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-green w-100 py-3" type="submit">Submit Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Callback End -->
@include('components.homefooter')
@include('components.homejs')
