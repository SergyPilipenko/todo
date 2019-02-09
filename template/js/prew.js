$('#button_Preview').on('click', function () {
    var name = $('input[name="name"]').val();
    var email = $('input[name="email"]').val();

    var task = $('textarea[name="task"]').val();

    var file_data = $('#inp').prop('files')[0];

    var form_data = new FormData();

    form_data.append('file', file_data);
    form_data.append('name', name);
    form_data.append('email', email);
    form_data.append('task', task);


    $.ajax({

        url: '/task/ajax',

        dataType: 'text',

        cache: false,

        contentType: false,

        processData: false,

        data: form_data,

        type: 'post',

        success: function (data) {
            $("#toPreview").html('');
            if (data) {
                var image = JSON.parse(data);


                $("#toPreview").append('<div>' +
                    '<div class="prew_img"><img  src="/template/images/product-details/' + image.img + ' "></div>' +
                    '</div>' + '<div class="prew_data">' +
                    ' <div>' + 'Имя :' + name + '</div>' +
                    '<div>' + 'Email :' + email + '</div>' +
                    '<div >' + 'Задача :' + task + '</div>' + '</div>');
            }

        }

    });

});


