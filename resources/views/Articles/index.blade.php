@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Articles</h1>
        <a href="{{route('articles.create')}}"class="btn btn-sm btn-primary mb-3 ">Add Article</a>

        <table  class="table" width="100px">
            <tr>
                <th>Id</th>
                <th>Category_id</th>
                <th>Title</th>
{{--                <th>Slug</th>--}}
                <th>Description</th>
                <th> Status</th>
                <th> Image</th>

                <th> Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($Articles as $Article)
                <tr>
                    <?php
                    for($i=1;$i<$Article->id;$i++) ?>
                <td>
                <?php
                    echo $i;
                    ?>
                </td>
                    <td>1 </td>
                    <td>{{ $Article->title}}</td>
{{--                    <td>{{ $Article->slug}}</td>--}}
                    <td>
                        <p> {{ substr($Article->description, 0, 100) }}</p>
                        <a href="{{ route('articles.show', $Article->slug) }}" class="btn btn-primary btn-block">Read More</a>
                    </td>
                    <td>{{ $Article->status}}</td>
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
