@include('CDN_Header')
@include('NavBar')

<script>
    var sUserName = "{{$sessionData['sUserName']}} ";
    tinymce.init({
        selector: '#BlogTextAreaId',
        license_key: '87ziajgslefznkwf0ger86nt82bwwz9qiuc2gqpfazqa5etr',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: sUserName,
        mergetags_list: [
            { value: sUserName },
            { value: 'jaiswaljesus384@gmail.com', title: 'jaiswaljesus384@gmail.com' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        height: 800,
        hidden_input: false,
        promotion: false,
    });
</script>

<!-- main Content start -->
<div class="main-content" data-bs-theme="dark">

    <!-- home section start -->
    <section class="upload section" id="ManageBlogId">
        <!-- <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4">
                <li class="breadcrumb-item"><a href="Dashboard.php"> Dashboard</a></li>
                <li class="breadcrumb-item"><a href="BlogManage.php?iActive=4&staffAccess=1">Manage Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Blog</li>
            </ol>
        </nav> -->
        <div class="container-fluid padd-15">

            <!-- upload Section form  start-->
            <div class="row px-5">
                <div class="section-title padd-15 mt-5">
                    <h2> Update Blog</h2>
                </div>
            </div>
            <div class="upload-btn-section transparent-card p-lg-5 p-sm-5 p-md-5 mb-2 mx-5  rounded flex"
                style="position: relative;">
                <form>
                    <a id="idUpdateBlogSubmit" class="btnWAN search float-end mb-4">Update</a>
                    <div class="form-group my-2">
                        <label for="BlogTitleId" class="p-1 card-title-change">Blog Title</label>
                        <input type="text" id="BlogTitleId" class="form-control" placeholder="Enter blog title">
                        <input type="hidden" name="_token" id="csrfid" value="{{ csrf_token() }}" />
                    </div>

                    <textarea id="BlogTextAreaId"></textarea>

                </form>
            </div>


        </div>
    </section>
    <!-- home section end -->


</div>


<!-- main container end  -->

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
<!-- 
<div class="toggler-box">
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
    var iId;
    $(document).ready(() => {
        fetchAllBlogRecordById( {{$id }});
        $("#idUpdateBlogSubmit").on('click', () => {
            UpdateBlogRecordById({{$id }});
        });
    });

    function fetchAllBlogRecordById(iId) {
        console.log(iId);
        $.ajax({
            url: "/fetchPostById/" + iId,
            method: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status === 'success') {
                    var aData = response.data;
                    $('#BlogTitleId').val(aData.title);
                    $('#BlogTextAreaId').html(aData.blog_data);
                } else {
                    responsePop('Error', response.message, 'error', 'ok');
                }

            },
            error: function (error) {
                // Handle Ajax error for session.php
                responsePop('Error', 'Error on server', 'error', 'ok');
            }
        });
    }

    function UpdateBlogRecordById(iId) {
        var aData = tinymce.get('BlogTextAreaId').getContent();
        var sTitle = $('#BlogTitleId').val();
        var sUserName = " {{$sessionData['sUserName'];}}";
        $.ajax({
            url: "/updatePost/" + iId,
            method: "put",
            headers:{
                'X-CSRF-TOKEN': $('#csrfid').val()
            },
            data: {
                "authorName": sUserName,
                "content": aData,
                "title": sTitle
            },
            dataType: "json",
            success: function (response) {
                if (response.status === 'success') {
                    responsePop('Success', aData.message, 'success', 'ok');
                    setTimeout(() => {
                        window.location.href = "/BlogManage";
                    }, 500);
                } else {
                    responsePop('Error', response.message, 'error', 'ok');
                }

            },
            error: function (error) {
                // Handle Ajax error for session.php
                responsePop('Error', 'Error on server', 'error', 'ok');
            }
        });
    }
</script>

<!-- <script src="../controller/BlogController.js"></script> -->