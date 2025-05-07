{{-- Include Header --}}
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
                    <h2>{{ $SubFolderName }}</h2>
                </div>
            </div>
            <div class="shadow-lg p-sm-1 p-md-2 p-lg-5 mb-lg-5 mb-md-5 mb-sm-2 rounded">
                <div class="row p-5">
                    <input type="search" class="form-control custom-control" id="searchSubFolderById"
                        name="searchSubFolder" placeholder="Seacrh...">
                </div>
                <div class="row align-items-center p-3" id="idFolderData">

                </div>
            </div>



        </div>
    </section>
    <!-- home section end -->


</div>



<!-- manu toggler end -->

<!-- include footer section -->
@include('CDN_Footer')

{{-- Scripts --}}
<script src="{{ asset('js/controller/folderManagementController.js') }}"></script>
<script src="{{asset('js/controller/classRoomController.js')}}"></script>


<script>
    var iSubBookId = {{ $SubFolderId }};
    $(document).ready(() => {

        fetchFolderData(iSubBookId);

        $('#searchSubFolderById').on('input', function () {
            var searchValue = $(this).val().toLowerCase();

            // Clear the previous timeout
            clearTimeout(searchTimeout);

            // Set a new timeout
            searchTimeout = setTimeout(function () {
                // Call fetchFolder after a brief delay
                fetchFolderData(iSubBookId, searchValue);
            }, 1000); // Adjust the delay time as needed (in milliseconds)
        });

    });
</script>