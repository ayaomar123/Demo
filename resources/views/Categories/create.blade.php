@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Create Category</h1>
        @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="" action="{{route('categores.store')}}" method="post">
            {{--<!--    --><?php=// csrf_token() ?>--}}
            <input type="hidden" name="_token" value=" {{csrf_token()}} ">

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="description">Category Description</label>
                <input type="text" name="description" class="form-control" id="description" aria-describedby="emailHelp" value="{{old('description')}}">
            </div>

            <div class="form-group">
                <label for="image">Choose Image</label>
                <input id="image" type="file" name="image" value="{{old('image')}}">
            </div>

            <div class="form-group">
                <label for="status">Category Status</label>
                <input type="checkbox" name="status" class="form-control" value="1">
            </div>



            <button type="submit" class="btn btn-primary">Add</button>
        </form>

        </div>
@endsection
