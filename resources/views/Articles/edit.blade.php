@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Edit Article</h1>
        @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="" action="{{route('articles.update',$articles->id)}}" method="post">

            @csrf
            <div class="form-group">
                <label for="name">Article Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" value="{{ $articles->title }}">
            </div>

            <div class="form-group">
                <label for="description">Article Description</label>
                <textarea name="description" rows="8" cols="80" class="form-control"> {{ str_replace('-',' ',$articles->description) }} </textarea>
            </div>
            <img id="out" style="width: 300px">
            <div class="form-group">
                <label for="image">Article Image</label>
                <input id="image" type="file" name="image" value="{{ $articles->image }}" onchange="loadFile(event)">
            </div>

            <div class="form-group">
                <label for="status">Article Status</label>
                <input type="checkbox" name="status" class="form-control" value="1">
            </div>



            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
    <script>
        var loadFile = function(event) {
            var out = document.getElementById('out');
            out.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
