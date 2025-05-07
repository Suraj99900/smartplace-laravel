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

            <!-- upload Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Upload</h2>
                </div>
            </div>

            <h3 class="contact-title padd-15">STAFF UPLOAD SECTION</h3>
            <div class="upload-btn-section shadow p-3 mb-5 bg-body rounded flex">
                <div class="row p-2">
                    <div class="card m-2" style="width: 18rem;">
                        <img src="{{ asset('img/notes.png') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-5">Class Room Notes</h5>
                            <a href="uploadClassRoom" class="btnWAN btn-primary">Upload</a>
                        </div>
                    </div>
                    <div class="card m-2" style="width: 18rem;">
                        <img src="{{ asset('img/upload2.svg') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-5">Upload Books</h5>
                            <a href="uploadBook" class="btnWAN btn-primary">Upload</a>
                        </div>
                    </div>
                    <div class="card m-2" style="width: 18rem;">
                        <img src="{{ asset('img/upload1.png') }}" class="card-img-top mt-5" alt="...">
                        <div class="card-body flot-bottom text-center">
                            <h5 class="card-title mb-5">Upload Notes</h5>
                            <a href="uploadNotes" class="btnWAN btn-primary">Upload</a>
                        </div>
                    </div>
                    <div class="card m-2" style="width: 18rem;">
                        <img src="{{ asset('img/upload3.svg') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-5">Upload Assignment</h5>
                            <a href="uploadAssignment" class="btnWAN btn-primary">Upload</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- home section end -->


</div>

<!-- main Content end-->

<!-- manu toggler end -->

<!-- include footer section -->

<!-- include footer section -->
@include('CDN_Footer')