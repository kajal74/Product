<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-light bg-dark">
  <a class="navbar-brand text-light" href="/">Products Update</a>
</nav>
@if($message = Session::get('success'))
<div class="alert alert-sucess alert-block">
    <strong>{{$message}}</strong>
</div>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="cl-sm-8"> 
                <div class="card mt- p-3">
                <form method="GET" action="/products/{{$product->id}}/update">
                @csrf
                <div class="form-group">
                    <label> Name </label>
                    <input type="text" name ="name" class="form-control" value = "{{old('name',$product->product_name)}}"/>
    @if($errors->has('name'))
    <span class="text-danger">{{$errors->first('name')}}</span> 
    @endif               
</div>
<div class="form-group">
                    <label>Price </label>
                    <input type="text" name ="price" class="form-control" value = "{{old('price',$product->price)}}"/></div>
                    @if($errors->has('price'))
    <span class="text-danger">{{$errors->first('price')}}</span> 
    @endif  
<div class="form-group">
                    <label>Description </label>
                    <textarea  name ="description" rows ="4" class="form-control" value = "{{old('description',$product->description)}}"></textarea></div>
                    @if($errors->has('description'))
    <span class="text-danger">{{$errors->first('description')}}</span> 
    @endif  
</div>
<div>
<label>Image </label>
<input type="file" name="image" class="form-control">
 
</div>
<button type="submit" class="btn btn-dark mt-2">Update</button>
</div>
</div>
        <h1>Create Product<h1>
</div>
</body>
</html>