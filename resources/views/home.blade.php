@include('CDN_Header')
@include('NavBar')

@php
    $sessionManager = new \App\Models\SessionManager();

@endphp

<body>

    <!-- main container start -->

    <div class="main-container">

        <!-- main Content start -->
        <div class="main-content">
            <!-- home section start -->
            <section class="home section " id="home">
                <div class="container">

                    <!-- book search form  start-->
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Search Book</h2>
                        </div>
                    </div>
                    <form>
                        <div class="row align-items-center p-3">
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="searchBook" class="form-label">Search By Book Name</label>
                                <input type="search" class="form-control custom-control" id="searchBookByNameId"
                                    name="searchbook" placeholder="Enter Book Name">

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="searchBook" class="form-label">Search By ISBN</label>
                                <input type="search" class="form-control custom-control" id="searchBookByISBNId"
                                    name="searchbook" placeholder="Enter ISBN Number">

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 mb-1">
                                <label for="type" class="form-label">Search Type</label>
                                <select name="type" class="form-select custom-control" id="typeId">
                                    <option value="0">Select Any</option>
                                    <option value="1">Book</option>
                                    <option value="2">Notes</option>
                                    <option value="3">Assignment</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="searchBook" class="form-label">Search By Semester</label>
                                <select class="form-select custom-control" id="semesterId" name="semester">
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 d-none-custom">
                                <label for="searchBook" class="form-label">Search By FromDate</label>
                                <input type="date" class="form-control custom-control" id="searchBookByFromDateId"
                                    name="searchbook" placeholder="Enter FromDate Number">

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 d-none-custom">
                                <label for="searchBook" class="form-label">Search By ToDate</label>
                                <input type="date" class="form-control custom-control" id="searchBookByToDateId"
                                    name="searchbook" placeholder="Enter ToDate Number">

                            </div>

                        </div>

                        <div class="flex search-btn"
                            style="display: flex; justify-content: right; align-items: flex-end; ">
                            <a class="btn search" id="idSearch">Search</a>
                        </div>

                    </form>


                    <!-- book search form  end-->

                    <!-- Book table By search start -->

                    <div class="row mt-5" id="showBookId" style="padding: 20px;">

                    </div>
                    <div class="p-2 m-2 right-flex">
                        <div id="paginationContainer" class="pagination"></div>
                    </div>

                </div>
            </section>
            <!-- home section end -->
            <!-- Contact section end -->

        </div>

        <!-- main Content end-->
    </div>

    <!-- manu toggler end -->

    <!-- include footer section -->
    @include('CDN_Footer')
    <script src="{{asset('js/controller/SearchController.js')}}"></script>