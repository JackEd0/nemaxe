$(document).ready(function(){
    $('#card_table').DataTable({
        ordering: true,
        searching: true,
        columnDefs: [
            { orderable: false, "targets": 4 },
            { searchable: false, "targets": 4}
        ],
        language: {
            processing:     "Traitement en cours...",
            search:         "Rechercher&nbsp;:",
            lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
            info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix:    "",
            loadingRecords: "Chargement en cours...",
            zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable:     "Aucune donnée disponible dans le tableau",
            paginate: {
                first:      "Premier",
                previous:   "Pr&eacute;c&eacute;dent",
                next:       "Suivant",
                last:       "Dernier"
            },
            aria: {
                sortAscending:  ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    });
});

function edit_card(id) {
    var card_name = document.getElementById( "name_" + id ).textContent;
    var card_description = document.getElementById( "description_" + id ).textContent;
    var div_edit_card =
    '<div class="col-sm-3">' +
        '<input type="text" class="form-control" placeholder="Nom"' +
               'autofocus="" id="card_name" value="' + card_name + '">' +
    '</div>' +
    '<div class="col-sm-3">' +
        '<input type="text" class="form-control" placeholder="Descripition"' +
               'id="card_description" value="' + card_description + '">' +
    '</div>' +
    '<div class="col-sm-3">' +
        '<button type="button" class="btn btn-primary" onclick="update_card(' + id + ')" style="margin-right: 10px;">' +
            'Modifier' +
        '</button>' +
        '<button type="button" class="btn btn-danger" onclick="remove_div_card()">' +
            'Annuler' +
        '</button>' +
    '</div>';
    $("#div_edit_card").html(div_edit_card);
    $("#div_edit_card").css('margin-bottom', '90px');
}

function update_card(id) {
    var card_name = document.getElementById( "card_name" ).value;
    var card_description = document.getElementById( "card_description" ).value;
    $.ajax({
        url: window.location.href + "/" + id,
        type: 'POST',
        data: {
            name: card_name,
            description: card_description,
            _method: "PUT", _token: $("#token_card").val()
        },
        dataType: 'json',
        success: function (response) {
            $("#name_" + id).text(card_name);
            $("#description_" + id).text(card_description);
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

function remove_div_card() {
    $("#div_edit_card").html('');
    $("#div_edit_card").css('margin-bottom', '0');
}

function delete_card(id) {
    if(!confirm(
        'Attention, toutes les données de ce champ seront supprimées !' +
        '\nVous êtes sûr de vouloir continuer ?'
    )) {
        return false;
    }
    $.ajax({
        url: window.location.href + "/" + id,
        type: 'POST',
        data: {_method: "DELETE", _token: $("#token_card").val()},
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

function store_card() {
    var card_name = document.getElementById( "name" ).value;
    var card_description = document.getElementById( "description" ).value;
    $.ajax({
        url: window.location.href,
        type: 'POST',
        data: {name: card_name, description: card_description, _token: $("#token_card").val()},
        dataType: 'json',
        success: function (response) {
            var new_card_id = response.data;
            var new_card =
            '<tr id="tr_' + new_card_id +'">' +
                '<td id="name_' + new_card_id + '">' + card_name + '</td>' +
                '<td id="description_' + new_card_id + '">' + card_description + '</td>' +
                '<td>' +
                    '<div class="btn-group">' +
                        '<a class="btn btn-default" title="Sauvegarder"' +
                        'onclick="edit_card(' + new_card_id + ')">' +
                            '<span class="glyphicon glyphicon-floppy-disk"></span></a>' +
                        '<a class="btn btn-default" title="Supprimer" onclick="delete_card(' + new_card_id + ')">' +
                            '<span class="glyphicon glyphicon-remove"></span></a>' +
                    '</div>' +
                '</td>' +
            '</tr>';

            $("tbody").prepend(new_card);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('POST: ', jqXHR, textStatus, errorThrown);
        }
    });
}



// cards.form view
var part_index = 1;
$('input[data-event=question_input]').on('keyup', function (e) {
    // e.preventDefault();
    if (e.keyCode == 13) {
        $(this).parent().find('button[data-event=add_question]').click();
    }
});
$('button[data-event=add_question]').on('click', function () {
    add_question($(this));
});
// $('span[data-event=delete_part]').on('click', function () {
//     delete_part($(this));
// });
$('.card-part').on('click', 'span[data-event=delete_part]', function () {
    delete_part($(this));
});
$('#subject_id').on('change', function () {
    udpate_subject($(this));
});
$('#btn_add_part').on('click', function () {
    add_part();
});
$('button[type=submit]')
.on('click', function () {
    // $('form').submit();
    $('#btn_submit').prop('name', $(this).prop('name'));
    $('#btn_submit').prop('type', 'submit');
    $('#btn_submit').click();
})
.on('mouseleave', function () {
    $('#btn_submit').prop('type', 'button');
});
function add_question($element) {
    var $input = $element.parent().parent().find('input');
    var question = $input.val();
    if (question === '') { return false; }
    $input.val('');
    var new_question =
    '<li>' +
        '<button class="btn btn-default" type="button" data-event="delete_question">' +
            '<span class="glyphicon glyphicon-remove-circle"></span>' +
        '</button>' + question +
        '<input type="hidden" name="questions[' + $element.data('index') + '][]" value="' + question + '">' +
    '</li>';
    $element.parent().parent().parent().find('ol[data-tag=questions_list]').append(new_question);
    $('button[data-event=delete_question]').on('click', function () {
        $(this).parent().remove();
    });
}
function udpate_subject($element) {
    var subject_id = $element.val();
    $.ajax({
        url: window.location.href + "/get-chapters",
        type: 'POST',
        data: {
            subject_id: subject_id,
            _token: $("#token_field").val()
        },
        dataType: 'json',
        success: function (response) {
            if (response.status === 200) {
                $("#chapter_ids").html(response.data.chapters);
            }
            $('.selectpicker').selectpicker('refresh');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('POST: ', jqXHR, textStatus, errorThrown);
        }
    });
}
function add_part() {
    part_index++;
    var new_part =
    '<div class="card-exercice thumbnail mmb">' +
        '<span class="glyphicon glyphicon-remove-circle" data-event="delete_part" aria-hidden="true"></span>' +
        '<h4>Exercise</h4>' +
        '<textarea name="exercises[' + part_index + ']" rows="6" cols="80" class="form-control" required=""></textarea>' +
        '<hr>' +
        '<div class="card-questions">' +
            '<h4>Questions</h4>' +
            '<div class="input-group">' +
                '<input type="text" class="form-control" placeholder="" data-event="question_input">' +
                '<span class="input-group-btn">' +
                    '<button class="btn btn-default" type="button" data-event="add_question" data-index="' + part_index + '">' +
                        '<span class="glyphicon glyphicon-plus-sign"></span>' +
                    '</button>' +
                '</span>' +
            '</div>' +
            '<ol data-tag="questions_list"></ol>' +
        '</div>' +
    '</div>';
    $('#parts_panel').append(new_part);
    $('input[data-event=question_input]').on('keyup', function (e) {
        if (e.keyCode == 13) { $(this).parent().find('button[data-event=add_question]').click(); }
    });
    $('button[data-event=add_question]').on('click', function () {
        add_question($(this));
    });
    // $('span[data-event=delete_part]').on('click', function () {
    //     delete_part($(this));
    // });
}
function delete_part($element) {
    if (!confirm('Are you sure you want to delete this part ?')) { return false; }
    console.log(part_index);
    part_index--;
    $element.parent().remove();
}
