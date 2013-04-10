function user_selected() {
    $("#user_options").fadeIn();
    $("#group_options").hide();   
    $("#resource_options").hide();

}

function group_selected() {
    $("#user_options").hide();
    $("#group_options").fadeIn();   
    $("#resource_options").hide();}

function resource_selected() {
    $("#user_options").hide();
    $("#group_options").hide();   
    $("#resource_options").fadeIn();}

function manage_selections() {
    $("#type").change(function() {
        var sel = $('select[name="type"] option:selected').text();
        if (sel == "User") {
            user_selected();
        }
        if (sel == "Group") {
            group_selected();
        }
        if (sel == "Resource") {
            resource_selected();
        }
    })


}

$(document).ready(function() {
    manage_selections();
})