@extends('layouts.admin')
@section('title', 'Category Page')
@section('content')
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary mb-3 " style="width:100px">Add Customer</a>
    <table class="table" width="100px">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Articles</th>
            <th>Description</th>
            <th>image</th>
            <th>status</th>
            <th> Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($categories as $k=>$category)
            <tr>
            <td> {{$k + 1}}</td>
                    <td>{{ $category->name }} </td>
                    <td>@foreach ($category->articles as $article)
                        {{$article->name}},
                     @endforeach</td>
                    <td>{{ $category->description }}</td>
                    <td> <img src={{$category->image}} width="100" height="100"></td>
                    <td>
                        @if ($category->status != true)
                            <span class="badge bg-blue">Published</span>
                        @else
                            <span class="badge bg-pink">Pending</span>
                        @endif
                    </td>
                    <td> <a href="{{ route('categories.edit', [$category->id]) }}">Edit </a></td>
                    <td>
                        <form class="" action="{{ route('categories.destroy', [$category->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" name="button">Delete</button>
                        </form>
                    </td>
            </tr>
        @endforeach
    </table>
@endsection
