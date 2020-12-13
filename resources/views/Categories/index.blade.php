@extends('layouts.admin')
<title>Category</title>
@section('name')
    <a href="{{ route('categories.index') }}" class="btn btn-primary">Show</a>
@endsection
@section('content')
    <div class="container mt-2">
        <div class="mb-4">
            <h2 class="text-center py-2"
                style="width: 100%;height:40px; background:#1f1e2e;color:whitesmoke;  font-family: Arial, Helvetica, sans-serif;">
                Manage Category
            </h2>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="mt-3 col-md-12">
                            <div class="form-check" style="float: left;padding-left:0rem;">
                                <input class="placeholder" aria-controls="laravel-datatable-crud"
                                    style="width:720px;height:36px;border:blue" type="text" name="name" id="name"
                                    placeholder="Please Enter your Category Name..">


                            </div>
                            <div class="form-check" style="float: right">
                                <select class="px-5 btn btn-lg btn-primary" name="status" id="status"
                                    style="width:160px;text-align:center">
                                    {{-- <option value="">Select Status</option>
                                    --}} <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                                <button style="margin-left: 10px" class="px-5 btn-lg btn btn-primary" name="search"
                                    id="search"><i class="fas fa-search"></i>Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="" style="width: 250px;margin-left:68px" class="px-5 btn btn-primary btn-lg"><i
                                    class="fas fa-check"></i>Activate
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="" style="width: 250px;" class="px-5 btn btn-lg btn-danger"><i
                                    class="fas fa-trash"></i>Delete
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ url('categories/create') }}" class="px-5 btn-lg btn"
                                style="background:rgb(19, 143, 29);color:white;float: right; width:250px;margin-right:150px"><i
                                    class="far fa-plus-square" style="color: white;width:25px"></i>Create Category
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="card-body">
        <table class="table table-bordered" id="laravel-datatable-crud">
            <thead>
                <tr style="background:#3699ff">
                    <th style=" text-align:center;width:40px"><input class="big-checkbox regular-checkbox text-content"
                            type="checkbox" name="select_all" value="1" id="example-select-all">
                    </th>
                    <th style="color: whitesmoke">Id</th>
                    <th style="color: whitesmoke">Name</th>
                    <th style="color: whitesmoke" width="10%">Description</th>
                    <th style="color: whitesmoke">Image</th>
                    <th style="color: whitesmoke" width="5%">Status</th>
                    <th style="color: whitesmoke" width="35%">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>


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
            var table = $('#laravel-datatable-crud').DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': {
                    url: "{{ url('categories') }}",
                    type: 'GET',
                    data: function(d) {
                        //d.status = $('#status').val(),
                        d.search = $('input[type="search"]').val()
                    }

                },
                rowId: "id",
                columns: [{
                        className: 'select-checkbox',
                        targets: 0,
                        orderable: false,
                        select: {
                            style: 'os',
                            selector: 'td:first-child'
                        },
                        order: [
                            [1, 'asc']
                        ],
                        data: 'id',
                        name: 'id'
                    },
                    {
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
                        name: 'image',
                        data: 'image',
                        render: function(data) {
                            return "<img src='" + data + "' width=auto height='70' />"

                        },
                    },
                    {
                        data: 'status',
                        "render": function(data) {
                            if (data == "1") {
                                return '<label class="switch">' +
                                    ' <input type="checkbox" class="toggle-event" checked>' +
                                    '<span class="slider round" value="1">' +
                                    '  </span>' +
                                    ' </label>';
                            } else return '<label class="switch">' +
                                ' <input type="checkbox" class="toggle-event">' +
                                '<span class="slider round" value="0">' +
                                '  </span>' +
                                ' </label>';
                        },
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },


                ],
                'columnDefs': [{
                    'targets': 0,
                    'searchable': false,
                    'orderable': false,
                    'className': 'dt-body-center',
                    'render': function(data, type, full, meta) {
                        return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(
                            data).html() + '">';
                    }
                }],
                'order': [
                    [1, 'asc']
                ]
            });

            $('#example-select-all').on('click', function() {
                // Get all rows with search applied
                var rows = table.rows({
                    'search': 'applied'
                }).nodes();
                // Check/uncheck checkboxes for all rows in the table
                $('input[type="checkbox"]', rows).prop('checked', this.checked);
            });

            // Handle click on checkbox to set state of "Select all" control
            $('#example tbody').on('change', 'input[type="checkbox"]', function() {
                // If checkbox is not checked
                if (!this.checked) {
                    var el = $('#example-select-all').get(0);
                    // If "Select all" control is checked and has 'indeterminate' property
                    if (el && el.checked && ('indeterminate' in el)) {
                        // Set visual state of "Select all" control
                        // as 'indeterminate'
                        el.indeterminate = true;
                    }
                }
            });

            // Handle form submission event
            $('#frm-example').on('submit', function(e) {
                var form = this;

                // Iterate over all checkboxes in the table
                table.$('input[type="checkbox"]').each(function() {
                    // If checkbox doesn't exist in DOM
                    if (!$.contains(document, this)) {
                        // If checkbox is checked
                        if (this.checked) {
                            // Create a hidden element
                            $(form).append(
                                $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', this.name)
                                .val(this.value)
                            );
                        }
                    }
                });
            });


            $('body').on('click', '.delete', function() {

                var catid = $(this).data("id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                    window.location.reload();
                });

                $.ajax({
                    type: "DELETE",
                    url: "{{ url('categories') }}" + '/' + catid,
                    success: function(data) {
                        var oTable = $('#laravel-datatable-crud').dataTable();
                        //window.location.reload();
                        //   oTable.fnDraw(true);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });

            });
        });

    </script>


@endsection
