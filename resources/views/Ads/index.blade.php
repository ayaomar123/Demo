@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Ads</h1>
        <a href="{{route('ads.create')}}"class="btn btn-sm btn-primary mb-3 ">Add Ads</a>

        <table  class="table" width="100px">
            <tr>
                <th>Id</th>
                <th>image</th>
                <th> Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($ads as $ad)
                <tr>
                    <?php
                    for($i=1;$i<$ad->id;$i++) ?>
                <td>
                <?php
                    echo $i;
                    ?>
                </td>
                    <td> <img src="{{ $ad->image }}"width="100" height="100"></td>
                    <td> <a href="{{ route('ads.edit',[$ad->id]) }}">Edit </a></td>
                    <td> <form class="" action="{{ route('ads.delete',[$ad->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"class="btn btn-danger" name="button">Delete</button>
                        </form> </td>

                </tr>
            @endforeach
        </table>





    </div>

@endsection
