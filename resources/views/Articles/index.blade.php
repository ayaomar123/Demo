@extends('layouts.admin')
@section('title', 'Manage Aticle')
 <!-- Datatables CSS CDN -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- jQuery CDN -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

    <!-- Datatables JS CDN -->
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
@section('content')
    <div class="container">
        <h1>Articles</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-sm btn-primary mb-3 ">Add Article</a>
        <table class="table table-striped" width="100px">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col"> Status</th>
                <th scope="col"> Image</th>
                <th scope="col"> Edit</th>
                <th scope="col">Delete</th>
            </tr>

            @foreach ($articles as $key => $article)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>
                        @foreach ($article->categories as $category)
                            {{ $category->name }},
                        @endforeach
                    </td>
                    {{-- <td>{{ $article->categories->name }}</td>
                    --}}
                    <td>{{ $article->title }}</td>
                    <td>
                        <p>{{ $article->description }}</p>
                    </td>
                    <td>
                        @if ($article->status == true)
                            <span class="">Published</span>
                        @else
                            <span class="">Pending</span>
                        @endif
                    </td>
                    <td><img src="{{ $article->image }}" width="100" height="100"></td>
                    <td><a href="{{ route('articles.edit', $article->id) }}">Edit </a></td></i>
                    <td>
                        <form class="" action="{{ route('articles.delete', [$article->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" name="button">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>

    </div>

@endsection
@section('script')


@endsection
