<?

include_once "backend.php";

connect();
function clear_all() {
    $users = get_all_users();

    foreach($users as $name) {
        $id = get_user_id($name);
        delete_user($id);
    }

    $groups = get_all_groups();

    foreach($groups as $group) {
        $id = get_group_id($group);
        delete_group($id);
    }

    // $resources = get_all_resources();
    // foreach($resources as $resource) {
    //     delete_resource($resource);
    // }
}


clear_all();