@extends('layouts.admin')
<title>Create Category</title>
@section('li')
<a href="{{route('categories.create')}}"
title="Create Category">Create</a>
@endsection
@section('span')
    <h3>Create Category</h3>
@endsection
@section('content')
    


  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Create Category</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

</head>
 
<body>
 
<div class="container mt-5">
   
    <form id="add-category" method="post" action="{{ url('categories') }}"> 
      @csrf
      <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
        <span class="text-danger">{{ $errors->first('name') }}</span>
      </div> 

      <div class="form-group">
        <label for="message">Description</label>
        <textarea class="form-control" name="description" placeholder="Please enter description"></textarea>
        <span class="text-danger">{{ $errors->first('description') }}</span>
      </div>

      <div class="form-group">
        <label for="formGroupExampleInput">Image</label>
        <input type="file" name="image" class="form-control" id="formGroupExampleInput" placeholder="Please enter image">
        <span class="text-danger">{{ $errors->first('image') }}</span>
      </div> 

      <div class="form-group">
        <label for="formGroupExampleInput">status</label>
        <label for="status">Article status</label><br>
                <input type="radio" id="published" name="status" value="1">
                <label for="published">published</label><br>
                <input type="radio" id="pending" name="status" value="0" checked="checked">
                <label for="pending">pending</label><br>
      </div> 

      <div class="form-group">
       <button type="submit" class="btn btn-success" id="btn-send">Submit</button>
       <a class='btn btn-light' href='{{route("categories.index")}}'>Cancel</a>
      </div>
    </form>
 
</div>
@endsection