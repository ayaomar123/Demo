@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Edit Ads</h1>
        @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class=""action="{{route('ads.update',[$ads->id])}}" method="post">
            {{--<!--    --><?php=// csrf_token() ?>--}}
            <input type="hidden" name="_token" value=" {{csrf_token()}} ">

            <div class="form-group">
                <label for="image">Choose Image</label>
                <input id="image" type="file" name="image">
            </div>
            <button type="put" class="btn btn-primary">Update Ads</button>
        </form>

    </div>
@endsection
