@extends('layouts.admin')
@section('title', 'Edit Category Page')
@section('content')
    <div class="container">
        <h1>Edit Category</h1>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="" action="{{ route('categories.update', [$category->id]) }}" method="post">
            {{--
            <!--    --><?php=// csrf_token() ?>--}}
            <input type="hidden" name="_token" value=" {{ csrf_token() }} ">

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"
                    value="{{ $category->name }}">
            </div>

            <div class="form-group">
                <label for="description">Category Description</label>
                <input type="text" name="description" class="form-control" id="description" aria-describedby="emailHelp"
                    value="{{ $category->description }}">
            </div>

            <div class="form-group">
                <label for="image">Choose Image</label>
                <input id="image" type="file" name="image">
            </div>

            <div class="form-group">
                <label for="status">Category Status</label>
                <input type="checkbox" name="status" class="form-control" id="status" aria-describedby="emailHelp"
                    value="{{ $category->status }}">
            </div>


            <button type="put" class="btn btn-primary">Update</button>
            <a class="btn btn-default" href="{{ asset('categories') }}">cancel</a>
        </form>

    </div>
@endsection
