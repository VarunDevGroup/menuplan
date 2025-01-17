var tblData = '';
$(function() {
    // draw function [called if the database updates]
    function draw_data() {
        if ($.fn.dataTable.isDataTable('#tblData') && tblData != '') {
            tblData.draw(true)
        } else {
            load_data();
        }
    }

    function load_data() {
        $("#tblData").dataTable().fnDestroy();

        tblData = $('#tblData').DataTable({
            dom: '<"row"B>flr<"py-2 my-2"t>ip',
            "processing": true,
            "serverSide": true,
            "searching":false,
            "lengthChange": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "ajax": {
                url: "./get_authors.php",
                method: 'POST'
            },
            columns: [{
                    data: 'language_id',
                    className: 'py-0 px-1'
                },
                {
                    data: 'language_name',
                    className: 'py-0 px-1'
                },
                {
                    data: 'language_code',
                    className: 'py-0 px-1'
                },
                {
                    data: null,
                    orderable: false,
                   className: 'text-center py-0 px-2',
                    render: function(data, type, row, meta) {
                       
                        return '<a class="me-2 btn btn-sm rounded-0 py-0 edit_data btn-info" href="javascript:void(0)" data-id="' + (row.language_id) + '">Edit</a>&nbsp;<a class="btn btn-sm rounded-0 py-0 delete_data btn-danger" href="javascript:void(0)" data-id="' + (row.language_id) + '">Delete</a>';
                    }
                }
                
            ],
            drawCallback: function(settings) {
                $('.edit_data').click(function() {
                    $.ajax({
                        url: 'get_single.php',
                        data: { id: $(this).attr('data-id') },
                        method: 'POST',
                        dataType: 'json',
                        error: err => {
                            alert("An error occured while fetching single data")
                        },
                        success: function(resp) {
                            if (!!resp.status) {
                                Object.keys(resp.data).map(k => {
                                    if ($('#edit_modal').find('input[name="' + k + '"]').length > 0)
                                        $('#edit_modal').find('input[name="' + k + '"]').val(resp.data[k])
                                })
                                $('#edit_modal').modal('show')
                            } else {
                                alert("An error occured while fetching single data")
                            }
                        }
                    })
                })
                $('.delete_data').click(function() {
                    $.ajax({
                        url: 'get_single.php',
                        data: { id: $(this).attr('data-id') },
                        method: 'POST',
                        dataType: 'json',
                        error: err => {
                            alert("An error occured while fetching single data")
                        },
                        success: function(resp) {
                            if (!!resp.status) {
                                $('#delete_modal').find('input[name="language_id"]').val(resp.data['language_id'])
                                //alert(resp.data['language_name']);
                               // $('#delete_modal').find('span[id="name"]').val(resp.data['language_name'])
                                $('#name').text(resp.data['language_name']);
                                $('#delete_modal').modal('show')
                            } else {
                                alert("An error occured while fetching single data")
                            }
                        }
                    })
                })
            },
            buttons: [{
                text: "Add New",
                className: "btn btn-primary py-0",
                action: function(e, dt, node, config) {
                    $('#add_modal').modal('show')
                }
            }],
            "order": [
                [1, "asc"]
            ],
            initComplete: function(settings) {
                $('.paginate_button').addClass('p-1')
            }
        });
    }
    //Load Data
    load_data()
        //Saving new Data
    $('#new-frm').submit(function(e) {
            e.preventDefault()
            $('#add_modal button').attr('disabled', true)
            $('#add_modal button[form="new-frm"]').text("saving ...")
            $.ajax({
                url: 'save_data.php',
                data: $(this).serialize(),
                method: 'POST',
                dataType: "json",
               
                success: function(resp) {
                    if (!!resp.status) {
                        if (resp.status == 'success') {
                            var _el = $('<div>')
                            _el.hide()
                            _el.addClass('alert alert-success alert_msg')
                            _el.text("Data successfully saved");
                            $('#new-frm').get(0).reset()
                            $('.modal').modal('hide')
                            $('#msg').append(_el)
                            _el.show('slow')
                            draw_data();
                            setTimeout(() => {
                                _el.hide('slow')
                                    .remove()
                            }, 2500)
                        } else if (resp.status == 'success' && !!resp.msg) {
                            var _el = $('<div>')
                            _el.hide()
                            _el.addClass('alert alert-danger alert_msg form-group')
                            _el.text(resp.msg);
                            $('#new-frm').append(_el)
                            _el.show('slow')
                        } else {
                            alert("An error occured. Please chech the source code and try again")
                        }
                    } else {
                        alert("An error occured. Please chech the source code and try again")
                    }

                    $('#add_modal button').attr('disabled', false)
                    $('#add_modal button[form="new-frm"]').text("Save")
                }
            })
        })
        // Update Data
    $('#edit-frm').submit(function(e) {
        
            e.preventDefault()
            $('#edit_modal button').attr('disabled', true)
            $('#edit_modal button[form="edit-frm"]').text("saving ...")
           
            $.ajax({
                url: 'update_data.php',
                data: $(this).serialize(),
                method: 'POST',
                dataType: "json",
              
                success: function(resp) {
                    if (!!resp.status) {
                        if (resp.status == 'success') {
                            var _el = $('<div>')
                            _el.hide()
                            _el.addClass('alert alert-primary alert_msg')
                            _el.text("Data successfully updated");
                            $('#edit-frm').get(0).reset()
                            $('.modal').modal('hide')
                            $('#msg').append(_el)
                            _el.show('slow')
                            draw_data();
                            setTimeout(() => {
                                _el.hide('slow')
                                    .remove()
                            }, 2500)
                        } else if (resp.status == 'success' && !!resp.msg) {
                            var _el = $('<div>')
                            _el.hide()
                            _el.addClass('alert alert-danger alert_msg form-group')
                            _el.text(resp.msg);
                            $('#edit-frm').append(_el)
                            _el.show('slow')
                        } else {
                            alert("An error occured. Please chech the source code and try again")
                        }
                    } else {
                        alert("An error occured. Please chech the source code and try again")
                    }

                    $('#edit_modal button').attr('disabled', false)
                    $('#edit_modal button[form="edit-frm"]').text("Save")
                }
            })
        })
        // DELETE Data
    $('#delete-frm').submit(function(e) {
        e.preventDefault()
        $('#delete_modal button').attr('disabled', true)
        $('#delete_modal button[form="delete-frm"]').text("deleting data ...")
        $.ajax({
            url: 'delete_data.php',
            data: $(this).serialize(),
            method: 'POST',
            dataType: "json",
            error: err => {
                alert("An error occured. Please chech the source code and try again")
            },
            success: function(resp) {
                if (!!resp.status) {
                    if (resp.status == 'success') {
                        var _el = $('<div>')
                        _el.hide()
                        _el.addClass('alert alert-primary alert_msg')
                        _el.text("Data successfully deleted");
                        $('#delete-frm').get(0).reset()
                        $('.modal').modal('hide')
                        $('#msg').append(_el)
                        _el.show('slow')
                        draw_data();
                        setTimeout(() => {
                            _el.hide('slow')
                                .remove()
                        }, 2500)
                    } else if (resp.status == 'success' && !!resp.msg) {
                        var _el = $('<div>')
                        _el.hide()
                        _el.addClass('alert alert-danger alert_msg form-group')
                        _el.text(resp.msg);
                        $('#delete-frm').append(_el)
                        _el.show('slow')
                    } else {
                        alert("An error occured. Please chech the source code and try again")
                    }
                } else {
                    alert("An error occured. Please chech the source code and try again")
                }

                $('#delete_modal button').attr('disabled', false)
                $('#delete_modal button[form="delete-frm"]').text("YES")
            }
        })
    })
});