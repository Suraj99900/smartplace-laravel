@include('CDN_Header')
@include('NavBar')
@php
    $sessionManager = new \App\Models\SessionManager();

@endphp

<style>
    .blog-section .card-body img {
        width: 100%;
        height: 30vh;
    }

    /* Target select2 container */
    .select2-selection .select2-selection--multiple,
    .select2-selection__choice {
        color: #343a40 !important;
        /* Light text color */
    }

    /* Target dropdown options */
    .select2-results__option {
        color: #343a40 !important;
        /* Light text color */
    }
</style>

<!-- main Content start -->
<div class="main-content">
    <!-- home section start -->

    <!-- <div class="particle-background">
        <canvas id="particles"></canvas>
    </div> -->

    <section class="home section px-lg-5" id="home">
        <div class="container-fluid home padd-15">
            <div class="row align-items-center px-lg-5">
                <div class="home-info base-color col-md-4 px-5">
                    @if ($sessionManager->isLoggedIn())
                        <h3 class="hello user-name">
                            Welcome back, {{ $sessionManager->sUserName }}!
                        </h3>
                    @else
                        <h3 class="hello user-name">
                            Welcome to FreeCode.Fun!
                        </h3>
                    @endif

                    <p class="mt-3" style="max-width: 800px;">
                        FreeCode.Fun is your go-to platform for <strong>free code snippets</strong>, <strong>tech
                            videos</strong>, <strong>study materials</strong>, and <strong>AI-focused blogs</strong>.
                        Our mission is to empower students and developers with zero-cost resources to learn, build, and
                        innovate.
                    </p>
                    <div class="mt-4">
                        <a href="LMS-Dashboard" class="btn hire-me">Explore Features</a>

                        @if ($sessionManager->isLoggedIn())
                            <a href="{{ url(path: 'userDashboard') }}" class="btn hire-me ms-2">Go to Dashboard</a>
                        @else
                            <a href="{{ url('loginScreen') }}" class="btn hire-me ms-2">Login / Register</a>
                        @endif
                    </div>
                </div>
                <div class="home-img col-md-8 padd-15">
                    <!-- <img src="../res/img/DashboardNewImage-transparent.png"> -->
                </div>
            </div>
        </div>
    </section>
    <!-- home section end -->

    <section class="section AI-section px-lg-5" id="AISection" style="min-height: auto !important;padding: 90px 0px;">
        <div class="container-fluid padd-15">
            <div class="row">
                <div class="section-title padd-15 px-5">
                    <h2>Medical Recommendation System</h2>
                </div>
                <div class="px-5 card-box-AI" data-bs-theme="dark">
                    <div class="row px-lg-5" style="margin: 0px;padding: 0px;">
                        <div class="col-lg-4 col-sm-12 col-md-4 p-2">
                            <a data-bs-toggle="offcanvas" id="idDisesePredectionSystem" href="#idDPS" role="button"
                                aria-controls="idDPS">
                                <div class="card transparent-card  p-3">
                                    <h6 class="text-center c-text-vl">Disease Prediction System</h6>
                                    <div class="card-body ">
                                        <div class="home-img-box padd-15">
                                            <img src="{{asset('img/DPS-img.jpg')}}" style="width: 15rem; height:15rem;">
                                            <!-- <i class="fa-solid fa-hand-holding-medical" style="font-size: 5rem; color:var(--skin-color);"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-4 p-2">
                            <a href='#'>
                                <div class="card transparent-card  p-3">
                                    <h6 class="text-center c-text-vl">Hypertension Prediction System</h6>
                                    <div class="card-body">
                                        <div class="home-img-box padd-15">
                                            <img src="{{asset('img/hypertension-img.jpg')}}"
                                                style="width: 15rem; height:15rem;">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-4 p-2">
                            <a href='#'>
                                <div class="card transparent-card  p-3">
                                    <h6 class="text-center c-text-vl">Diabetes Prediction System</h6>
                                    <div class="card-body">
                                        <div class="home-img-box padd-15">
                                            <img src="{{asset('img/Daibetes-system-img.jpg')}}"
                                                style="width: 15rem; height:15rem;">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Blog section start -->
    <section class="section blog-section px-lg-5" id="BlogSectionId">
        <div class="container-fluid padd-15 px-5">
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Blog</h2>
                </div>
            </div>
            <div class="blog-box-animation" data-bs-theme="dark">
                <div class="row px-lg-5" id="blogBoxId">
                </div>
            </div>
        </div>
    </section>
    <!-- Blog section end -->




    <!-- FAQ section Start -->

    <section class="faq section pt-5 px-lg-5" id="faq">
        <div class="container-fluid padd-15 px-5">
            <div class="row">
                <div class="section-title padd-15">
                    <h2>FAQ</h2>
                </div>
            </div>

            <div class="faq_box" data-bs-theme="dark">
                <div class="row px-lg-5">
                    <div class="faq_img padd-15 px-5">
                        <img src="{{asset('img/faq_1.png')}}" alt="">
                        <div class="faq_img__inner">
                            <img src="{{asset('img/faq_2.png')}}">
                        </div>
                    </div>
                    <div class="faq_content padd-15">
                        <div class="faq_items">
                            <div class="question">
                                <h3>What Is a Portfolio Website?</h3>
                                <i class="uil uil-angle-down"></i>
                            </div>
                            <div class="answer">
                                <p>
                                    Simply said, your portfolio website is a portal to showcase the online
                                    portfolio we were mentioning above to the world. It's the vehicle that lets
                                    your individual work be shared on a public platform. A portfolio website is
                                    a unique way to tell your own story, give potential clients basic
                                    information on who you are, allow you to showcase your work, and gives them
                                    a way to contact you.
                                </p>
                            </div>
                        </div>
                        <div class="faq_items">
                            <div class="question">
                                <h3>Is it easy to learn HTML and CSS ?</h3>
                                <i class="uil uil-angle-down"></i>
                            </div>
                            <div class="answer">
                                <p>
                                    The foundation of HTML and CSS are not that difficult. You can start getting
                                    comfortable with HTML in a matter of hours. Basic CSS is also not that
                                    difficult, however, CSS can get complicated when trying to build advanced
                                    layouts.
                                </p>
                            </div>
                        </div>
                        <div class="faq_items">
                            <div class="question">
                                <h3>what is javascript ?</h3>
                                <i class="uil uil-angle-down"></i>
                            </div>
                            <div class="answer">
                                <p>
                                    JavaScript is a text-based programming language used both on the client-side
                                    and server-side that allows you to make web pages interactive.
                                </p>
                            </div>
                        </div>

                        <div class="faq_items">
                            <div class="question">
                                <h3>Is JavaScript easier than PHP?</h3>
                                <i class="uil uil-angle-down"></i>
                            </div>
                            <div class="answer">
                                <p>
                                    While PHP is easier to learn, it is capable of building complete websites.
                                    On the other hand, we have more complex JavaScript, but it is one of the
                                    most popular languages. For front-end development, you should definitely
                                    choose JavaScript as PHP is only for server-side development.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section>

    <!-- FAQ section end -->




    <!-- Contact section start -->
    <section class="contact section  px-lg-5" id="contact">
        <div class="container-fluid padd-15 px-5">
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Contact Me</h2>
                </div>
            </div>
            <h3 class="contact-title padd-15">Have you any Question ?</h3>
            <h4 class="contact-sub-title padd-15">I'M AT YOUR SERVICE</h4>
            <div class="row contact-animation">
                <!-- contact info item start -->
                <div class="contact-info-item padd-15">
                    <div class="icon"><i class="fa fa-phone"></i></div>
                    <h4>Call Us On</h4>
                    <p>+91 7387997294</p>
                </div>
                <!-- contact info item end -->

                <!-- contact info item start -->
                <div class="contact-info-item padd-15">
                    <div class="icon"><i class="fa fa-map-marker-alt"></i></div>
                    <h4>Address</h4>
                    <p> Pune , maharashtra</p>
                </div>
                <!-- contact info item end -->

                <!-- contact info item start -->
                <div class="contact-info-item padd-15">
                    <div class="icon"><i class="fa fa-envelope"></i></div>
                    <h4>Email</h4>
                    <p>jaiswaljesus384@gmail.com</p>
                </div>
                <!-- contact info item end -->

                <!-- contact info item start -->
                <div class="contact-info-item padd-15">
                    <div class="icon"><i class="fa fa-globe-europe"></i></div>
                    <h4>Website</h4>
                    <p>www.samrtpolys.com</p>
                </div>
                <!-- contact info item end -->
            </div>
            <h3 class="contact-title padd-15">SEND ME EMAIL</h3>
            <h4 class="contact-sub-title padd-15">I'M VERY RESPOSIVE TO MESSAGES</h4>

            <!-- CONTACT FORM -->
            <div class="row" data-bs-theme="dark">
                <div class="contact-form padd-15">
                    <div class="row">
                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        <div class="form-item col-6 padd-15">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-item col-12 padd-15">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-item col-12 padd-15">
                            <div class="form-group">
                                <textarea name="" class="form-control" id="" placeholder="Message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-item col-12 padd-15">
                            <div class="form-group">
                                <button type="submit" class="btn"> Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Contact section end -->

</div>

<!-- main Content end-->


<!-- style switcher start -->
<div class="style-switcher hide hide">
    <div class="style-switcher hide-toggler s-icon">
        <i class="fas fa-cog fa-spin"></i>
    </div>
    <div class="day-night s-icon">
        <i class="fas "></i>
    </div>
    <div class="chat-Bot s-icon " data-bs-toggle="offcanvas" data-bs-target="#ChatbotoffCanvas"
        aria-controls="ChatbotoffCanvas">
        <i class="fa-solid fa-robot"></i>
    </div>
    <h4>Theme Color</h4>
    <div class="colors">
        <span class="color-1" onclick="setActivityStyle('color-1')"></span>
        <span class="color-2" onclick="setActivityStyle('color-2')"></span>
        <span class="color-3" onclick="setActivityStyle('color-3')"></span>
        <span class="color-4" onclick="setActivityStyle('color-4')"></span>
        <span class="color-5" onclick="setActivityStyle('color-5')"></span>
    </div>
</div>

<div class="offcanvas offcanvas-end bg-card-low" tabindex="-1" id="ChatbotoffCanvas" aria-labelledby="ChatbotoffCanvas"
    data-bs-theme="dark">
    <div class="offcanvas-header card-title-change">
        <h5 id="offcanvasTopLabel card-title-change">Hi My Name is Selly</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="ChatbotoffCanvasBody">
        <div class="chatboxClass" id="chatbot">
        </div>

        <div class="usermsgBox">
            <div class="row msg">
                <div class="col-8 msg_type">
                    <div class="form-group">
                        <textarea type="text" name="msg" id="usermsg" placeholder="enter your msg" class="form-control"
                            placeholder="Name"></textarea>
                    </div>
                </div>
                <div class="col-4">
                    <button class="btn btn-primary mb-3" id="send">
                        send
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end bg-card-high" tabindex="-1" id="idDPS" aria-labelledby="offcanvasRightLabel"
    style="width: 60%;" data-bs-theme="dark">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title c-text" id="offcanvasAddStaffLabel">Disease Prediction System</h3>
        <i data-bs-dismiss="offcanvas" aria-label="Close"
            class="c-text btn-close text-reset btn c-text fa-solid fa-circle-xmark" style="font-size: 1.5rem;"></i>
    </div>
    <div class="offcanvas-body bg-card-high " data-bs-theme="dark" style="height: 100vh;">
        <div class="upload-btn-section shadow-sm p-lg-5 p-sm-5 p-md-5 mb-5  rounded flex">
            <form>

                <div class="row align-items-center shadow-lg p-3" data-bs-theme="dark">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label for="StaffPassword" class="form-label card-title-change"
                            style="color: var(--skin-color);font-size: 1.5rem;"><i
                                class="fa-solid fa-heart-circle-bolt"></i> Select Symptoms</label>
                        <select multiple class="form-select custom-control c-text" data-bs-theme="dark" id="idSymptoms"
                            name="type">
                        </select>
                    </div>
                </div>

                <div class="flex search-btn mt-5">
                    <a id="predectMedicalData" class="btn mb-4">Submit</a>
                </div>

                <div class="predectedSystemBox row hide">
                    <h4 class="text-center py-2 " style="color:var(--skin-color);">Note:- This prediction is not 100%
                        accurate.</h4>
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4" id="idDisease"></div>
                        <div class="col-sm-4 col-md-4 col-lg-4" id="idDescription"></div>
                        <div class="col-sm-4 col-md-4 col-lg-4" id="idMedication"></div>
                    </div>
                    <div class="row py-2">
                        <div class="col-sm-4 col-md-4 col-lg-4" id="idPrecaution"></div>
                        <div class="col-sm-4 col-md-4 col-lg-4" id="idWorkout"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- style switcher end -->

<!-- manu toggler start -->

<!-- <div class="toggler-box">
    <div class="toggler-open icon">
        <i class="uil uil-angle-right-b"></i>
    </div>
    <div class="toggler-close icon">
        <i class="uil uil-angle-left-b"></i>
    </div>
</div> -->

<!-- manu toggler end -->


<!-- manu toggler end -->

<!-- include footer section -->
@include('CDN_Footer')
<script src="{{asset('js/controller/ChatBot.js')}}"></script>
<script src="{{asset('js/partical.js')}}"></script>
<script>

    $(document).ready(() => {
        fetchAllBlogRecord();
    });

    function fetchAllBlogRecord() {
        $.ajax({
            url: "{{url('/fetchAllPosts')}}",
            method: "GET",
            data: { iLimit: 10 },
            dataType: "json",
            success: function (response) {
                var sTemplate = "";
                if (response.status === 'success') {
                    response.data.forEach(ele => {
                        // Limit blog_data to 200 words
                        var limitedBlogData = ele.blog_data.split(" ").slice(0, 80).join(" ") + '...';

                        sTemplate += `
                        <div class="col-lg-6 col-sm-12 col-md-6 p-2 ">
                            <a href = 'BlogPage/${ele.id}'><div class="card transparent-card p-3">
                                <h3 class="c-text-vl">${ele.title}</h3>
                                <div  class="c-text-vl" class="card-body">
                                    <p class="card-text">${limitedBlogData}</p>
                                </div>
                            </div></a>
                        </div>`;
                    });
                    $("#blogBoxId").html(sTemplate);
                } else {
                    responsePop('Error', response.message, 'error', 'ok');
                }
            },
            error: function (error) {
                // Handle Ajax error for session.php
                responsePop('Error', 'Error on server', 'error', 'ok');
            }
        });
    }

    $("#idSymptoms").select2({
        theme: 'bootstrap',
        ajax: {
            url: "{{url('/userSymptoms')}}",
            dataType: 'json',
            delay: 250, // Add delay for debouncing
            data: function (params) {
                return {
                    name: params.term // search term
                };
            },
            beforeSend: function () {
                // Show loading indicator
                $('#loadingIndicator').show();
            },
            complete: function () {
                // Hide loading indicator
                $('#loadingIndicator').hide();
            },
            processResults: function (data) {
                console.log(data);

                if (data.status_code === 200) {
                    return {
                        results: data.data.map(function (item) {
                            return {
                                id: item.name,
                                text: item.name // assuming 'name' is the property to be displayed
                            };
                        })
                    };
                } else {
                    // responsePop('Error', data.message, 'error', 'ok');
                    return {
                        results: []
                    };
                }
            },
            error: function (error) {
                // responsePop('Error', 'Error on server', 'error', 'ok');
            },
            cache: true
        },
        minimumInputLength: 0,
        language: {
            inputTooShort: function () {
                return 'Type at least one character to search';
            },
            loadingMore: function () {
                return 'Loading more results…';
            }
        },
        placeholder: "Select symptoms",
        theme: "default"
    });




    $('#idDisesePredectionSystem').on('click', () => {
        $('.predectedSystemBox').addClass('hide');
    });

    $('#predectMedicalData').on('click', () => {
        let symptoms = $('#idSymptoms').val().toString();

        $.ajax({
            url: "https://smartpoly.model.lifehealerkavita.com/api/predict",
            method: "POST",
            contentType: "application/json",
            data: JSON.stringify({ symptoms: symptoms }),
            success: function (response) {
                if (response.Disease) {
                    // Create HTML content dynamically
                    const sections = {
                        Disease: response.Disease,
                        Description: response.Description,
                        Medication: response.Medication,
                        Precaution: response.Precaution,
                        Workout: response.Workout
                    };

                    // Generate HTML for each section
                    Object.keys(sections).forEach(key => {
                        const value = sections[key];
                        $(`#id${key}`).html(`
                        <div class="row text-center s-box c-text">
                            <h5 class="text-center" style="color: var(--skin-color); font-size:1.4rem;">${key}</h5>
                            <p class="text-center" style='font-size:1.2rem;'>${value}</p>
                        </div>
                    `);
                    });

                    // Show results
                    $('.predectedSystemBox').removeClass('hide');
                } else {
                    responsePop('Error', response.message, 'error', 'ok');
                    $('.predectedSystemBox').addClass('hide');
                }
            },
            error: function () {
                responsePop('Error', 'Error on server', 'error', 'ok');
            }
        });
    });




</script>