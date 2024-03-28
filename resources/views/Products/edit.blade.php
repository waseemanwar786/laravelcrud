<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Laravel CRUD operation</title>
</head>
<body>
  <div class="container">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-light" href="/">Home Page</a>
    </div>
  </div>
</nav>
@if($message=Session::get('success'))
<div class="alert alert-success alert-block"><strong>{{$message}}</strong></div>
@endif
    <div class="container">
       <div class="row justify-content-center">
         <div class="col-sm-8">
          <div class="card mt-3 p-3">
            <h3>Edit: {{$product->name}}</h3>
            <form method="POST" action="/products/{{ $product->id }}/update" enctype="multipart/form-data">
              @csrf  
              @method("PUT")  
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name',$product->name)}}"/>
                @if($errors->has('name'))
                  <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea rows="4" name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                @if($errors->has('description'))
                  <span class="text-danger">{{$errors->first('description')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control"/>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>

          </div>

         </div>
       </div>
    </div>
  </div>
</body>
</html>
