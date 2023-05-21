// products.js

$(document).ready(function() {
    $('#searchForm').submit(function(e) {
        e.preventDefault();

        var searchTerm = $('#searchTerm').val();

        $.ajax({
            url: "{{ route('search') }}", // Replace with your Laravel route for handling the search
            type: 'POST',
            data: {
                searchTerm: searchTerm
            },
            success: function(response) {
                $('#productList').hide(); // Hide the product list
                $('#searchResults').html(response).show(); // Display the search results
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
