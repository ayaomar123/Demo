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
            'searching': true,
            'ajax': {
                url: "{{ url('articles/data') }}",
                type: 'GET',
                data: function(d) {
                    d.search = $('input[type="search"]').val(),
                        d.artcile = $('#artcile').val(),
                        d.category = $('#category').val(),
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
                    name: 'categories',
                    data: 'categories[0].name',                    
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

        //seaching by Article name or status
        $('#filter').on('click', function(e) {
            e.preventDefault();
            var status = $('#status').val();
            var artcile = $('#artcile').val();
            var category = $('#category').val();
            $.ajax({
                url: "{{ route('searching') }}",
                method: "get",
                data: {
                    name: artcile,
                    category: category,
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
                confirmButtonText: 'Yes, delete it!',
                closeOnConfirm: false
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    window.location.reload();
                }
            });
            $.ajax({
                type: "DELETE",
                url: "{{ url('articles') }}" + '/' + catid,
                success: function(data) {
                    var oTable = $('#laravel-datatable-crud').dataTable();
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
                        confirmButtonText: 'Yes, delete it!',
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            window.location.reload();
                        }
                    });
                    $.ajax({
                        url: "{{ route('articles.multiple-delete') }}",
                        method: "DELETE",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            //$('#laravel-datatable-crud').DataTable().ajax.reload();
                            var oTable = $('#laravel-datatable-crud').dataTable();
                        },
                        error: function(data) {
                            console.log('Error:', data);
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
                    url: "{{ route('articles.deactive') }}",
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
                    url: "{{ route('articles.activate') }}",
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
            url: "{{ route('articles.changeStatus') }}",
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