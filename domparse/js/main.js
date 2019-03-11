$(document).ready(function () {
    $(document).on('click', '#form-btn', function () {

        var good = $('#good'),
            query = good.val(),
            validator = false,
            message = '';

        good.val('');
        $('#result').hide('fast');

        // search query validaion
        validator = validation(query);

        if (!validator.success) {
            $('#good').before("<div class='alert alert-danger' style='display:none;'><strong>Помилка: </strong> " + validator.message + "</div>");
            $('.alert').show('fast');

            setTimeout(function () {
                $('.alert').remove();
            }, 3000);

        } else {

            // get data from hotline.ua
            getResult(query);
        }

        return false;
    });
});

renderResultTable = function (items) {

    var table = "<table id='result-table' class='table table-bordered' cellspacing='0' width='100%'><thead><tr><th>Магазин</th><th>Лого</th><th>Опис</th><th>Ціна</th></tr></thead><tbody>",
        tr = '';

    for (var i = 0; i < items.length; i++) {
        tr = '<tr>';
        tr += '<td class="text-center"><strong>' + items[i].shop + '</strong></td>' + '<td><img src="' + items[i].img + '" alt="' + items[i].shop + '"></td>' +
            '<td>' + items[i].desc + '</td>' + '<td>' + items[i].price + ' грн.</td></tr>' ;
        table +=tr;
    }

    table += '</tbody></body>';

    $('#result').append(table).show('fast');

};