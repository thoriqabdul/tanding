$('body').on('click', '.modal-show', function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').removeClass('d-none').text(me.hasClass('edit') ? 'update' : 'create');


    $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
            
            $('#modal-body').html(response);
            $('#datepicker').datetimepicker({
                //autoclose: true,
                format : "yyyy-mm-dd hh:ii",
                startDate: '-0d',
                pickTime: true,
                autoclose: true,
                icons: {
                    up: "fa fa-chevron-circle-up",
                    down: "fa fa-chevron-circle-down",
                    next: 'fa fa-chevron-circle-right',
                    previous: 'fa fa-chevron-circle-left'
                }
        
            });
            $("#home_part").on("change paste keyup", function(e) {
                var wrapper  = $("#var_baru"); //Fields wrapper
                var gol = $(this).val();
                var data = $('.home').attr('data-id');
                susah(wrapper, gol, data);
            });
            $("#away_part").on("change paste keyup", function(e) {
                var wrapper  = $("#var_lama"); //Fields wrapper
                var gol = $(this).val();
                var data = $('.away').attr('data-id');
                susah(wrapper, gol, data);
            });
        }
    });

    $('#modal').modal('show');
});

$('#cole-btn').click(function(){
    $('#modal').modal('hide');
})

$('#modal-btn-save').click(function (event){
    event.preventDefault();

    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=method]').val() == undefined ? 'POST' : 'PUT';

        form.find('.help-block').remove();
        form.find('.form-group').removeClass('has-error');

    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function(response){
            if(response == 0){
                $('#modal').modal('show');
                $('.ada').addClass('d-none');
                $('.punggung').removeClass('d-none');
            } else if(response == 1){
                $('#modal').modal('show');
                $('.punggung').addClass('d-none');
                $('.ada').removeClass('d-none');
            }else {
                form.trigger('reset');
                $('#modal').modal('hide');
                $('#roles-table').DataTable().ajax.reload();
                $('#roles-table2').DataTable().ajax.reload();
                toastr.success("Berhasil", "Success!");
            }
        },
        error : function(xhr){
            var res = xhr.responseJSON;
            
            if($.isEmptyObject(res) == false){
                $.each(res.errors, function(key, value){
                    $('#'+key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class="help-block"><strong>' + value + '</strong></span>');
                });
            }
        }
    })
});


$('body').on('click', '.btn-show', function(event){
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').addClass('d-none');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
            $('#modal-body').html(response);
        }
    });


    $('#modal').modal('show');
});

$('body').on('click', '.btn-delete', function(event){
    event.preventDefault();

    var me = $(this),
            url = me.attr('href'),
            title = me.attr('title'),
            csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: 'Are you sure want to delete' + title +'?',
        text: 'Make Sure Baby!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if(result.value){
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    '_method': 'DELETE',
                    '_token' : csrf_token
                },
                success: function(response){
                    $('#roles-table').DataTable().ajax.reload();
                    swal({
                        type: 'success',
                        title: 'Succsess Delete Data',
                        text: 'has been Delete!'
                    });
                },
                error: function (xhr){
                    swal({
                        type: 'error',
                        title: 'Gagal Delete bos!',
                        text: 'Coba Lain Waktu1'
                    });
                }
            })
        }
    });
})

let susah = (wrapper, gol,data) => {
    $(wrapper).children('div').remove();
    for(var i = 1; i <= gol; i++){
        $(wrapper).append('<div class="form-group col-6 mb-15 text-center">'+
        '<select name="player[]" class="form-control pop" id="pop">'+
        '</select>'+
        '</div>'+
        '<div class="form-group col-6 mb-15 text-center">'+
        '<input name="mnt[]" class="form-control" type="text" placeholder="Default input" >'+
        '</div>'
        );
    }
    $.ajax({
        url: config.routes.zone+'?id='+data,
        success:function(response){ 
            var html = '';
            for(var i = 0; i < response.length; i++){
                html += '<option value="'+response[i].id+'">'+response[i].nama+'</option>';
            }
            $(wrapper).children().children().append(html);
        }
    })
}

