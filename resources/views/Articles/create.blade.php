@extends('layouts.admin')
@section('title','Create Article')
@section('content')
    <div class="container">
        <h1>Create Article</h1>
        @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
        <form class="" action="{{route('articles.store')}}" method="post">
            @csrf
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-5">
                <label for="name">Article Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mb-5">
                <label for="description">Article Description</label>
                <textarea name="description" rows="8" cols="80" class="form-control"> {{ str_replace('-',' ',old('description')) }}</textarea>
            </div>
            <img id="out" style="width: 300px">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-5">
                <label for="image">Article Image</label>
                <input id="image" type="file" name="image" value="{{old('image')}}" onchange="loadFile(event)">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mb-5">
                <label for="status">Article status</label><br>
                <input type="radio" id="published" name="status" value="1">
                <label for="published">published</label><br>
                <input type="radio" id="pending" name="status" value="0" checked="checked">
                <label for="pending">pending</label><br>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-5">
                    <label for="category">Select Category</label>
                        {{-- @foreach($categories as $category)
                        <div class="form-check">
                          <input name="categories[]" value="{{ $category->name }}" type="checkbox">
                          <label for="checkbox">{{ $category->name }} <br></label> <br>
                        </div>
                        @endforeach --}}
                    <select name="category_id[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

            <button type="submit" class="btn btn-primary"style=" width:10%">Add</button>
            <a class="btn btn-default"style=" width:10%"href="{{ asset('articles') }}">cancel</a>
        </form>

    </div>
    <script>
        var loadFile = function(event) {
            var out = document.getElementById('out');
            out.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
