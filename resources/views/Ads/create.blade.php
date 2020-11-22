@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Create Ads</h1>
        @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="" action="{{route('ads.store')}}" method="post">
            {{--<!--    --><?php=// csrf_token() ?>--}}
            <input type="hidden" name="_token" value=" {{csrf_token()}} ">

            <div class="form-group">
                <label for="image">Choose Image</label>
                <input id="image" type="file" name="image" value="{{old('image')}}">
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </div>
@endsection
