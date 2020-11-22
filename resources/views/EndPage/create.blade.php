@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Create Page</h1>
        @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="" action="{{route('page.store')}}" method="post">
            {{--<!--    --><?php=// csrf_token() ?>--}}
            <input type="hidden" name="_token" value=" {{csrf_token()}} ">

            <div class="form-group">
                <label for="name">Page Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="description">Page Description</label>
                <input type="text" name="description" class="form-control" id="description" aria-describedby="emailHelp" value="{{old('description')}}">
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </div>
@endsection
