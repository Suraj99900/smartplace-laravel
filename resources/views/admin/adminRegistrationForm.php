<?php
// include header section of template
include_once "ADMIN_CDN_Header.php";
include_once "./adminLeftBar.php";
?>

<!-- main Content start -->
<div class="main-content">

    <!-- home section start -->
    <section class="upload section " id="upload">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="Dashboard.php"> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin Registration</li>
            </ol>
        </nav>
        <div class="container">

            <!-- upload Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Admin Registration</h2>
                </div>
            </div>
            <div class="upload-btn-section shadow-lg p-lg-5 p-sm-5 p-md-5 mb-5  rounded flex"
                style="position: relative;">
                <form>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="StaffName" class="form-label card-title-change"><i
                                    class="fa-solid fa-Staff fa-i"></i> Staff Name</label>
                            <input type="text" class="form-control custom-control " id="StaffNameId" name="name"
                                placeholder="Enter StaffName">
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="Number" class="form-label card-title-change"><i
                                    class="fa-solid fa-mobile-screen fa-i"></i> Phone number</label>
                            <input type="number" class="form-control custom-control" id="phoneNumberId"
                                name="phoneNumber" placeholder="Enter Phone number">
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="StaffPassword" class="form-label card-title-change"><i
                                    class="fa-solid fa-lock fa-i"></i> Password</label>
                            <input type="password" class="form-control custom-control" id="StaffPasswordId"
                                name="Password" placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="StaffPassword" class="form-label card-title-change"><i
                                    class="fa-solid fa-lock fa-i"></i> UserType</label>
                            <select class="form-select custom-control c-text-vl" id="staffTypeId" name="type">
                                <option value="0" selected>Select option</option>
                                <option value="1">Super User</option>
                                <option value="2">Admin</option>
                                <option value="3">Game Staff</option>
                                <option value="4">Payment Staff</option>
                                <option value="5">Staff</option>
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="StaffKey" class="form-label card-title-change"><i
                                    class="fa-solid fa-lock fa-i"></i> Key</label>
                            <input type="text" class="form-control custom-control" id="StaffKeyId" name="Key"
                                placeholder="Enter Key">
                        </div>
                    </div>
                    <div class="row align-items-center p-3 hide" id="otpBoxId">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="otp" class="form-label card-title-change"><i class="fa-solid fa-lock fa-i"></i>
                                OTP</label>
                            <input type="text" class="form-control custom-control" id="otpId" name="otp"
                                placeholder="Enter otp">
                        </div>
                    </div>

                    <div class="flex search-btn mt-5">
                        <a id="idRegisterAdmin" class="btn sendOTP mb-4">Submit</a>
                    </div>
                </form>
            </div>


        </div>
    </section>
    <!-- home section end -->


</div>


<!-- main container end  -->

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

<div class="toggler-box">
    <div class="toggler-open icon">
        <i class="uil uil-angle-right-b"></i>
    </div>
    <div class="toggler-close icon">
        <i class="uil uil-angle-left-b"></i>
    </div>
</div>

<!-- manu toggler end -->

<!-- include footer section -->
<?php
include_once "./ADMIN_CDN_Footer.php";
?>

<script src="../../controller/adminRegisterController.js"></script>