$(document).ready(function(){
    $('#chapter_table').DataTable();
});

function save_chapter(id, subject_id) {
    var subjects = $("#hidden_subjects").val();
    subjects = JSON.parse(subjects);
    var div_edit_chapter =
    '<div class="col-sm-3">' +
        '<input type="text" class="form-control" placeholder="Nom"' +
               'autofocus="" id="chapter_name">' +
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
        '<button type="button" class="btn btn-primary" onclick="create_chapter()">' +
            'Modifier' +
        '</button>' +
    '</div>';
    $("#div_edit_chapter").html(div_edit_chapter);
    $("#div_edit_chapter").css('margin-bottom', '80px'); 
}

function delete_chapter(id) {

}
