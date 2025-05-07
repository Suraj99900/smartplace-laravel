@include('CDN_Header')
@include('NavBar')

@php
    $sessionManager = new \App\Models\SessionManager();

@endphp


<!-- main Content start -->
<div class="main-content">
    <section class="upload-Note section">

        <div class="container">

            <!-- upload Note section start -->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Upload Notes</h2>
                </div>
            </div>
            <!-- upload Note section end -->

            <div class="p-sm-1 p-md-2 p-lg-5 mb-lg-5 mb-md-5 mb-sm-2 bg-body rounded" data-bs-theme="dark">
                <form>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="noteName" class="form-label"><i class="fa-solid fa-signature"></i> Note Name</label>
                            <input type="text" class="form-control custom-control" id="NoteNameId" name="Notename" placeholder="Enter Note Name">
                            <input type="hidden" class="form-control custom-control" id="userId" name="user" value="{{ $sessionManager->sUserName }}">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="noteRelatedToSubject" class="form-label"><i class="fa-solid fa-hashtag"></i> Related To Subject</label>
                            <input type="text" class="form-control custom-control" id="noteRelatedToSubjectId" name="noteRelatedTosubject" placeholder="Enter Related To Subject">

                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="sem" class="form-label"><i class="fa-solid fa-hashtag"></i>Semester</label>
                            <select class="form-select custom-control" id="semesterId" name="semester">
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="noteDescription" class="form-label"><i class="fa-solid fa-quote-left"></i> note Description</label>
                            <textarea name="notedescription" class="form-control" placeholder="Enter note Description" id="noteDescriptionId" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="selectnote" class="form-label"><i class="fa-solid fa-file-arrow-up"></i> Select Note </label>
                            <input type="file" class="form-control custom-control btn btn-primary" id="noteFileId" name="noteFile">
                        </div>
                    </div>

                    <div class="flex search-btn mt-5">
                        <a id="uploadNoteId" class="btn search mb-1">Submit</a>
                    </div>
                </form>
            </div>
        </div>

    </section>

    <!-- Note search form  end-->
</div>
<!-- main Content end-->



<!-- include footer section -->

@include('CDN_Footer')
<script src="{{asset('js/controller/UploadNoteController.js')}}"></script>