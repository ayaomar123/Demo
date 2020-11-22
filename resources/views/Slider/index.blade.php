@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Slider</h1>
        <a href="{{route('slider.create')}}"class="btn btn-sm btn-primary mb-3 ">Add slider</a>

        <table  class="table" width="100px">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Link</th>
                <th>Status</th>
                <th> Article_id</th>
                <th> Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($sliders as $slider)
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->title}} </td>
                    <td>{{ $slider->link}}</td>
                    <td>{{ $slider->status}}</td>
                    <td>1</td>
                    <td> <a href="{{ route('slider.edit',[$slider->id]) }}">Edit </a></td>
                    <td> <form class="" action="{{ route('slider.delete',[$slider->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"class="btn btn-danger" name="button">Delete</button>
                        </form> </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
