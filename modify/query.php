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
function get_all_resource_names() {
    $resources = get_all_resources();
    foreach($resources as $r) {
        echo create_option($r);
    }
}

// $_POST -> String
function modify_what() {
    $type = urldecode($_POST["modify_what"]);
    return $type;
}

function modify_user() {
    $user_name = urldecode($_POST["user"]);
    $user_id = get_user_id($user_name);
    $user_groups = get_user_groups($user_id);
    $group_names = array();
    foreach($user_groups as $id) {
        $name = get_group_name($id);
        array_push($group_names, $name);
    }
    echo "<tr><td>Name</td><td>" . $user_name . "</td></tr>";

    if ($user_groups) {
        foreach ($group_names as $group) {
            echo "<tr><td>Group</td><td>";
            echo $group;
            echo "</td><td><button id=\"$group\" class=\"btn btn-danger group_del\"></td></tr>";
        }
    }
    echo "</tbody></table>";
}

function modify_group() {
    $group_name = urldecode($_POST["group"]);

    $gid = get_group_id($group_name);

    $user_ids = users_in_group($gid);

    $user_names = array();
    foreach($user_ids as $uid) {
        $name = get_user_name($uid);
        array_push($user_names, $name);
    }

    $group_ids = get_group_groups($gid);

    $group_names = array();
    foreach($group_ids as $group) {
        $name = get_group_name($group);
        array_push($group_names, $name);
    }
    // Remove this group from the list of groups
    $group_names = array_diff($group_names, array($group_name));

    echo "<tr><td>Name</td><td>" . $group_name . "</td></tr>";

    if ($user_ids) {
        foreach ($user_names as $user) {
            echo "<tr><td>User</td><td>";
            echo urldecode($user);
            echo "</td><td><button class=\"btn btn-danger user_del\"></td></tr>";
        }
    }
    
    if ($group_ids) {
        foreach ($group_names as $g) {
            echo "<tr><td>Group</td><td>";
            echo urldecode($g);
            echo "</td><td><button id=\"$g\"class=\"btn btn-danger group_del\"></td></tr>";
        }
    }

    echo "</tbody></table>";
}


function modify_resource() {
    $resource_name = urldecode($_POST["resource"]);
    echo "<tr><td>Name</td><td>" . $resource_name . "</td></tr>";
    echo "</tbody></table>";
}

function modify_permission_set() {
    $group_select = $_POST["group_select"];
    $id = get_group_id($group_select);
    $resource_select = $_POST["resource_select"];
    $action_type = $_POST["action_type"];
    create_permission_set($id, $resource_select, $action_type);
    echo "<tr><td>Group</td><td>" . urldecode($_POST["group_select"]) . "</td></tr>";
    echo "<tr><td>Resource</td><td>" . urldecode($_POST["resource_select"]) . "</td></tr>";
    echo "<tr><td>Action</td><td>" . urldecode($_POST["action_type"]) . "</td></tr>";
    echo "</tbody></table>";

}

function create_table() {
    echo "<table><tbody>";
    $type = modify_what();
    // Create User
    if ($type == "user") {
        modify_user();
    } 
    // Create Group
    else if ($type == "group") {
        modify_group();
    } 
    // Create Resource
    else if ($type == "resource") {
        return modify_resource();
    }
    // Create Permission Set
    else if ($type == "permission") {
        return modify_permission_set();
    } 
    // Unrecognized creation
    else {
        echo "</tbody></table><p class=\"text-error\">Error</p>";
    }
}