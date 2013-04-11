<?php
include_once "create.php";

// $_POST -> String
function created_what() {
    $type = urldecode($_POST["create_what"]);
    return $type;
}

function created_user() {
    $user_name = urldecode($_POST["user_name"]);
    $user_groups = $_POST["user_groups"];
    create_user($user_name, $user_groups);
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
    create_group($group_name, $group_users, $group_groups);

    echo "<tr><td>Name</td><td>" . $group_name . "</td></tr>";

    if ($group_users) {
        foreach ($group_users as $user) {
            echo "<tr><td>User</td><td>"
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
    $resource_select = $_POST["resource_select"];
    $action_type = $_POST["action_type"];
    create_permission_set($group_select, $resource_select, $action_type);
    echo "<tr><td>Group</td><td>" . urldecode($_POST["group_select"]) . "</td></tr>";
    echo "<tr><td>Resource</td><td>" . urldecode($_POST["resource_select"]) . "</td></tr>";
    echo "<tr><td>Action</td><td>" . urldecode($_POST["action_type"]) . "</td></tr>";
    echo "</tbody></table>";

}

function create_table() {
    echo "<table><tbody>"
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
?>

<html>
<head>
    <script type="text/javascript" src="../jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
    <div class="row-fluid" id="main_container">
        <div class="span12">
        </div>
        <div class="row-fluid">
            <div class="span2"></div>
            <div class="span8" id="inner_container">
                <h1 id="title">Create Things</h1>
                <?php 
                    $type = created_what();
                    echo "<p>You created a " . $type . "!</p>";
                    create_table();
                ?>
            </div>
        <div class="span2"></div>
        </div>
    </div>
</body>
</html>