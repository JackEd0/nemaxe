$(document).ready(function(){
    $('#chapter_table').DataTable({
        ordering: true,
        searching: true,
        columnDefs: [
            { orderable: false, "targets": 2 },
            { searchable: false, "targets": 2}
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

function edit_chapter(id, subject_id) {
    var subjects = $("#hidden_subjects").val();
    var chapter_name = document.getElementById( "name_" + id ).textContent;
    subjects = JSON.parse(subjects);
    var div_edit_chapter =
    '<div class="col-sm-3">' +
        '<input type="text" class="form-control" placeholder="Nom"' +
               'autofocus="" id="chapter_name" value="' + chapter_name + '">' +
    '</div>' +
    '<div class="col-sm-3">' +
        '<select class="form-control" id="chapter_subject_id">';
        for (var i = 0; i < subjects.length; i++) {
            div_edit_chapter += '<option value="' + subjects[i]['id'] + '"';
            if (subjects[i]['id'] == subject_id) {
                div_edit_chapter += 'selected';
            }
            div_edit_chapter += ' >' + subjects[i]['name'] +
            '</option>';
        }
        div_edit_chapter += '</select>' +
    '</div>' +
    '<div class="col-sm-3">' +
        '<button type="button" class="btn btn-primary" onclick="update_chapter(' + id + ')" style="margin-right: 10px;">' +
            'Modifier' +
        '</button>' +
        '<button type="button" class="btn btn-danger" onclick="remove_div_chapter()">' +
            'Annuler' +
        '</button>' +
    '</div>';
    $("#div_edit_chapter").html(div_edit_chapter);
    $("#div_edit_chapter").css('margin-bottom', '90px');
}

function update_chapter(id) {
    var chapter_name = document.getElementById( "chapter_name" ).value;
    var chapter_subject_id = document.getElementById("chapter_subject_id").value;
    var chapter_subject_name = $("#chapter_subject_id option:selected").text();
    $.ajax({
        url: window.location.href + "/" + id,
        type: 'POST',
        data: {
            name: chapter_name,
            subject_id: chapter_subject_id,
            _method: "PUT", _token: $("#token_field").val()
        },
        dataType: 'json',
        success: function (response) {
            $("#name_" + id).text(chapter_name);
            $("#subject_name_" + id).text(chapter_subject_name);
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

function remove_div_chapter() {
    $("#div_edit_chapter").html('');
    $("#div_edit_chapter").css('margin-bottom', '0');
}

function delete_chapter(id) {
    if(!confirm(
        'Attention, toutes les données de ce champ seront supprimées !' +
        '"Vous êtes sûr de vouloir continuer ?'
    )) {
        return false;
    }
    $.ajax({
        url: window.location.href + "/" + id,
        type: 'POST',
        data: {_method: "DELETE", _token: $("#token_field").val()},
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

function store_chapter() {
    var chapter_name = document.getElementById( "name" ).value;
    var chapter_subject_id = document.getElementById("subject_id").value;
    var chapter_subject_name = $("#subject_id option:selected").text();
    $.ajax({
        url: window.location.href,
        type: 'POST',
        data: {name: chapter_name, subject_id: chapter_subject_id, _token: $("#token_field").val()},
        dataType: 'json',
        success: function (response) {
            var new_chapter_id = response['data'];
            var new_chapter =
            '<tr id="tr_' + new_chapter_id +'">' +
                '<td id="name_' + new_chapter_id + '">' + chapter_name + '</td>' +
                '<td id="subject_name_' + new_chapter_id + '">' + chapter_subject_name + '</td>' +
                '<td>' +
                    '<div class="btn-group">' +
                        '<a class="btn btn-default" title="Sauvegarder"' +
                        'onclick="edit_chapter(' + new_chapter_id + ', ' + chapter_subject_id + ')">' +
                            '<span class="glyphicon glyphicon-floppy-disk"></span></a>' +
                        '<a class="btn btn-default" title="Supprimer" onclick="delete_chapter(' + new_chapter_id + ')">' +
                            '<span class="glyphicon glyphicon-remove"></span></a>' +
                    '</div>' +
                '</td>' +
            '</tr>';

            $("tbody").prepend(new_chapter);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('POST: ', jqXHR, textStatus, errorThrown);
        }
    });
}
