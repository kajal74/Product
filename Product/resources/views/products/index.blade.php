<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <!-- Include twbsPagination plugin -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
    
</head>
<body>
<nav class="navbar navbar-light bg-dark">
  <a class="navbar-brand text-light" href="/">Products</a>
</nav>
</div>
    <div class="container">
        <div class="text-right" style="display: flex; justify-content: space-around margin-rigt=0">
            <a href="products/create" class="btn btn-dark mt-5">New Product</a>
            <a href="/login" class="btn btn-dark mt-5">Login</a>
            <a href="/signup" class="btn btn-dark mt-5">Signup</a>
            <a href="products/search" class="btn btn-dark mt-5">Product Search</a>

</div>
<div>
<form >
        
              
                <input type="text" id="livesearch" class="form-control" name="query" placeholder="Search here....." value="{{ request()->input('query') }}">

             </form>
</div>
</div>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>price</th>
        <th>Discription</th>
        <th>image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="alldata">
    @if(count($products) > 0)
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
      @else

<tr><td>No result found!</td></tr>
@endif
    </tbody >

    {{$products->links()}}
    <tbody id="Content" class="searchdata">
    
</tbody>


  </table>

  
</body>
</html>

<script>
  $('#livesearch').on('keyup', function() {
  $value= $(this).val();
    console.log($value);
    if($value){
      console.log("dakdhk");
      $('.alldata').hide();
      $('.searchdata').show();
    }else{
      $('.alldata').show();
      $('.searchdata').hide();
    }

    $.ajax({

      type:'get',
      url: "/products/search",
      data:{'search':$value},

      success:function(data){  
        var html = '';

// Iterate over the response data and generate HTML rows
for (var i = 0; i < data.length; i++) {
    html += '<tr>';
    html += '<td><img src="' + data[i].product_name + '" alt="Image"></td>';
    html += '<td>' + data[i].price + '</td>';
    html += '<td>' + data[i].description + '</td>';
    html += '<td>' + data[i].image + '</td>';

    html += '</tr>';
}
        $('#Content').html(html);
      }

  });
  
  }
);
</script>
