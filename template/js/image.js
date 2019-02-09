$('input[type="file"][preview-target-id]').on('change', function () {
    var input = $(this)
    if (!window.FileReader) return false // check for browser support
    if (input[0].files && input[0].files[0]) {


        var file_data = $('#inp').prop('files')[0];

        var form_data = new FormData();

        form_data.append('file', file_data);


        $.ajax({

            url: '/task/ajax',

            dataType: 'json',

            cache: false,

            contentType: false,

            processData: false,

            data: form_data,

            type: 'post',

            success: function (res) {
                $('#' + input.attr('preview-target-id')).html('');

                if (!res.error) {
                    $('.input_error').html('');
                    var target = $('#' + input.attr('preview-target-id'))

                    target.append('<img src ="/template/images/product-details/' + res.img + '">');

                } else {
                    $('.input_error').html('<p id="error_img">Неверный формат</p>');

                }
            }

        })
    }
})

