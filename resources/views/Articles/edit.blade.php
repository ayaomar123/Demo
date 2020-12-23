@extends('layouts.admin')
<title>Edit Article</title>
@section('name')
    <a href="#" class="btn btn-primary">Edit Article</a>
@endsection
@section('content')

    <div class="container ">
        <div class="mb-4 mt-3">
            <h2 class="text-center py-2 " style="width: 100%;height:40px; background:#1F1E2E;color:whitesmoke">
                Edit Article</h2>

            <form id="add-article" method="post" action="{{route('articles.update',[$articles->id])}}">
                @csrf
                <input type="hidden" name="id" class="form-control" value="{{ $articles->id }}" id="formGroupExampleInput">

                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                  <label for="formGroupExampleInput">Name</label>
                                  <input type="text" name="name"  value="{{ $articles->name }}" class="col-md-5 form-control" id="formGroupExampleInput" placeholder="Please enter title" value="{{ $articles->title }}">
                                  <span class="text-danger">{{ $errors->first('name') }}</span>
                                </blockquote>
                                <br>
                                <blockquote class="blockquote mb-0">
                                    <label for="message">Description</label>
                                    <textarea class="form-control col-md-5" name="description"
                                placeholder="Please enter description">{{$articles->description}}</textarea>
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                </blockquote>
                                <br>
                                <blockquote>
                                    <div class="col-md-5">
                                        <label for="image">Choose articles Image</label>
                                        <input id="image" type="file" name="image" value="{{ old('image') }}"
                                            onchange="loadFile(event)">
                                    </div>
                                    <div class="col-md-5">
                                        <img class="card-img-top" id="out" style="width:70%">
                                    </div>
                                </blockquote>
                                <br>
                                <blockquote class="blockquote mb-0">
                                    <div class="slideOne">
                                        <input {{$articles->status=='1'?"checked":""}} type="checkbox"  value="1" id="published" name="status" />
                                        <label for="slideOne">Active</label>
                                    </div>

                                </blockquote>
                                <br>
                                <div class="form-group" style="float: left">
                                    <button style="width:442px" type="submit" class="col-md-5 btn btn-success" id="btn-send">Submit</button>
                                    <a class='col-md-5 btn btn-light' href='{{ route('articles.index') }}'>Cancel</a>
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