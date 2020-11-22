@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Create Contact</h1>
        @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="" action="{{route('contact.store')}}" method="post">
            {{--<!--    --><?php=// csrf_token() ?>--}}
            <input type="hidden" name="_token" value=" {{csrf_token()}} ">

            <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" name="user_name" class="form-control" id="user_name" aria-describedby="emailHelp" value="{{old('user_name')}}">
            </div>

            <div class="form-group">
                <label for="user_email">User Email</label>
                <input type="email" name="user_email" class="form-control" id="user_email" aria-describedby="emailHelp" value="{{old('user_email')}}">
            </div>

            <div class="form-group">
                <label for="msg_title">Message Title</label>
                <input type="msg_title" name="msg_title" class="form-control" id="msg_title" aria-describedby="emailHelp" value="{{old('msg_title')}}">
            </div>


            <div class="form-group">
                <label for="msg">Message</label>
                <input type="text" name="msg" class="form-control" value="{{old('msg')}}">
            </div>



            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </div>
@endsection
