<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Edit Category</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

</head>
 
<body>
 
<div class="container mt-5">
   
    <form id="add-category" method="post" action="{{route('categories.update',[$category->id])}}"> 
      @csrf
      
      <input type="hidden" name="id" class="form-control" value="{{ $category->id }}" id="formGroupExampleInput">

      <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter title" value="{{ $category->title }}">
        <span class="text-danger">{{ $errors->first('name') }}</span>
      </div> 

      <div class="form-group">
        <label for="message">Description</label>
        <textarea name="description" class="form-control" id="description" placeholder="Please enter description">{{ $category->description }}</textarea>
        <span class="text-danger">{{ $errors->first('description') }}</span>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Image</label>
        <input type="file" name="image" class="form-control" id="formGroupExampleInput">
        <span class="text-danger">{{ $errors->first('image') }}</span>
      </div>
      

      <div class="form-group">
       <button type="submit" class="btn btn-success" id="btn-send">Submit</button>
      </div>
    </form>
 
</div>
</body>
</html>