@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Create Article</h1>
        @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="" action="{{route('articles.store')}}" method="post">
            {{--<!--    --><?php=// csrf_token() ?>--}}
            <input type="hidden" name="_token" value=" {{csrf_token()}} ">

            <div class="form-group">
                <label for="name">Article Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" value="{{old('title')}}">
            </div>

            <div class="form-group">
                <label for="description">Article Description</label>
                <textarea name="description" rows="8" cols="80" class="form-control"> {{ str_replace('-',' ',old('description')) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Article Image</label>
                <input id="image" type="file" name="image" value="{{old('image')}}">
            </div>

            <div class="form-group">
                <label for="status">Article Status</label>
                <input type="checkbox" name="status" class="form-control" value="1">
            </div>
            <div class="form-group ">
                    <label for="category">Select Category</label>
                    <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </div>
@endsection
