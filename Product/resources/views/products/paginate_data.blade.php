 @foreach($products as $product)
      <tr>
        <td>{{$product->product_name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->description}}</td>
        <td class="image-cell">
            <img src="{{asset('storage/images/'.$product->image)}}" alt="Image" width="20%">
        </td>
        <td>
            <a href="products/{{ $product->id }}/edit" class="btn btn-dark">Edit</a> 
            <a href="products/{{ $product->id }}/delete" class="btn btn-dark">Delete</a> 
</td>
      </tr>
      @endforeach

      <tr class="pagin_link">
        <td colspan="6" >{{$product->links}}</td>

</tr>
<script>
$(document).ready(function() {
    loadProducts(1); // Load initial page of products

    // Handle pagination link clicks
    $(document).on('click', '#pagination-links a', function(event) {
        event.preventDefault();
        var page = $(this).data('page');
        loadProducts(page);
    });
});

function loadProducts(page) {
    $.ajax({
        url: '/products?page=' + page,
        method: 'GET',
        success: function(response) {
            var data = response.data;
            var currentPage = response.current_page;
            var lastPage = response.last_page;

            // Build the product list HTML
            var productListHtml = '';
            $.each(data, function(index, product) {
                productListHtml += '<p>' + product.name + '</p>';
                // Add more fields as needed
            });

            // Update product list
            $('#product-list').html(productListHtml);

            // Build the pagination links HTML
            var paginationHtml = '';
            if (lastPage > 1) {
                paginationHtml += '<nav aria-label="Product pagination"><ul class="pagination">';
                if (currentPage > 1) {
                    paginationHtml += '<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage - 1) + '">Previous</a></li>';
                }
                for (var i = 1; i <= lastPage; i++) {
                    paginationHtml += '<li class="page-item' + (i === currentPage ? ' active' : '') + '"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
                }
                if (currentPage < lastPage) {
                    paginationHtml += '<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage + 1) + '">Next</a></li>';
                }
                paginationHtml += '</ul></nav>';
            }

            // Update pagination links
            $('#pagination-links').html(paginationHtml);
        }
    });
}
</script>