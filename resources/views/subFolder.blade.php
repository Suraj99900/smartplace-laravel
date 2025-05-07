{{-- Include Header --}}
@include('CDN_Header')
@include('NavBar')

@php
    $sessionManager = new \App\Models\SessionManager();

@endphp

<div class="main-content">
    <section class="upload section" id="upload">
        

        <div class="container">
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Folder {{ $iMasterBookName }}</h2>
                </div>
            </div>

            <div class="shadow-lg p-sm-1 p-md-2 p-lg-5 mb-lg-5 mb-md-5 mb-sm-2 rounded">
                <div class="row p-5">
                    <input type="search" class="form-control custom-control" id="searchSubFolderById" placeholder="Search...">
                </div>
                <div class="row align-items-center p-3" id="idsubFolder"></div>
            </div>
        </div>
    </section>
</div>

@include('CDN_Footer')

{{-- Scripts --}}
<script src="{{ asset('js/controller/folderManagementController.js') }}"></script>
<script src="{{ asset('js/controller/classRoomController.js') }}"></script>
<script>
    var iMasterFolderId = {{ $iMasterBookId }};
    var searchTimeout;

    $(document).ready(() => {
        fetchSubFolder(iMasterFolderId);

        $('#searchSubFolderById').on('input', function () {
            var searchValue = $(this).val().toLowerCase();

            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(function () {
                fetchSubFolder(iMasterFolderId, searchValue);
            }, 1000);
        });
    });
</script>
