@extends('layouts.admin')
<title>Category</title>
@section('span')
    <nav aria-label="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Library</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data</li>
      
    </nav>
@endsection
@section('content')

    <body>
        <div class="container mt-4">
            <div class="mb-4">
                <h2 class="text-content text-center" style="width: 100%;height:40px; background:#1F1E2E;color:whitesmoke">Manage Category</h2>
                <input type="text" class="searchEmail" onkeyup="myFunction()" id="searchByName" placeholder="Search for Name.." title="Type in a name">

                <select name="searchByStatus" id="searchByStatus" class="btn btn-sm" style="background: #a5c1f8fa">
                    <option value="">Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Dis Active</option>
                </select>
                <a href="{{ url('categories/create') }}" class="text-center btn mb-1"
                    style="background:rgb(19, 143, 29);color:white;float: right;" ;>Create Category</a>
            </div>

            <table class="table table-bordered" id="laravel-datatable-crud">
                <thead>
                    <tr style="background:#a5c1f8fa">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </body>
@endsection
@section('script')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#laravel-datatable-crud').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('categories') }}",
                    type: 'GET',

                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },


                ]
            });
        });

        $('body').on('click', '.delete', function() {

            var catid = $(this).data("id");
            confirm("Are You sure want to delete !")

            $.ajax({
                type: "DELETE",
                url: "{{ url('categories') }}" + '/' + catid,
                success: function(data) {
                    var oTable = $('#laravel-datatable-crud').dataTable();
                    window.location.reload();
                    //   oTable.fnDraw(true);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

        });
        $(".searchEmail").keyup(function(){

table.draw();

});
//         function myFunction() {
//   // Declare variables
//   var input, filter, table, tr, td, i, txtValue;
//   input = document.getElementById("searchByName").value;
//   //filter = input.value.toUpperCase();
//   table = document.getElementById("laravel-datatable-crud");
//   tr = table.getElementsByTagName("tr");

//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[0];
//     if (td) {
//       txtValue = td.textContent || td.innerText;
//       if (txtValue.toUpperCase().indexOf(input) > -1) {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     }
//   }
// }


    </script>

@endsection
