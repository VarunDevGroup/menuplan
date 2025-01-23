var authorsTbl = '';
$(function() {
    // draw function [called if the database updates]
    function draw_data() {
        if ($.fn.dataTable.isDataTable('#tblData') && authorsTbl != '') {
            authorsTbl.draw(true)
        } else {
            load_data();
        }
    }

    function load_data() {
    
       
        authorsTbl = $('#tblData').DataTable({
           

            "processing": true,
            "serverSide": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "ajax": {
                url: "../BFF/couponBFF.php",
                method: 'POST',
                data: {
                    actiontype:"GetList"
                },
            },
            columns: [
                //{
                //    data: 'rowid'
                //},
                {
                    data: 'CouponCode'
                },
                {
                    data: 'VaildityDate'
                },
                {
                    data: 'CouponAmount'
                },
                {
                    data: 'CouponUsed'
                },
               
                {
                    data: null,
                    orderable: false,
                    className: 'text-center',
                    render: function(data, type, row, meta) {
 
                        if(row.CouponUsed=="Yes")
                        {
                            return '<a class="btn btn-danger btn-sm disabled btn-danger"  href="javascript:void(0)" data-id="' + (row.CouponID) + '"><i class="fas fa-eraser"></i> Delete</a>';
                        }
                        else
                        {
                            return '<a class="btn btn-danger btn-sm  delete_data btn-danger" href="javascript:void(0)" data-id="' + (row.CouponID) + '"> <i class="fas fa-eraser"></i> Delete</a>';
                        }
                    }
                }
               
                
            ],
            drawCallback: function(settings) {
                $('.edit_data').click(function() {
                    $.ajax({
                        url: '../BFF/palBFF.php',
                        data: { id: $(this).attr('data-id'),actiontype:"GetSingle" },
                        method: 'POST',
                        dataType: 'json',
                        error: err => {
                            alert("An error occured. Please chech the source code and try again")
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
                //className: "btn btn-primary py-0",
                action: function(e, dt, node, config) {
                    $('#add_modal').modal('show')
                }
            }],
            "order": [
                [1, "asc"]
            ],
            initComplete: function(settings) {
               // $('.paginate_button').addClass('p-1')
            }
        });
    }
    //Load Data
    load_data()
        //Saving new Data
    $('#new-frm').submit(function(e) {

            e.preventDefault()
        //    $('#add_modal button').attr('disabled', true)

         //   $('#add_modal button[form="new-frm"]').text("saving ...")

            $.ajax({
                url: '../BFF/couponBFF.php',
                data: $(this).serialize(),
                method: 'POST',
                dataType: "json",
               
                success: function(resp) {
                  
                    if (!!resp.status) {
                        if (resp.status == 'success') {
                            var _el = $('<div>')
                            _el.hide()
                            _el.addClass('alert alert-primary alert_msg')
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
                },
                error: err => {
                    alert("An error occured. Please chech the source code and try again")
                },
                
            })

        })
        // Update Data
    $('#edit-frm').submit(function(e) {
        
            e.preventDefault()
            $('#edit_modal button').attr('disabled', true)
            $('#edit_modal button[form="edit-frm"]').text("saving ...")
           
            $.ajax({
                url: '../BFF/palBFF.php',
                data: $(this).serialize(),
                
                method: 'POST',
                dataType: "json",
              
                success: function(resp) {
                    alert(resp);
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
    $('#delete-author-frm').submit(function(e) {
        e.preventDefault()
        $('#delete_modal button').attr('disabled', true)
        $('#delete_modal button[form="delete-author-frm"]').text("deleting data ...")
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
                        $('#delete-author-frm').get(0).reset()
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
                        $('#delete-author-frm').append(_el)
                        _el.show('slow')
                    } else {
                        alert("An error occured. Please chech the source code and try again")
                    }
                } else {
                    alert("An error occured. Please chech the source code and try again")
                }

                $('#delete_modal button').attr('disabled', false)
                $('#delete_modal button[form="delete-author-frm"]').text("YEs")
            }
        })
    })
});