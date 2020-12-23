@extends('layouts.admin')
@section('title', 'Create Article')
@section('name')
    <a href="#" class="btn btn-primary">Article</a>
    <a href="#" class="btn btn-primary">Create Article</a>
@endsection
@section('content')
    <div class="container mt-2 ">
        <div class="mb-4">
            <h2 class="text-center py-2"
                style="width: 100%;height:40px; background:#1f1e2e;color:whitesmoke;  font-family: Arial, Helvetica, sans-serif;">
                Create Article
            </h2>
            <form id="add-article" method="post" action="{{ url('articles') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <label for="formGroupExampleInput">Enter Article Name</label>
                                    <input type="text" name="name" class="form-control col-md-5" id="formGroupExampleInput"
                                        placeholder="Please enter name">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </blockquote>
                                <br>
                                <blockquote class="blockquote mb-0">
                                    <label for="message">Description</label>
                                    <textarea class="form-control col-md-5" name="description"
                                        placeholder="Please enter description"></textarea>
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                </blockquote>
                                <br>
                                <blockquote>
                                    <div class="col-md-5">
                                        <label for="image">Choose article Image</label>
                                        <input class="col-md-5" id="image" type="file" name="image"
                                            value="{{ old('image') }}" onchange="loadFile(event)">
                                    </div>
                                    <div class="col-md-6">
                                        <img class="card-img-top col-md-5" id="out" style="width:70%">
                                    </div>
                                </blockquote>
                                <br>
                                <blockquote class="blockquote mb-0">
                                    <div class="slideOne">
                                        <input type="checkbox" value="1" id="published" name="status" checked />
                                        <label for="slideOne">Active</label>
                                    </div>

                                </blockquote>
                                <br>
                                <div class="col-xs-12 col-sm-12 col-md-5 mb-5">
                                    <label for="category">Select Category</label>
                                    <select name="category_id[]" id="category" class="form-control show-tick"
                                        data-live-search="true" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group" style="float: left">
                                    <button style="width:442px" type="submit" class="btn btn-success col-md-5"
                                        id="btn-send">Submit</button>
                                    <a class='btn btn-light col-md-5' href='{{ route('articles.index') }}'>Cancel</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
    <script>
        var loadFile = function(event) {
            var out = document.getElementById('out');
            out.src = URL.createObjectURL(event.target.files[0]);
        };

    </script>
@endsection
