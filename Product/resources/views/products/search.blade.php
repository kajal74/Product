@foreach($results as $result)
  <div class="result-item">
    <h3>{{ $result->title }}</h3>
    <!-- Display other relevant information -->
  </div>
@endforeach

@foreach($results as $result)
      <tr>
        <td>{{$result->product_name}}</td>
        <td>{{$result->price}}</td>
        <td>{{$result->description}}</td>
        <td class="image-cell">
            <img src="{{asset('storage/images/'.$product->image)}}" alt="Image" width="20%">
        </td>
        <td>
            <a href="products/{{ $product->id }}/edit" class="btn btn-dark">Edit</a> 
            <a href="products/{{ $product->id }}/delete" class="btn btn-dark">Delete</a> 
</td>
      </tr>
      @endforeach