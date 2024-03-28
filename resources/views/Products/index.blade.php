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
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-light" href="/">Home Page</a>
    </div>
  </div>
</nav>
  <div class="container">
    <div class="text-left">
        <a href="products/create">
       <button class="btn btn-primary mt-2">New Product</button>
       </a>
    </div>
    <table class="table table-hover mt-2">
      <thead>
        <tr>
          <td>No.</td>
          <td>Name</td>
          <td>Description</td>
          <td>Image</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$product->name}}</td>
          <td>{{$product->description}}</td>
          <td>
            <img src="products/{{$product->image}}" class="rounded-circle" width="30" heigh="30"/>
          </td>
          <td>
            <button class="btn btn-success btn-sm">
            <a href="products/{{$product->id}}/edit" class="text-muted">Edit</a>
            </button>
            <form method="POST" class="d-inline" action="products/ {{ $product->id }}/delete" >
               @csrf
               @method("DELETE")
               <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
