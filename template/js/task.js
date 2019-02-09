$(document).ready(function () {
    $(".field_to_order").click(function () {

        var fld = $(this).attr("id");
        var dt = [];

        if ($(this).children("span").hasClass("up")) {
            var ord = "ASC";
            var cls = "";
        } else {
            var ord = "DESC";
            var cls = "up";
        }
        $(this).children("span").toggleClass("up");

        $.post('/sort/sort',
            {field: fld, order: ord, data: dt, nclass: cls},
            function (res) {
                $('#selection').html('')


                for (var key in res) {
                    var task = '';
                    if (res[key]["status"] == 0) {
                        var task = "Не определено";
                    } else if (res[key]["status"] == 1) {
                        var task = "Выполнено";
                    } else if (res[key]["status"] == 2) {
                        var task = "Выполняется";
                    }

                    if (res[0]['secret'] == 'secret') {
                        var secret = '<a class="btn btn-warning btn-sm" href="/task/edit/' + res[key]["id"] + '" role="button">Изменить</a><br><br>'
                    } else {
                        var secret = '';
                    }
                    console.log(res[key]);
                    $('#selection').append('<tr>+' +
                        '<td><a href="/task/overview/' + res[key]["id"] + '"><img class="img_sm img-rounded" src="/template/images/product-details/' + res[key]["image"] + ' "></a></td>' +
                        ' <td>' + res[key]["name"] + '</td>' +
                        '<td>' + res[key]["email"] + '</td>' +
                        '<td class="task_body_row" >' + res[key]["task"] + '</td>' +
                        '<td class="task_status_row" >' +
                        task
                        + '</td>' +

                        '<td>' +
                        '<a class="btn btn-default btn-sm" href="/task/overview/' + res[key]["id"] + '" role="button">Просмотр</a>' +
                        secret +
                        ' </td>' +
                        '</tr>'
                    );

//
                }
//

            }
        );
    });
});
