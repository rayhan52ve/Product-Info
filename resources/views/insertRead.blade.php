@extends('welcome')

@section('content')
  <center>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-danger mt-5 fw-bold fs-4  " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add Record
        </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-info" id="staticBackdropLabel">Insert Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="insertData" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="mb-2">
                <input type="text" class="form-control" name="pname" id="" placeholder="Enter Product Name">
              </div>
              <div class="mb-2">
                <input type="text" class="form-control" name="pprice" id="" placeholder="Enter Product Price">
              </div>
              <div class="mb-2">
                <input type="file" class="form-control" name="image" id="" >
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-left">Submit</button>
              </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
  </center>

  
  <table class="table mt-5">
    <thead class="bg-danger text-white fw-bold">
    <th>Product ID</th>
      <th>Product Name</th>
      <th>Product Price</th>
      <th>Product Image</th>
      <th></th>
    </thead>
    <tbody class="text-danger bg-lite fs-4">
      @foreach($data as $item)
      <tr>
        <form action="updatedelete" method="get"></form>
        <td><input type="hidden" value="{{$item['id']}}">{{$item['id']}}</td>
        <td><input type="hidden" value="{{$item['pName']}}">{{$item['pName']}}</td>
        <td><input type="hidden" value="{{$item['pPrice']}}">{{$item['pPrice']}}</td>
        <td><img src="uploads/{{$item['pImage']}}" height="100px" width="110px"></td>
        <td class="mt-2 btn-group-vertical">
          <a class="btn btn-sm btn-outline-success mt-2 " href="{{ route('product.edit', $item['id'])}}" value="Update">Edit</a>
          <form action="{{ route('product.destroy', $item['id'])}}" method="delete">
             <input type="submit" class="btn btn-sm btn-outline-danger mt-2 md-2" onclick="return confirm('Confirm Delete')" value="Delete">
          </form>
          
        </td>
        
      </tr>
      @endforeach
    </tbody>
  </table>



@endsection