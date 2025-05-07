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
                    <h2>Folder Management</h2>
                </div>
            </div>

            <div class="Folder-section shadow p-3 mb-5 rounded flex" data-bs-theme="dark">
                <!-- Button trigger modal -->

                <div class="row align-items-center p-3">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <button type="button" class="btnWAN" data-bs-toggle="modal" data-bs-target="#idSubFolder"
                            id="Subfolder"><i class="fa-solid fa-plus"></i> Create Sub Folder</button>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 "
                        style="display: flex; justify-content: right; align-items: flex-end; ">
                        <button type="button" class="btnWAN" data-bs-toggle="modal" data-bs-target="#idAddFolderMaster"
                            id="AddFolderMaster"><i class="fa-solid fa-plus"></i> Create Master Folder</button>
                    </div>
                </div>
                <div class="row p-2" data-bs-theme="dark">
                    <table id="idFolderManagement" class="table table-striped" style="width:100%" data-bs-theme="dark">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Folder Name</th>
                                <th>Added By</th>
                                <th>Creation Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </section>
    <!-- home section end -->


</div>

<!-- Add Modal Box -->

<!-- Modal -->
<div class="modal fade" id="idAddFolderMaster" tabindex="-1" aria-labelledby="FolderMasterLabel" aria-hidden="true" data-bs-theme="dark">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="FoldeNameLabel">Create Folder</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center p-3">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <label class="form-label"><i class="fa-regular fa-folder"></i> Folder Name</label>
                        <input type="text" class="form-control custom-control" id="folderId" name="folder_name"
                            placeholder="Enter folder name">
                        <input type="hidden" class="form-control custom-control" id="userId" name="user_name"
                            value="{{ $sessionManager->sUserName }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btnWAN btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btnWAN btn-primary" id="idCreate">Create</button>
            </div>
        </div>
    </div>
</div>

<!--!Add Sub folder  -->
<div class="modal fade" id="idSubFolder" tabindex="-1" aria-labelledby="SubFolderLabel" aria-hidden="true" data-bs-theme="dark">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="SubFolderLabel">Add Sub Folder</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center p-3">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <label class="form-label"><i class="fa-solid fa-folder-tree"></i> Sub Folder Name</label>
                        <input type="text" class="form-control custom-control" id="subFolderId" name="folder_name"
                            placeholder="Enter folder name">
                        <input type="hidden" class="form-control custom-control" id="userId" name="user_name"
                            value="{{ $sessionManager->sUserName }}">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <label class="form-label"><i class="fa-solid fa-folder"></i> Folder Name</label>
                        <select class="form-select custom-control" id="masterFolderId" name="masterFolder">
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btnWAN btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="idSubmitSubFolder" class="btnWAN btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- view modal -->
<div class="modal fade" id="idviewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true" data-bs-theme="dark">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModallLabel">Map Sub Folders</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row p-2">
                    <table id="idSubFolderManagement" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Folder Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="idSubFolderBody">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btnWAN btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- main Content end-->


<!-- manu toggler end -->

<!-- include footer section -->

@include('CDN_Footer')
<script src="{{asset('js/controller/folderManagementController.js')}}"></script>
<script src="{{asset('js/controller/subFolderController.js')}}"></script>