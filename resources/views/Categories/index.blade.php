@extends('layouts.admin')
@section('content')
    <div class="container">
<h1>Categories</h1>
<a href="{{route('categores.create')}}"class="btn btn-sm btn-primary mb-3 ">Add Customer</a>

<table  class="table" width="100px">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>image</th>
        <th>status</th>
        <th> Edit</th>
        <th>Delete</th>
    </tr>
    @foreach($categories as $category)
        <tr>
            <?php
                for($i=1;$i<$category->id;$i++) ?>
            <td>
            <?php
                echo $i;
                ?>
            </td>
            <td>{{ $category->name}} </td>
            <td>{{ $category->description}}</td>
            <td> <img src="{{ $category->image }}"width="100" height="100"></td>
            <td>@if($category->status == true)
                <span class="badge bg-blue">Published</span>
            @else
                <span class="badge bg-pink">Pending</span>
            @endif
        </td>
            <td> <a href="{{ route('categores.edit',[$category->id]) }}">Edit </a></td>
            <td> <form class="" action="{{ route('categores.delete',[$category->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit"class="btn btn-danger" name="button">Delete</button>
                </form> </td>

        </tr>
    @endforeach
</table>





    </div>

@endsection
