@extends('layouts.admin')
@section('title', 'Category Page')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@section('content')
   

<div class="container">
    <h1>Mange Categories</h1>
    <a class="btn btn-success" href="javascript:void(0)" id="createNewCategory"> Create New Category</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nmae</th>
                <th>Description</th>
                <th>image</th>
                <th>Status</th>
                <th width="300px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="CategoryForm" name="CategoryForm" class="form-horizontal">
                   <input type="hidden" name="Category_id" id="Category_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-12">
                            <textarea id="description" name="description" required="" placeholder="Enter description" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-sm-2 control-label">image</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" id="image" name="image" placeholder="Enter image" value="" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">status</label>
                        <div class="col-sm-12">
                            <input type="checkbox" class="form-control" id="status" name="status" placeholder="Enter status" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('categories.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name', orderable:false, searchable: false},
            {data: 'description', name: 'description'},
            {data: 'status', name: 'status'},
            {data: 'image', name: 'image'},
        ]
    });
    $('#createNewCategory').click(function () {
        $('#saveBtn').val("create-Category");
        $('#id').val('');
        $('#CategoryForm').trigger("reset");
        $('#modelHeading').html("Create New Category");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editCategory', function () {
      var id = $(this).data('id');
      $.get("{{ route('categories.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit Category");
          $('#saveBtn').val("edit-Category");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#name').val(data.name);
          $('#description').val(data.description);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
        $.ajax({
          data: $('#categoryForm').serialize(),
          url: "{{ route('categories.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#categoryForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    $('body').on('click', '.deleteCategory', function () {
        var id = $(this).data("id");
        $confirm = confirm("Are You sure want to delete !");
        if($confirm == true ){
            $.ajax({
                type: "DELETE",
                url: "{{ route('categories.store') }}"+'/'+id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
  });
</script>
