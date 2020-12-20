@extends('layouts.admin')
<title>Category</title>
@section('style')
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 11px;
        }

    </style>
@endsection
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
                <form>
                    <div class="card-body">
                        <div class="row">
                            <form>
                                <div class="mt-3 col-md-12">
                                    <div class="form-check" style="float: left;padding-left:0rem;">
                                        <select class="mdb-select md-form" searchable="Search here.." name='cat' id="cat"
                                            style="width:720px;height:70px;">
                                            <option value="">Select your Category Name</option>
                                            @foreach ($items as $item)
                                                <option {{ old('name') == $item->id ? 'selected' : '' }}
                                                    value='{{ $item->name }}'>{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-check"
                                        style="float: left;padding-left:0rem;">
                                        <input class="placeholder" aria-controls="laravel-datatable-crud"
                                            style="width:720px;height:36px;border:blue" type="search" name="name" id="name"
                                            placeholder="Please Enter your Category Name..">
                                    </div> --}}
                                    <div class="form-check" style="float: right">
                                        <select class="px-5 btn btn-lg btn-primary" name="status" id="status"
                                            class="filter-select" style="width:165px;text-align:center">
                                            <option value="">Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                        <button type="submit" style="margin-left: 10px" class="px-5 btn-lg btn btn-primary"
                                            name="filter" id="filter"><i class="fas fa-search"></i>filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="" style="width: 250px;" data-url="{{ url('categories/activate') }}"
                                class="px-5 btn btn-info btn-lg activate"><i class="fas fa-check"></i>Activate
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="" style="width: 250px;margin-left:0px;margin-right:20px"
                                data-url="{{ url('categories/activeAll') }}"
                                class="px-5 btn btn-primary btn-lg active-all"><i class="fas fa-check"></i>Deactivate
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="" style="width: 250px;" data-url="{{ url('myproductsDeleteAll') }}"
                                class="px-5 btn btn-lg btn-danger delete-all"><i class="fas fa-trash"></i>Delete
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ url('categories/create') }}" class="px-5 btn-lg btn"
                                style="background:rgb(19, 143, 29);color:white;float: right; width:250px;"><i
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
                            type="checkbox" name="check_all" id="check_all">
                    </th>
                    <th style="color: whitesmoke">Id</th>
                    <th style="color: whitesmoke">Name</th>
                    <th style="color: whitesmoke" width="20%">Description</th>
                    <th style="color: whitesmoke">Image</th>
                    <th style="color: whitesmoke" width="5%">Status</th>
                    <th style="color: whitesmoke" width="22%">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>


@endsection
@section('script')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>




    <script>
        $(document).ready(function() {
            $('.mdb-select').select2();

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
                        d.search = $('input[type="search"]').val(),
                        d.cat = $('#cat').val(),
                        d.status = $("#status").val()
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
                        "render": function(data, type, row, meta) {
                            if (data) {
                                return '<label class="switch">' +
                                    ' <input data-id="' + row.id +
                                    '" class="toggle-slider" type="checkbox" value="1" checked>' +
                                    '<span class="slider round">' +
                                    '  </span>' +
                                    ' </label>';
                            } else return '<label class="switch">' +
                                ' <input data-id="' + row.id +
                                '" class="toggle-slider" type="checkbox" value="0" >' +
                                '<span class="slider round" >' +
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
                        return '<input type="checkbox" name="id[]" value="' + $(
                            '<div/>').text(
                            data).html() + '" class="checkbox" id="' + $(
                            '<div/>').text(
                            data).html() + '">';
                    }
                }],
                'order': [
                    [1, 'asc']
                ]
            });

            $('#filter').on('click', function(e) {
                e.preventDefault();
                var status = $('#status').val();
                var cat = $('#cat').val();
                $.ajax({
                    url: "{{ route('searching') }}",
                    method: "get",
                    data: {
                        name: cat,
                        status: status
                    },
                    success: function(data) {
                        //alert("suceess");
                        $('#laravel-datatable-crud').DataTable().ajax.reload();
                    },
                    error: function(data) {
                        alert("Failed");
                    }
                });
            });

            //selecte records
            $('#check_all').change(function() {
                $(".checkbox").prop('checked', $(this).prop('checked'));
            });

            //delete record
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

            //delete selected records
            $('.delete-all').on('click', function(e) {
                e.preventDefault();
                var id = [];

                $('.checkbox:checked').each(function() {
                    id.push($(this).val());
                    //alert(id);
                });
                if (id.length > 0) {
                    if (confirm) {
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
                        });
                        $.ajax({
                            url: "{{ route('category.multiple-delete') }}",
                            method: "post",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                //alert(data);
                                $('#laravel-datatable-crud').DataTable().ajax.reload();

                            }
                        });
                    }
                } else {
                    toastr.info("Select A record");
                }

            });

            //deactivate selected records
            $('.active-all').on('click', function(e) {
                e.preventDefault();
                var id = [];
                $('.checkbox:checked').each(function() {
                    id.push($(this).val());
                });
                if (id.length > 0) {

                    //alert(id);
                    $.ajax({
                        url: "{{ route('categories.activeAll') }}",
                        method: "PUT",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            toastr.success("Data Deactivated!");
                            $('#laravel-datatable-crud').DataTable().ajax.reload();
                        },
                        error: function(data) {
                            alert("Failed");
                        }
                    });
                } else {
                    toastr.error("Please choose At least one");
                }
            });

            //activate selected records
            $('.activate').on('click', function(e) {
                e.preventDefault();
                var id = [];
                $('.checkbox:checked').each(function() {
                    id.push($(this).val());
                });
                if (id.length > 0) {

                    //alert(id);
                    $.ajax({
                        url: "{{ route('categories.activate') }}",
                        method: "PUT",
                        data: {
                            id: id
                        },
                        success: function(response) {
                            toastr.info("Data Activated!");
                            $('#laravel-datatable-crud').DataTable().ajax.reload();
                        },
                        error: function(data) {
                            alert("Failed");
                        }
                    });
                } else {
                    toastr.error("Please choose At least one");
                }
            });

        });

        //toggle one record
        $(document).on('click', '.toggle-slider', function() {
            var $this = $(this);
            var status = 0;
            var id = $this.data('id');
            if ($this.is(':checked')) status = 1;
            $.ajax({
                url: "{{ route('categories.changeStatus') }}",
                type: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function(response, status, xhr) {
                    toastr.success("Data Updated Succesfully!");
                },
                error: function(jqXhr, textStatus, errorMessage) {

                }
            });
        });

    </script>


@endsection
