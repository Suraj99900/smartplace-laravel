

// Function to handle the file search
function searchBooks(page = 1) {
    var bookName = $("#searchBookByNameId").val();
    var bookISBN = $("#searchBookByISBNId").val();
    var typeId = $("#typeId").val();
    var semesterId = $("#semesterId").val() !== '0' ? $("#semesterId").val() : '';
    var dFromDate = $("#searchBookByFromDateId").val();
    var dToDate = $("#searchBookByToDateId").val();
    // Make an AJAX request using $.get method

    $.ajax({
        url: `${API_URL}/fetch/book?name=` + bookName + `&isbn=` + bookISBN + `&limit=` + 9 + `&page=` + page + `&typeId=` + typeId + `&semester=` + semesterId + `&fromDate=` + dFromDate + `&dToDate=` + dToDate,
        method: 'get',
        headers: {
            'X-CSRF-TOKEN': $('#csrfid').val()
        },
        success: function (data) {
            handleSearchSuccess(data);
        },
        error: function (data) {
            // Handle Ajax error
            handleSearchError(data);
        }
    });
}

// Function to handle a successful search
function handleSearchSuccess(data) {
    if (data.status_code === 200) {
        $('#showBookId').html(""); // Clear the existing content
        var sTemplate = "";

        const books = data.body.data;
        if (books.length == 0) {
            sTemplate += "<h3 class='contact-title padd-15 typing text-center text-light'>No Records Found.</h3>";
        }
        books.forEach((book, index) => {
            var sType = "";
            if (book['file_type'] == 1) {
                sType = "Book";
            } else if (book['file_type'] == 2) {
                sType = "Notes";
            } else {
                sType = "Assignment";
            }
            sTemplate += `
                <div class="card col-sm-12 col-md-6 col-lg-4 p-3 padd-15" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    <div class="card-body text-white">
                        <h4 class="card-title text-uppercase text-warning">${book['name']}</h4>
                        <p class="card-text"><small class="text-white"><b>ISBN/RELATED:</b> ${book['isbn'] || 'N/A'}</small></p>
                        <p class="card-text"><small class="text-white"><b>Semester:</b> ${book['sem'] || 'N/A'}</small></p>
                        <p class="card-text"><small class="text-white"><b>Type:</b> ${sType}</small></p>
                        ${book['submission_date'] ? `<p class="card-text"><small class="text-white"><b>Submission Date:</b> ${book['submission_date']}</small></p>` : ""}
                        <p class="card-text"><small class="text-white"><b>Description:</b> ${book['description'] || 'N/A'}</small></p>
                        <p class="card-text"><small class="text-white"><b>Added On:</b> ${book['added_on']}</small></p>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btnWAN btn-warning download" data-url="${book.file_name}" data-index="${index}" style="width: 50%; font-weight: bold;">
                            <i class="fa-solid fa-circle-arrow-down"></i> Download
                        </button>
                    </div>
                </div>
            `;
        });
        $('#showBookId').append(sTemplate);

        // Handle pagination
        const currentPage = data.body.current_page;
        const lastPage = data.body.last_page;

        // Update pagination controls based on the response data
        const pagination = $('<div class="pagination d-flex justify-content-center mt-4"></div>');

        if (currentPage > 1) {
            pagination.append('<button class="btn btn-secondary prev-page mx-1">Previous</button>');
        }

        for (let page = 1; page <= lastPage; page++) {
            const pageButton = `<button class="btn btn${page === currentPage ? '-primary' : '-secondary'} mx-1">${page}</button>`;
            pagination.append(pageButton);
        }

        if (currentPage < lastPage) {
            pagination.append('<button class="btn btn-secondary next-page mx-1">Next</button>');
        }

        $('#paginationContainer').html(pagination);

        // Attach click handlers for pagination
        $('.pagination button').click(function () {
            const page = $(this).text();
            if (page === 'Previous') {
                searchBooks(currentPage - 1);
            } else if (page === 'Next') {
                searchBooks(currentPage + 1);
            } else {
                searchBooks(page);
            }
        });
    }
}



// Function to handle AJAX error
function handleSearchError(xhr, status, error) {
    console.error('Ajax Error:', error);
    const errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred';
    alert(errorMessage);
}

// Event delegation to handle download button clicks
$(document).on('click', '.download', function () {
    const url = $(this).data('url');
    const index = $(this).data('index');
    downloadFile(url, index);
});

// Function to handle a successful download
function downloadFile(url, index) {
    // Make an AJAX request to download the file
    $.ajax({
        url: `${API_URL}/download`,
        headers: {
            'X-CSRF-TOKEN': $('#csrfid').val()
        },
        method: 'POST',
        data: { url: url },
        xhrFields: {
            responseType: 'blob' // Set the response type to 'blob' to handle binary data
        },
        success: function (data, status, xhr) {
            if (data) {
                const contentDisposition = xhr.getResponseHeader('Content-Disposition');
                const fileName = contentDisposition.match(/filename="(.+)"/)[1];

                // Create a Blob object from the downloaded data
                const blob = new Blob([data], { type: 'application/octet-stream' });

                // Create a URL for the Blob object
                const url = window.URL.createObjectURL(blob);

                // Create an anchor element to trigger the download
                const a = document.createElement('a');
                a.href = url;
                a.download = fileName;
                a.style.display = 'none';
                document.body.appendChild(a);

                a.click();

                // Clean up
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);

                alert('File downloaded successfully for ' + fileName);
            } else {
                alert('No data received for download.');
            }
        },
        error: function (xhr, status, error) {
            console.log('Download Error:', error);
            const errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred during download';
            alert(errorMessage);
        }
    });
}


// Initial search when the document is ready
$(document).ready(() => {
    $('.d-none-custom').css('display', 'none');
    // Attach the click event handler to the search button
    $("#idSearch").click(searchBooks);

    var semesterId = $("#semesterId");

    $.ajax({
        url: `${API_URL}/semester`,
        headers: {
            'X-CSRF-TOKEN': $('#csrfid').val()
        },
        type: 'GET',
        success: function (response) {
            var aData = response.data; // Assuming response is an array of semester data

            // Clear existing options
            semesterId.empty();

            // Add default option
            semesterId.append($('<option>', {
                value: '0',
                text: 'Select Any'
            }));

            // Add semester options
            $.each(aData, function (index, semester) {
                semesterId.append($('<option>', {
                    value: semester.id, // Adjust the property based on your response structure
                    text: semester.semester // Adjust the property based on your response structure
                }));
            });

            searchBooks();

        },
        error: function (xhr, status, error) {
            // Handle errors here
            console.error(xhr.responseText);
        }
    });



    // change evenet handel for Assignment
    $('#typeId').change(function() {
        var iTypeId =  $('#typeId').val();

        if(iTypeId == 3){
            $('.d-none-custom').css('display', 'block');
        }else{
            $('.d-none-custom').css('display', 'none');
        }
    });
    


});

