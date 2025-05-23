<?php
// include header section of template
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "view/CDN_Header.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
if (MYPORTFOLIO_ENABLE == TRUE) {
    session_destroy();
    header("Location: " . MYPORTFOLIO_INDEX_LOCATION, true, 301);
    exit();
}
if (LIFE_HEALER_ENABLE == true) {
    session_destroy();
    header("Location: " . LIFE_HEALER_INDEX_LOCATION, true, 301);
    exit();
}
if (session_status()) {
    $bIsLogin = $oSessionManager->isLoggedIn ? $oSessionManager->isLoggedIn : false;
    $iUserID = $oSessionManager->iUserID;
    $sUserName = $oSessionManager->sUserName;
    $sUserMobileNo = $oSessionManager->sUserMobileNo;
}
?>
<style>
    #bannerSliderId .modal-dialog {
        width: 60%;
        max-width: 60%;
    }

    /* #bannerSliderId .modal-content {
        height: 60vh;
    } */

    #carouselExampleIndicators .carousel-inner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* For mobile devices */
    @media (max-width: 768px) {
        #bannerSliderId .modal-dialog {
            width: 90%;
            max-width: 90%;
        }

        #carouselExampleIndicators .carousel-inner img {
            width: 100%;
            height: auto;
            /* Maintain aspect ratio */
            object-fit: contain;
            /* Ensure the entire image is visible */
        }
    }
</style>

<body>

    <!-- main container start -->

    <div class="main-container">

        <!-- main Content start -->
        <div class="dashboard">


            <section class="LMS section " id="upload">

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-4">
                        <li class="breadcrumb-item active" aria-current="page"> Dashboard</li>
                    </ol>
                </nav>

                <div class="container">

                    <!-- upload Section form  start-->
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Dashboard</h2>
                        </div>
                    </div>


                    <div class="upload-btn-section shadow p-3  rounded flex bg-card-high">
                        <div class="row p-4">
                            <div class="card m-2 col-sm-12 col-md-6 col-lg-4  shadow bg-card-low" style="width: 20rem;">
                                <a href="../view/amuseScreen.php" class="card-body bg-card-low card-flex-column">
                                    <div class="card-body text-center mt-5 ">
                                        <i class="fa-solid fa-gamepad fa-lg"></i>
                                    </div>
                                    <div class="card-body text-center mt-3">
                                        <h5 class="card-title-change">Amuse</h5>
                                    </div>
                                </a>
                            </div>
                            <?php if ($bIsLogin == true) { ?>
                                <div class="card m-2 col-sm-12 col-md-6 col-lg-4  shadow bg-card-low" style="width: 20rem;">
                                    <a href="winDashboard.php" class="card-body bg-card-low card-flex-column">
                                        <div class="card-body text-center mt-5 ">
                                            <i class="fa-solid fa-wine-glass-empty fa-lg"></i>
                                        </div>
                                        <div class="card-body text-center mt-3">
                                            <h5 class="card-title-change">Win</h5>
                                        </div>
                                    </a>
                                </div>
                                <div class="card m-2 col-sm-12 col-md-6 col-lg-4  shadow bg-card-low" style="width: 20rem;">
                                    <a href="#" class="card-body bg-card-low card-flex-column">
                                        <div class="card-body text-center mt-5 ">
                                            <i class="fa-solid fa-dice fa-lg"></i>
                                        </div>
                                        <div class="card-body text-center mt-3">
                                            <h5 class="card-title-change">Dice</h5>
                                        </div>
                                    </a>
                                </div>
                                <div class="card m-2 col-sm-12 col-md-6 col-lg-4  shadow bg-card-low" style="width: 20rem;">
                                    <a href="#" class="card-body bg-card-low card-flex-column">
                                        <div class="card-body text-center mt-5 ">
                                            <i class="fa-regular fa-hand-back-fist fa-lg"></i>
                                        </div>
                                        <div class="card-body text-center mt-3">
                                            <h5 class="card-title-change">Luckyhit</h5>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (!$bIsLogin == true) { ?>
                                <div class="card m-2 col-sm-12 col-md-6 col-lg-4  shadow bg-card-low" style="width: 20rem;">
                                    <a href="../view/loginScreen.php" class="card-body bg-card-low card-flex-column">
                                        <div class="card-body text-center mt-5 ">
                                            <i class="fa-solid fa-right-to-bracket fa-lg"></i>
                                        </div>
                                        <div class="card-body text-center mt-3">
                                            <h5 class="card-title-change">Login</h5>
                                        </div>
                                    </a>
                                </div>
                                <div class="card m-2 col-sm-12 col-md-6 col-lg-4  shadow bg-card-low" style="width: 20rem;">
                                    <a href="../view/registrationForm.php" class="card-body bg-card-low card-flex-column">
                                        <div class="card-body text-center mt-5 ">
                                            <i class="fa-solid fa-user fa-lg"></i>
                                        </div>
                                        <div class="card-body text-center mt-3">
                                            <h5 class="card-title-change">Register</h5>
                                        </div>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="card m-2 col-sm-12 col-md-6 col-lg-4  shadow bg-card-low" style="width: 20rem;">
                                    <a href="../view/userDashboard.php?iActive=3"
                                        class="card-body bg-card-low card-flex-column">
                                        <div class="card-body text-center mt-5 ">
                                            <i class="fa-solid fa-grip-vertical fa-lg"></i>
                                        </div>
                                        <div class="card-body text-center mt-3">
                                            <h5 class="card-title-change">Dashboard</h5>
                                        </div>
                                    </a>
                                </div>
                                <div class="card m-2 col-sm-12 col-md-6 col-lg-4  shadow bg-card-low" style="width: 20rem;">
                                    <a href="../view/logOut.php" class="card-body bg-card-low card-flex-column">
                                        <div class="card-body text-center mt-5 ">
                                            <i class="fa-solid fa-circle-exclamation fa-lg"></i>
                                        </div>
                                        <div class="card-body text-center mt-3">
                                            <h5 class="card-title-change">Log Out</h5>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>

                        </div>
                    </div>


                </div>
            </section>
        </div>

        <!-- main Content end-->

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

    <!-- Modal -->
    <div class="modal fade" id="bannerSliderId" tabindex="-1" aria-labelledby="bannerModalLabel" aria-hidden="true"
        style="display: block;display: flex;align-content: center;justify-content: center;align-items: center;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content bg-card-low">
                <div class="modal-header bg-card-low">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-card-low">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators" id="carousel-indicators"></div>
                        <div class="carousel-inner" id="carousel-inner"></div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- manu toggler end -->

    <!-- include footer section -->
    <?php include_once "./CDN_Footer.php" ?>
    <script src="../controller/dashboardController.js"></script>