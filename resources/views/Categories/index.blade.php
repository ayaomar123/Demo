<!DOCTYPE html>
 
<html lang="en">
<head>

<title>Category DataTables</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script> 

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</head>
      <body>
         <div class="container mt-4">
            <h2 class="text-center mt-2 mb-3 alert alert-success">Category DataTable</h2>
            <a href="{{ url('categories/create') }}" class="text-center btn btn-success mb-1">Create Category</a>
            <table class="table table-bordered" id="laravel-datatable-crud">
               <thead>
                  <tr>
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
   <script>
     $(document).ready( function () {
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
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    { data: 'image', name: 'image' },
                    { data: 'status', name: 'status' },
                    {data: 'action', name: 'action', orderable: false, searchable: false},

                 ]
       });
     });

     $('body').on('click', '.delete', function () {
 
        var catid = $(this).data("id");
        confirm("Are You sure want to delete !")
        
          $.ajax({
              type: "DELETE",
              url: "{{ url('categories') }}"+'/'+catid,
              success: function (data) {
              var oTable = $('#laravel-datatable-crud').dataTable(); 
              window.location.reload();
            //   oTable.fnDraw(true);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
       
    });   
  
   </script>
  </body>
</html>