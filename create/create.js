function user_selected() {
    $("#user_options").fadeIn();
    $("#group_options").hide();   
    $("#resource_options").hide();
    $("#permission_options").hide();}

function permission_selected() {
    $("#user_options").hide();
    $("#group_options").hide();   
    $("#resource_options").hide();
    $("#permission_options").fadeIn();}

function group_selected() {
    $("#user_options").hide();
    $("#group_options").fadeIn();   
    $("#resource_options").hide();
    $("#permission_options").hide();}

function resource_selected() {
    $("#user_options").hide();
    $("#group_options").hide();   
    $("#resource_options").fadeIn();
    $("#permission_options").hide();}

function manage_selections() {
    $("#what").change(function() {
        var sel = $('select[name="what"] option:selected').val();
        if (sel == "user") {
            user_selected();
        }
        if (sel == "group") {
            group_selected();
        }
        if (sel == "resource") {
            resource_selected();
        }

        if (sel == "permission") {
            permission_selected();
        }
    })


}

$(document).ready(function() {
    manage_selections();
})