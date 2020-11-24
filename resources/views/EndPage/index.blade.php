@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Pages</h1>
        <a href="{{route('page.create')}}"class="btn btn-sm btn-primary mb-3 ">Add page</a>

        <table  class="table" width="100px">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th> Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($pages as $page)
                <tr>
                    <?php
                    for($i=1;$i<$page->id;$i++) ?>
                <td>
                <?php
                    echo $i;
                    ?>
                </td>
                    <td>{{ $page->name}} </td>
                    <td>{{ $page->description}}</td>
                    <td> <a href="{{ route('page.edit',[$page->id]) }}">Edit </a></td>
                    <td> <form class="" action="{{ route('page.delete',[$page->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"class="btn btn-danger" name="button">Delete</button>
                        </form> </td>

                </tr>
            @endforeach
        </table>





    </div>

@endsection
