@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Articles</h1>
        <a href="{{route('articles.create')}}"class="btn btn-sm btn-primary mb-3 ">Add Article</a>

        <table  class="table" width="100px">
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Title</th>

                <th>Description</th>
                <th> Status</th>
                <th> Image</th>

                <th> Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($Articles as $key=>$Article)
                <tr>
                <td>{{ $key + 1 }} </td>
                    <td>{{!empty($Article->category) ? $Article->category->id:'1'}} </td>
                    {{-- <td>{{ $Article->category_id}}</td> --}}
                    <td>{{ $Article->title}}</td>
                    <td>
                        <p>{{$Article->description }}</p>
                    </td>
                    <td>@if($Article->status == true)
                        <span class="badge bg-blue">Published</span>
                    @else
                        <span class="badge bg-pink">Pending</span>
                    @endif
                </td>
                    <td> <img src="{{ $Article->image }}"width="100" height="100"></td>


                    <td> <a href="{{ route('articles.edit',$Article->id) }}">Edit </a></td>
                    <td> <form class="" action="{{ route('articles.delete',[$Article->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"class="btn btn-danger" name="button">Delete</button>
                        </form> </td>

                </tr>
            @endforeach
        </table>

    </div>

@endsection
