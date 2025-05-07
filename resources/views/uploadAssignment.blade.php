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
                    <h2>Upload Assignment</h2>
                </div>
            </div>
            <!-- upload Assignment section end -->

            <div class=" p-sm-1 p-md-2 p-lg-5 mb-lg-5 mb-md-5 mb-sm-2 bg-body rounded" data-bs-theme="dark">
                <form>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="AssignmentName" class="form-label"><i
                                    class="fa-solid fa-signature"></i>Assignment Name</label>
                            <input type="text" class="form-control custom-control" id="assignmentNameId"
                                name="assignmentname" placeholder="Enter Assignment Name">
                            <input type="hidden" class="form-control custom-control" id="userId" name="user"
                                value="{{ $sessionManager->sUserName }}">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="AssignmentRelatedToSubject" class="form-label"><i
                                    class="fa-solid fa-hashtag"></i> Related To Subject</label>
                            <input type="text" class="form-control custom-control" id="assignmentRelatedToSubjectId"
                                name="assignmentRelatedTosubject" placeholder="Enter Related To Subject">

                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="sem" class="form-label"><i class="fa-solid fa-hashtag"></i>Semester</label>
                            <select class="form-select custom-control" id="semesterId" name="semester">
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="AssignmentDescription" class="form-label"><i class="fa-solid fa-quote-left"></i>
                                Assignment Description</label>
                            <textarea name="assignmentdescription" class="form-control"
                                placeholder="Enter Assignment Description" id="assignmentDescriptionId" cols="30"
                                rows="10"></textarea>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="selectAssignment" class="form-label"><i class="fa-solid fa-file-arrow-up"></i>
                                Select Assignment </label>
                            <input type="file" class="form-control custom-control btn btn-primary" id="assignmentFileId"
                                name="assignmentFile">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="selectAssignment" class="form-label"><i class="fa-regular fa-calendar"></i> Last
                                Submission Date </label>
                            <input type="date" class="form-control custom-control btn btn-primary" id="submissionDateId"
                                name="submissionDate">
                        </div>
                    </div>

                    <div class="flex search-btn mt-5">
                        <a id="uploadAssId" class="btn search mb-1">Submit</a>
                    </div>
                </form>
            </div>
        </div>



    </section>

    <!-- Assignment search form  end-->


</div>
<!-- main Content end-->



@include('CDN_Footer')
<script src="{{asset('js/controller/UploadAssignmentController.js')}}"></script>
