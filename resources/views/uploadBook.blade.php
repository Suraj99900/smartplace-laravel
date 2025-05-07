@include('CDN_Header')
@include('NavBar')

@php
    $sessionManager = new \App\Models\SessionManager();

@endphp

<!-- main Content start -->
<div class="main-content">
    <section class="upload-book section">



        <div class="container">

            <!-- upload book section start -->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Upload Book</h2>
                </div>
            </div>
            <!-- upload book section end -->

            <div class=" p-sm-1 p-md-2 p-lg-5 mb-lg-5 mb-md-5 mb-sm-2  rounded" data-bs-theme="dark">
                <form>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="BookName" class="form-label"><i class="fa-solid fa-signature"></i> Book Name</label>
                            <input type="text" class="form-control custom-control" id="bookNameId" name="bookname" placeholder="Enter Book Name">
                            <input type="hidden" class="form-control custom-control" id="userId" name="user" value="{{ $sessionManager->sUserName }}">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="BookISBN" class="form-label"><i class="fa-solid fa-hashtag"></i> ISBN</label>
                            <input type="text" class="form-control custom-control" id="bookISBNId" name="bookisbn" placeholder="Enter Book ISBN Number">

                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="sem" class="form-label"><i class="fa-solid fa-hashtag"></i> Semester</label>
                            <select class="form-select custom-control" id="semesterId" name="semester">
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="BookDescription" class="form-label"><i class="fa-solid fa-quote-left"></i> Book Description</label>
                            <textarea name="bookdescription" class="form-control" placeholder="Enter Book Description" id="bookDescriptionId" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="selectBook" class="form-label"><i class="fa-solid fa-file-arrow-up"></i> Select Book </label>
                            <input type="file" class="form-control custom-control btn btn-primary" id="bookFileId" name="bookFile">
                        </div>
                    </div>

                    <div class="flex search-btn mt-5">
                        <a id="idUploadBook" class="btn search mb-1">Submit</a>
                    </div>
                </form>
            </div>
        </div>


    </section>

    <!-- book search form  end-->


</div>
<!-- main Content end-->

<!-- manu toggler end -->


<!-- include footer section -->

@include('CDN_Footer')
<script src="{{asset('js/controller/UploadBooKController.js')}}"></script>
