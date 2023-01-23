@extends('welcome')

@section('content')
<div class="container">
    <form action="{{route('product.update', $product['id'])}}" method="GET" enctype="multipart/form-data">
        @csrf
          <div class="mb-2">
            <input type="text" class="form-control" name="pname" id="" value="{{$product->pName}}" placeholder="Enter Product Name">
          </div>
          <div class="mb-2">
            <input type="text" class="form-control" name="pprice" id="" value="{{$product->pPrice}}" placeholder="Enter Product Price">
          </div>
          <div class="mb-2 form-group">
            <input class="form-control" type="file" id="file-1">
          </div>
          <img src="{{asset('uploads/'.$product->pImage)}}" height="100" width="100" alt=""> <br>
          
          <button type="submit" class="btn btn-primary mt-2">Submit</button>
          
      </form>
</div>
@endsection