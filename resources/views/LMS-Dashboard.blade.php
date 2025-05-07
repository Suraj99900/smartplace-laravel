@include('CDN_Header')
@include('NavBar')

@php
    $sessionManager = new \App\Models\SessionManager();

@endphp

<body>

    <!-- main container start -->

    <div class="main-container">

        <!-- main Content start -->
        <div class="main-content">



            <section class="LMS section " id="upload">

                <div class="container">

                    <!-- upload Section form  start-->
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>LMS</h2>
                        </div>
                    </div>


                    <div class="upload-btn-section  shadow p-3 rounded flex">
                        <div class="row p-2">
                            <div class="card m-2 col-sm-12 col-md-6 bg-card-low col-lg-4" style="width: 20rem;">
                                <a href="/home">
                                    <img src="{{asset('/img/study-literature.svg')}}" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-5">E-Library</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="card m-2 col-sm-12 col-md-6 col-lg-4 bg-card-low" style="width: 20rem;">
                                <a href="/uploadScreen">
                                    <img src="{{asset('/img/online-class.svg')}}" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-5 pt-5">Library Management</h5>

                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
        </div>

        <!-- main Content end-->

    </div>

    <!-- main container end  -->



    <!-- include footer section -->
    @include('CDN_Footer')
    <script src="{{asset('js/controller/SearchController.js')}}"></script>
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