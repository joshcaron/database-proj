<?

include_once "backend.php";

connect();
$users = get_all_users();
foreach($users as $name {
    $id = get_user_id($name);
    delete_user($id);
}

$groups = get_all_groups();
foreach($groups as $group) {
    $id = get_group_id($group);
    delete_group($id);
}