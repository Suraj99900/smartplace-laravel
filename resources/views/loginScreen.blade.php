@include('CDN_Header')
@include('NavBar')


<!-- main Content start -->
<div class="main-content">



    <!-- home section start -->
    <section class="upload section px-5" id="upload">

        <!-- <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="Dashboard.php"> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Login</li>
            </ol>
        </nav> -->
        <div class="container-fluid padd-15">

            <!-- upload Section form  start-->
            <div class="row px-5 p-lg-5 p-md-5 p-sm-3">
                <div class="section-title padd-15 mt-5">
                    <h2> Login</h2>
                </div>
            </div>
            <h3 class="contact-title padd-15 typing">Welcome G-Project </h3>
            <div class="container p-lg-5  rounded" style="position: relative;">
                <form class="login-form">
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="Username" class="form-label card-title-change"><i
                                    class="fa-solid fa-mobile-screen fa-i"></i> Username</label>
                            <input type="text" class="form-control custom-control" id="UsernameId" name="phoneUsername"
                                placeholder="Enter Phone Username">
                            <input type="hidden" name="_token" id="csrfid" value="{{ csrf_token() }}" />
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="UserPassword" class="form-label card-title-change"><i
                                    class="fa-solid fa-lock fa-i"></i> Password</label>
                            <input type="password" class="form-control custom-control" id="userPasswordId"
                                name="Password" placeholder="Enter Password">
                        </div>
                    </div>

                </form>
                <div class="flex search-btn mt-5" style="display: flex;justify-content: center;">
                    <button id="idLogin" class="btnWAN search mb-4">Submit</button>
                </div>
            </div>


        </div>
    </section>
    <!-- home section end -->


</div>

<!-- main Content end-->


<!-- style switcher start -->
<div class="style-switcher hide">
    <div class="style-switcher hide-toggler s-icon">
        <i class="fas fa-cog fa-spin"></i>
    </div>
    <div class="day-night s-icon">
        <i class="fas "></i>
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

<!-- include footer section -->
@include('CDN_footer')

<script>
    var ABS_URL = '{{ env('ABS_URL') }}';
    setInterval(typeing, 150);
</script>

<script src="{{asset('js/controller/poxLoginRegisterController.js')}}"></script>