function user_selected() {
    $("#user_options").fadeIn();
    $("#group_options").hide();   
    $("#resource_options").hide();
    $("#permission_options").hide();}

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
        var sel = $('select[name="modify_what"] option:selected').val();
        if (sel == "user") {
            user_selected();
        }
        if (sel == "group") {
            group_selected();
        }
        if (sel == "resource") {
            resource_selected();
        }
    })
}

function delete_group() {
    $("tr").find(".group_del").each(function() {
        $(this).click(function() {
            var msg = "Are you sure you want to delete ";
            msg += $(this).attr("id");
            msg += "?";
            var row = $(this).parent().parent();
            $( "#dialog-confirm" ).dialog({
              resizable: false,
              height:140,
              modal: true,
              buttons: {
                "Delete": function() {
                  row.hide();
                  $( this ).dialog( "close" );
                },
                Cancel: function() {
                  $( this ).dialog( "close" );
                }
              }
            });
        })
    });
}

$(document).ready(function() {
    manage_selections();
    delete_group();
})