$(document).ready(function(){
    $('#subject_table').DataTable({
        ordering: true,
        searching: true,
        columnDefs: [
            { orderable: false, "targets": 1 },
            { searchable: false, "targets": 1}
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

function edit_subject(id) {
    var subject_name = document.getElementById( "name_" + id ).textContent;
    var div_edit_subject =
    '<div class="col-sm-3">' +
        '<input type="text" class="form-control" placeholder="Nom"' +
               'autofocus="" id="subject_name" value="' + subject_name + '">' +
    '</div>' +
    '<div class="col-sm-3">' +
        '<button type="button" class="btn btn-primary" onclick="update_subject(' + id + ')" style="margin-right: 10px;">' +
            'Modifier' +
        '</button>' +
        '<button type="button" class="btn btn-danger" onclick="remove_div_subject()">' +
            'Annuler' +
        '</button>' +
    '</div>';
    $("#div_edit_subject").html(div_edit_subject);
    $("#div_edit_subject").css('margin-bottom', '90px');
}

function update_subject(id) {
    var subject_name = document.getElementById( "subject_name" ).value;
    $.ajax({
        url: window.location.href + "/" + id,
        type: 'POST',
        data: {
            name: subject_name,
            _method: "PUT", _token: $("#token_subject").val()
        },
        dataType: 'json',
        success: function (response) {
            $("#name_" + id).text(subject_name);
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

function remove_div_subject() {
    $("#div_edit_subject").html('');
    $("#div_edit_subject").css('margin-bottom', '0');
}

function delete_subject(id) {
    if(!confirm(
        'Attention, toutes les données de ce champ seront supprimées !' +
        '"Vous êtes sûr de vouloir continuer ?'
    )) {
        return false;
    }
    $.ajax({
        url: window.location.href + "/" + id,
        type: 'POST',
        data: {_method: "DELETE", _token: $("#token_subject").val()},
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

function store_subject() {
    var subject_name = document.getElementById( "name" ).value;
    $.ajax({
        url: window.location.href,
        type: 'POST',
        data: {name: subject_name, _token: $("#token_subject").val()},
        dataType: 'json',
        success: function (response) {
            var new_subject_id = response['data'];
            var new_subject =
            '<tr id="tr_' + new_subject_id +'">' +
                '<td id="name_' + new_subject_id + '">' + subject_name + '</td>' +
                '<td>' +
                    '<div class="btn-group">' +
                        '<a class="btn btn-default" title="Sauvegarder"' +
                        'onclick="edit_subject(' + new_subject_id + ')">' +
                            '<span class="glyphicon glyphicon-floppy-disk"></span></a>' +
                        '<a class="btn btn-default" title="Supprimer" onclick="delete_subject(' + new_subject_id + ')">' +
                            '<span class="glyphicon glyphicon-remove"></span></a>' +
                    '</div>' +
                '</td>' +
            '</tr>';

            $("tbody").prepend(new_subject);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('POST: ', jqXHR, textStatus, errorThrown);
        }
    });
}
