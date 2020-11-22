@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Edit Slider</h1>
        @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="" action="{{route('slider.update',[$slider->id])}}" method="post">
            {{--<!--    --><?php=// csrf_token() ?>--}}
            <input type="hidden" name="_token" value=" {{csrf_token()}} ">

            <div class="form-group">
                <label for="name">Slider Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" value="{{ $slider->title }}">
            </div>

            <div class="form-group">
                <label for="description">Slider Link</label>
                <input type="text" name="link" class="form-control" id="link" aria-describedby="emailHelp" value="{{$slider->link}}">
            </div>

            <div class="form-group">
                <label for="status">Slider Status</label>
                <input type="checkbox" name="status" class="form-control" value="1">
            </div>



            <button type="submit" class="btn btn-primary">Edit Slider</button>
        </form>

    </div>
@endsection
