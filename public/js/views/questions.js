$(document).ready(function(){
    $('#question_table').DataTable({
        ordering: true,
        searching: true,
        columnDefs: [
            { orderable: false, "targets": 1 },
            { searchable: false, "targets": 1}
        ],
    });
});

function edit_question(id) {
    var question_description = document.getElementById( "description_" + id ).textContent;
    var div_edit_question =
    '<div class="col-sm-6">' +
        '<textarea class="form-control" id="question_description" rows="4" cols="80" placeholder="Description">' +
            question_description + '</textarea>' +
    '</div>' +
    '<div class="col-sm-3">' +
        '<button type="button" class="btn btn-primary" onclick="update_question(' + id + ')" style="margin-right: 10px;">' +
            'Modifier' +
        '</button>' +
        '<button type="button" class="btn btn-danger" onclick="remove_div_question()">' +
            'Annuler' +
        '</button>' +
    '</div>';
    $("#div_edit_question").html(div_edit_question);
    $("#div_edit_question").css('margin-bottom', '150px');
}

function update_question(id) {
    var question_description = document.getElementById( "question_description" ).value;
    $.ajax({
        url: window.location.href + "/" + id,
        type: 'POST',
        data: {
            description: question_description,
            _method: "PUT", _token: $("#token_question").val()
        },
        dataType: 'json',
        success: function (response) {
            $("#description_" + id).text(question_description);
            var initial_color = $("#tr_" + id).css('background-color');
            $("#tr_" + id).css({'background-color': '#93FF93'});
            setTimeout(function () {
                $("#tr_" + id).css({'background-color': initial_color});
            }, 1500);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('POST: ', jqXHR, textStatus, errorThrown);
        }
    });
}

function remove_div_question() {
    $("#div_edit_question").html('');
    $("#div_edit_question").css('margin-bottom', '0');
}

function delete_question(id) {
    if(!confirm(
        'Attention, toutes les données de ce champ seront supprimées !' +
        '\nVous êtes sûr de vouloir continuer ?'
    )) {
        return false;
    }
    $.ajax({
        url: window.location.href + "/" + id,
        type: 'POST',
        data: {_method: "DELETE", _token: $("#token_question").val()},
        dataType: 'json',
        success: function (response) {
            var deletedDivId = "#tr_" + id;
            $(deletedDivId).fadeOut();
            setTimeout(function () {
                $(deletedDivId).remove();
            }, 1500);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('POST: ', jqXHR, textStatus, errorThrown);
        }
    });
}

function store_question() {
    var question_description = document.getElementById( "description" ).value;
    $.ajax({
        url: window.location.href,
        type: 'POST',
        data: {description: question_description, _token: $("#token_question").val()},
        dataType: 'json',
        success: function (response) {
            var new_question_id = response.data;
            var new_question =
            '<tr id="tr_' + new_question_id +'">' +
                '<td id="description_' + new_question_id + '">' + question_description + '</td>' +
                '<td>' +
                    '<div class="btn-group">' +
                        '<a class="btn btn-default" title="Sauvegarder"' +
                        'onclick="edit_question(' + new_question_id + ')">' +
                            '<span class="glyphicon glyphicon-floppy-disk"></span></a>' +
                        '<a class="btn btn-default" title="Supprimer" onclick="delete_question(' + new_question_id + ')">' +
                            '<span class="glyphicon glyphicon-remove"></span></a>' +
                    '</div>' +
                '</td>' +
            '</tr>';

            $("tbody").prepend(new_question);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('POST: ', jqXHR, textStatus, errorThrown);
        }
    });
}

$('a[title=Sauvegarder]').on('click', function () {
    edit_question($(this).data('id'));
});
$('a[title=Supprimer]').on('click', function () {
    delete_question($(this).data('id'));
});
$('#submit').on('click', function () {
    store_question();
});
