@extends('layouts.admin')
@section('title', 'Category Page')
@section('content')
    <div class="container">
        <h1>Create Category</h1>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="" action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-5">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"
                    value="{{ old('name') }}">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mb-5">
                <label for="description">Category Description</label>
                <input type="text" name="description" class="form-control" id="description" aria-describedby="emailHelp"
                    value="{{ old('description') }}">
            </div>
            <img id="out" style="width: 300px">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-5">
                <label for="image">Choose Image</label>
                <input id="image" type="file" name="image" value="{{ old('image') }}" onchange="loadFile(event)">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mb-5">
                <label for="status">Category Status</label>
                <input type="checkbox" name="status" class="form-control" value="1">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-5">
                <label for="article">Select Article</label>
                <select name="article_id[]" id="article" class="form-control show-tick" data-live-search="true" multiple>
                    @foreach($articles as $article)
                        <option value="{{ $article->id }}">{{ $article->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

            <button type="submit" class="btn btn-primary">Add</button>
            <a class="btn btn-default" href="{{ asset('categories') }}">cancel</a>
        </form>

    </div>
@endsection
<script>
    var loadFile = function(event) {
        var out = document.getElementById('out');
        out.src = URL.createObjectURL(event.target.files[0]);
    };

</script>
