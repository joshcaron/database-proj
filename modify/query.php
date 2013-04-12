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
function created_what() {
    $type = urldecode($_POST["create_what"]);
    return $type;
}

function created_user() {
    $user_name = urldecode($_POST["user_name"]);
    $user_groups = $_POST["user_groups"];
    $group_ids = array();
    foreach($user_groups as $group) {
        $id = get_group_id($group);
        array_push($group_ids, $id);
    }
    create_user($user_name, $group_ids);
    echo "<tr><td>Name</td><td>" . $user_name . "</td></tr>";

    if ($user_groups) {
        foreach ($user_groups as $group) {
            echo "<tr><td>Group</td><td>";
            echo urldecode($group) . "</td</tr>";
        }
    }
    echo "</tbody></table>";
}

function created_group() {
    $group_name = $_POST["group_name"];
    $group_users = $_POST["group_users"];
    $group_groups = $_POST["group_groups"];

    $user_ids = array();
    foreach($group_users as $user) {
        $id = get_user_id($user);
        array_push($user_ids, $id);
    }

    $group_ids = array();
    foreach($group_groups as $group) {
        $id = get_group_id($group);
        array_push($group_ids, $id);
    }

    create_group($group_name, $user_ids, $group_ids);


    echo "<tr><td>Name</td><td>" . $group_name . "</td></tr>";

    if ($group_users) {
        foreach ($group_users as $user) {
            echo "<tr><td>User</td><td>";
            echo urldecode($user) . "</td></tr>";
        }
    }
    
    if ($group_groups) {
        foreach ($group_groups as $group) {
            echo "<tr><td>Group</td><td>";
            echo urldecode($group) . "</td></tr>";
        }
    }

    echo "</tbody></table>";
}

function created_resource() {
    $resource_name = $_POST["resource_name"];
    create_resource($resource_name);
    echo "<tr><td>Name</td><td>" . $resource_name . "</td></tr>";
    echo "</tbody></table>";
}

function created_permission_set() {
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
    $type = created_what();
    // Create User
    if ($type == "user") {
        created_user();
    } 
    // Create Group
    else if ($type == "group") {
        created_group();
    } 
    // Create Resource
    else if ($type == "resource") {
        return created_resource();
    }
    // Create Permission Set
    else if ($type == "permission") {
        return created_permission_set();
    } 
    // Unrecognized creation
    else {
        echo "</tbody></table><p class=\"text-error\">Error</p>";
    }
}