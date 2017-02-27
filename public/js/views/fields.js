$(document).ready(function(){
    $('#field_table').DataTable({
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

function edit_field(id) {
    var field_name = document.getElementById( "name_" + id ).textContent;
    var field_description = document.getElementById( "description_" + id ).textContent;
    var div_edit_field =
    '<div class="col-sm-3">' +
        '<input type="text" class="form-control" placeholder="Nom"' +
               'autofocus="" id="field_name" value="' + field_name + '">' +
    '</div>' +
    '<div class="col-sm-3">' +
        '<input type="text" class="form-control" placeholder="Descripition"' +
               'id="field_description" value="' + field_description + '">' +
    '</div>' +
    '<div class="col-sm-3">' +
        '<button type="button" class="btn btn-primary" onclick="update_field(' + id + ')" style="margin-right: 10px;">' +
            'Modifier' +
        '</button>' +
        '<button type="button" class="btn btn-danger" onclick="remove_div_field()">' +
            'Annuler' +
        '</button>' +
    '</div>';
    $("#div_edit_field").html(div_edit_field);
    $("#div_edit_field").css('margin-bottom', '90px');
}

function update_field(id) {
    var field_name = document.getElementById( "field_name" ).value;
    var field_description = document.getElementById( "field_description" ).value;
    $.ajax({
        url: window.location.href + "/" + id,
        type: 'POST',
        data: {
            name: field_name,
            description: field_description,
            _method: "PUT", _token: $("#token_field").val()
        },
        dataType: 'json',
        success: function (response) {
            $("#name_" + id).text(field_name);
            $("#description_" + id).text(field_description);
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

function remove_div_field() {
    $("#div_edit_field").html('');
    $("#div_edit_field").css('margin-bottom', '0');
}

function delete_field(id) {
    if(!confirm(
        'Attention, toutes les données de ce champ seront supprimées !' +
        '\nVous êtes sûr de vouloir continuer ?'
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

function store_field() {
    var field_name = document.getElementById( "name" ).value;
    var field_description = document.getElementById( "description" ).value;
    $.ajax({
        url: window.location.href,
        type: 'POST',
        data: {name: field_name, description: field_description, _token: $("#token_field").val()},
        dataType: 'json',
        success: function (response) {
            var new_field_id = response['data'];
            var new_field =
            '<tr id="tr_' + new_field_id +'">' +
                '<td id="name_' + new_field_id + '">' + field_name + '</td>' +
                '<td id="description_' + new_field_id + '">' + field_description + '</td>' +
                '<td>' +
                    '<div class="btn-group">' +
                        '<a class="btn btn-default" title="Sauvegarder"' +
                        'onclick="edit_field(' + new_field_id + ')">' +
                            '<span class="glyphicon glyphicon-floppy-disk"></span></a>' +
                        '<a class="btn btn-default" title="Supprimer" onclick="delete_field(' + new_field_id + ')">' +
                            '<span class="glyphicon glyphicon-remove"></span></a>' +
                    '</div>' +
                '</td>' +
            '</tr>';

            $("tbody").prepend(new_field);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('POST: ', jqXHR, textStatus, errorThrown);
        }
    });
}
