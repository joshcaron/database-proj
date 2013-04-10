<?
include_once "../backend.php";

connect();

function create_option($name) {
    return "<option value=" . urlencode($name) . ">" . $name . "</option>";
}

function get_all_group_names() {
    $groups = get_all_groups();
    foreach($groups as $group) {
        echo create_option($group);
    }
}

function get_all_user_names() {
    $users = get_all_users();
    foreach($users as $name) {
        echo create_option($name);
    }
}

function get_all_action_names() {
    $actions = get_all_actions();
    foreach($actions as $a) {
        echo create_option($a);
    }
}