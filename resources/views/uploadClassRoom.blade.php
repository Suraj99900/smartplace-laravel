@include('CDN_Header')
@include('NavBar')

@php
    $sessionManager = new \App\Models\SessionManager();

@endphp



<!-- main Content start -->
<div class="main-content">
    <section class="upload-assignment section">

        <div class="container">

            <!-- upload Assignment section start -->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Upload Class Room Notes</h2>
                </div>
            </div>
            <!-- upload Assignment section end -->

            <div class=" p-sm-1 p-md-2 p-lg-5 mb-lg-5 mb-md-5 mb-sm-2   rounded" data-bs-theme="dark">
                <form class="">
                <input type="hidden" name="_token" id="csrfid" value="{{ csrf_token() }}" />
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label for="Name" class="form-label"><i class="fa-solid fa-signature"></i> Name</label>
                            <input type="text" class="form-control custom-control" id="fileNameId" name="FileName" placeholder="Enter File Name">
                            <input type="hidden" class="form-control custom-control" id="userId" name="user" value="{{ $sessionManager->sUserName }}">
                        </div>
                        <!-- <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="AssignmentRelatedToSubject" class="form-label"><i class="fa-solid fa-hashtag"></i> Related To Subject</label>
                            <input type="text" class="form-control custom-control" id="assignmentRelatedToSubjectId" name="assignmentRelatedTosubject" placeholder="Enter Related To Subject">

                        </div> -->
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label for="sem" class="form-label"><i class="fa-solid fa-hashtag"></i> SubFolder Name</label>
                            <select class="form-select custom-control" id="SubFolderId" name="SubFolder">
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label for="FileDescription" class="form-label"><i class="fa-solid fa-quote-left"></i> File Description</label>
                            <textarea name="FileDescription" class="form-control" placeholder="Enter File Description" id="FileDcriptionId" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label for="selectAssignment" class="form-label"><i class="fa-solid fa-file-arrow-up"></i> Select File </label>
                            <input type="file" class="form-control custom-control btn btn-primary"  id="FileId" name="File">
                        </div>
                        <!-- <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="selectAssignment" class="form-label"><i class="fa-regular fa-calendar"></i> Last Submission Date </label>
                            <input type="date" class="form-control custom-control btn btn-primary" id="submissionDateId" name="submissionDate">
                        </div> -->
                    </div>

                    <div class="flex search-btn mt-5">
                        <a id="uploadClassRoomId" class="btn search mb-1">Submit</a>
                    </div>
                </form>
            </div>
        </div>



    </section>

    <!-- Assignment search form  end-->


</div>
<!-- main Content end-->



@include('CDN_Footer')
<script src="{{asset('js/controller/UploadClassRoomController.js')}}"></script>