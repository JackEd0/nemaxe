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
$('.card-part').on('click', 'span[data-event=delete_part]', function () {
    delete_part($(this));
});
$('.card-part').on('click', 'button[data-event=delete_question]', function () {
    $(this).parent().remove();
});
$('#subject_id').on('change', function () {
    udpate_subject($(this));
});
$('#btn_add_part').on('click', function () {
    add_part();
});
$('button[type=submit]')
.on('click', function () {
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
}
function delete_part($element) {
    if (!confirm('Are you sure you want to delete this part ?')) { return false; }
    part_index--;
    $element.parent().remove();
}
