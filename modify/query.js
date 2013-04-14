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
            $('<div></div>').appendTo('body')
                    .html('<div><h6>Are you sure?</h6></div>')
                    .dialog({
                        modal: true, title: 'Delete message', zIndex: 10000, autoOpen: true,
                        width: 'auto', resizable: false,
                        buttons: {
                            Yes: function () {
                                $row.hide();

                                $(this).dialog("close");
                            },
                            No: function () {
                                $(this).dialog("close");
                            }
                        },
                        close: function (event, ui) {
                            $(this).remove();
                        }
                    });
        })
    });
}

$(document).ready(function() {
    manage_selections();
    delete_group();
})