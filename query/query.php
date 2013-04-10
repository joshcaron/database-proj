<?


include_once "../backend.php";

connect();



function create_option($name) {
    return "<option value=" . urlencode($name) . ">" . $name . "</option>";
}

function get_all_usernames() {
    $user_names = get_all_users();
    foreach($user_names as $name) {
        echo create_option($name);
    }
}


function get_all_resource_uri() {
    $resources = get_all_resources();
    foreach($resources as $uri) {
        echo create_option($uri);
    }
}

function get_all_action_names() {
    $actions = get_all_actions();
    foreach($actions as $action) {
        echo create_option($action);
    }
}

function get_all_var() {
    var_dump(get_all_users());
    var_dump(get_all_resources());
    var_dump(get_all_actions());
}