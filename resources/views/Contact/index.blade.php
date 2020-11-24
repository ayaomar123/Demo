@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Contact</h1>
        <a href="{{route('contact.create')}}"class="btn btn-sm btn-primary mb-3 ">Add</a>

        <table  class="table" width="100px">
            <tr>
                <th>Id</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Message Title</th>
                <th>Message</th>
                <th> Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($contacts as $contact)
                <tr>
                    <?php
                    for($i=1;$i<$contact->id;$i++) ?>
                <td>
                <?php
                    echo $i;
                    ?>
                </td>
                    <td>{{ $contact->user_name}} </td>
                    <td>{{ $contact->user_email}}</td>
                    <td>{{ $contact->msg_title}}</td>
                    <td>{{ $contact->msg}}</td>
                    <td> <a href="{{ route('contact.edit',[$contact->id]) }}">Edit </a></td>
                    <td> <form class="" action="{{ route('contact.delete',[$contact->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"class="btn btn-danger" name="button">Delete</button>
                        </form> </td>

                </tr>
            @endforeach
        </table>





    </div>

@endsection
