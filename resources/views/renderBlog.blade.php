@include('CDN_Header')
@include('NavBar')
<style>
    .blog-section .card-body img {
        width: 100%;
        height: 30vh;
    }
</style>

<!-- main Content start -->
<div class="main-content">

    <!-- Blog section start -->
    <section class="section blog-section" id="BlogSectionId">
        <div class="container-fluid">
            <div class="row px-lg-5 p-lg-5 p-md-5 p-sm-1">
                <div class="section-title padd-15 mt-5">
                    <h2>Blog</h2>
                </div>
            </div>
            <div class="" data-bs-theme="dark">
                <div class="row mx-lg-5 mx-sm-2 p-2" id="blogBoxId">
                </div>
            </div>
        </div>
    </section>
    <!-- Blog section end -->


</div>

<!-- main Content end-->


<!-- style switcher start -->
<div class="style-switcher hide">
    <div class="style-switcher hide-toggler s-icon">
        <i class="fas fa-cog fa-spin"></i>
    </div>
    <div class="day-night s-icon">
        <i class="fas "></i>
    </div>
    <div class="chat-Bot s-icon " data-bs-toggle="offcanvas" data-bs-target="#ChatbotoffCanvas"
        aria-controls="ChatbotoffCanvas">
        <i class="fa-solid fa-robot"></i>
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

<div class="offcanvas offcanvas-end bg-card-low" tabindex="-1" id="ChatbotoffCanvas" aria-labelledby="ChatbotoffCanvas">
    <div class="offcanvas-header card-title-change">
        <h5 id="offcanvasTopLabel card-title-change">Hi My Name is Selly</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="ChatbotoffCanvasBody">
        <div class="chatboxClass" id="chatbot">
        </div>

        <div class="usermsgBox">
            <div class="row msg">
                <div class="col-8 msg_type">
                    <div class="form-group">
                        <textarea type="text" name="msg" id="usermsg" placeholder="enter your msg" class="form-control"
                            placeholder="Name"></textarea>
                    </div>
                </div>
                <div class="col-4">
                    <button class="btn btn-primary mb-3" id="send">
                        send
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- style switcher end -->

<!-- manu toggler start -->

<!-- <div class="toggler-box">
    <div class="toggler-open icon">
        <i class="uil uil-angle-right-b"></i>
    </div>
    <div class="toggler-close icon">
        <i class="uil uil-angle-left-b"></i>
    </div>
</div> -->

<!-- manu toggler end -->


<!-- manu toggler end -->

<!-- include footer section -->
@include('CDN_Footer')
<script src="{{asset('/js/controller/ChatBot.js')}}"></script>

<script>

    $(document).ready(() => {
        fetchAllBlogRecord();
    });

    function fetchAllBlogRecord() {
        $.ajax({
            url: `{{url('/fetchAllPosts')}}`,
            method: "GET",
            dataType: "json",
            success: function (response) {
                var sTemplate = "";
                if (response.status === 'success') {
                    response.data.forEach(ele => {
                        // Limit blog_data to 200 words
                        var limitedBlogData = ele.blog_data.split(" ").slice(0, 80).join(" ") + '...';

                        sTemplate += `
                        <div class="col-lg-6 col-sm-12 col-md-6 p-2">
                            <a href = '/BlogPage/${ele.id}'><div class="card p-3 transparent-card" data-bs-theme="dark">
                                <h3 class="c-text" >${ele.title}</h3>
                                <div class="card-body c-text">
                                    <p class="card-text c-text">${limitedBlogData}</p>
                                </div>
                            </div></a>
                        </div>`;
                    });
                    $("#blogBoxId").html(sTemplate);
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