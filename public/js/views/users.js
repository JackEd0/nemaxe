$(document).ready(function(){
    $('#user_table').DataTable({
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

function edit_user(id, user_type_id) {
    var user_types = $("#hidden_user_types").val();
    var user_name = document.getElementById( "name_" + id ).textContent;
    user_types = JSON.parse(user_types);
    var div_edit_user =
    '<div class="col-sm-3">' +
        '<input type="text" class="form-control" placeholder="Nom"' +
               'id="user_name" value="' + user_name + '" disabled>' +
    '</div>' +
    '<div class="col-sm-3">' +
        '<select class="form-control" id="user_type_id">';
        for (var i = 0; i < user_types.length; i++) {
            div_edit_user += '<option value="' + user_types[i]['id'] + '"';
            if (user_types[i]['id'] == user_type_id) {
                div_edit_user += 'selected';
            }
            div_edit_user += ' >' + user_types[i]['name'] +
            '</option>';
        }
        div_edit_user += '</select>' +
    '</div>' +
    '<div class="col-sm-3">' +
        '<button type="button" class="btn btn-primary" onclick="update_user(' + id + ')" style="margin-right: 10px;">' +
            'Modifier' +
        '</button>' +
        '<button type="button" class="btn btn-danger" onclick="remove_div_user()">' +
            'Annuler' +
        '</button>' +
    '</div>';
    $("#div_edit_user").html(div_edit_user);
    $("#div_edit_user").css('margin-bottom', '90px');
}

function update_user(id) {
    var user_name = document.getElementById( "user_name" ).value;
    var user_type_id = document.getElementById("user_type_id").value;
    var user_type_name = $("#user_type_id option:selected").text();
    $.ajax({
        url: window.location.href + "/" + id,
        type: 'POST',
        data: {
            user_type_id: user_type_id,
            _method: "PUT", _token: $("#token_field").val()
        },
        dataType: 'json',
        success: function (response) {
            $("#name_" + id).text(user_name);
            $("#user_type_name_" + id).text(user_type_name);
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

function remove_div_user() {
    $("#div_edit_user").html('');
    $("#div_edit_user").css('margin-bottom', '0');
}

function delete_user(id) {
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
