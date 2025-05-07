@include('CDN_Header')
@include('NavBar')

@php
    $sessionManager = new \App\Models\SessionManager();

@endphp



<!-- main Content start -->
<div class="main-content">




    <!-- home section start -->
    <section class="upload section " id="upload">

        <div class="container">

            <!-- Class room Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Class Room</h2>
                </div>
            </div>
            <div class="shadow-lg p-sm-1 p-md-2 p-lg-5 mb-lg-5 mb-md-5 mb-sm-2 rounded">
                <div class="row p-5">
                <input type="search" class="form-control custom-control" id="searchFolderById" name="searchFolder" placeholder="Seacrh...">
                </div>
                <div class="row align-items-center p-3" id="idMasterFolder">

                </div>
            </div>



        </div>
    </section>
    <!-- home section end -->

</div>


@include('CDN_Footer')
<script src="{{asset('js/controller/folderManagementController.js')}}"></script>
<script src="{{asset('js/controller/classRoomController.js')}}"></script>