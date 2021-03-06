$(document).ready(function(){
    if (locale_lang == 'fr') {
        $('#result_table').DataTable({
            ordering: true,
            searching: false,
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
    } else {
        $('#result_table').DataTable({
            ordering: true,
            searching: false
        });
    }

    if (document.getElementById('advanced_search').value === '') {
        $("#filter_panel").find("input, select").prop('disabled', true);
    } else {
        $("#filter_panel").find("input, select").prop('disabled', false);
    }
});
$("#link_advanced_search").on('click', function () {
    document.getElementById('advanced_search').value = document.getElementById('advanced_search').value === '' ? '1' : '';
    if (document.getElementById('advanced_search').value === '') {
        $("#filter_panel").find("input, select").prop('disabled', true);
    } else {
        $("#filter_panel").find("input, select").prop('disabled', false);
    }
});
