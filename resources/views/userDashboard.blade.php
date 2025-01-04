@include('CDN_Header')
@include('NavBar')

<!-- main Content start -->
<div class="main-content">
    <section class="section overflow">

        <!-- <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="Dashboard.php"> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
            </ol>
        </nav> -->

        <div class="container-fluid padd-15">
            <div class="">
                <!-- Dashboard Section form  start-->
                <div class="row px-5 pt-lg-5 pt-md-5 pt-sm-3">
                    <div class="section-title padd-15 mt-5">
                        <h2>User Dashboard</h2>
                    </div>
                </div>
            </div>
            <div class="dashboard dashboard_container">
                <button id="show__sidebar-btn" class="sidebar__toggle "><i class="fa-solid fa-arrow-right"></i></button>
                <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-arrow-left"></i></button>
                <aside>
                    <ul>
                        <li>
                            <a href="userDashboard" class="transparent-card p-3 mb-5 rounded active"><i
                                    class="fa-regular fa-id-card"></i>
                                <h5>Personal Info</h5>
                            </a>
                        </li>
                        <li>
                            <a href="BlogManage" class="transparent-card p-3 mb-5 rounded"><i
                                    class="fa-solid fa-blog"></i>
                                <h5>Blog</h5>
                            </a>
                        </li>

                    </ul>
                </aside>

                <main>
                    <div class="card transparent-card row userInfo padd-15 px-5">
                        <div class="mb-3 row">
                            <label for="ID" class="col-sm-4 col-form-label c-text"><b>ID:</b> </label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext c-text-vl" id="userID"
                                    value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="MobileNumber" class="col-sm-4 col-form-label c-text"><b>Mobile:</b> </label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext c-text-vl" id="mobileNumberID"
                                    value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="UserName" class="col-sm-4 col-form-label c-text"><b>UserName:</b> </label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext c-text-vl" id="userNameId"
                                    value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Balance" class="col-sm-4 col-form-label c-text"><b>User Type:</b> </label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext c-text-vl" id="balanceID"
                                    value="">
                            </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </section>

</div>
<!-- main Content end-->

<!-- manage issues book modal -->
<!-- Add Modal -->
<div class="modal fade" id="AddBookIssuesModalId" tabindex="-1" aria-labelledby="AddBookIssuesModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddBookIssuesModal">Book Issues</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center p-3">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <!-- <label class="form-label"><i class="fa-solid fa-user"></i>Select Student</label> -->
                        <select class="form-control custom-control" id="studentNameId" name="student"
                            placeholder="Select Student" style="width: 100%;">
                            <!-- Options will be dynamically added using JavaScript -->
                        </select>
                        <input type="hidden" class="form-control custom-control" id="bookId" name="bookId">
                        <input type="hidden" class="form-control custom-control" id="userId" name="user_name"
                            value="{{$sessionData['sUserName']}}">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <select class="form-control custom-control" id="bookNameID" name="bookName"
                            placeholder="Select Book" style="width: 100%;">
                            <!-- Options will be dynamically added using JavaScript -->
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="idAddIssues" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>


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
@include('CDN_Footer')

<script>
    var iUserID = {{$sessionData['iUserID']}}
</script>

<script src="{{asset('/js/controller/userController.js')}}"></script>