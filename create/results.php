<html>
<head>
    <script type="text/javascript" src="../jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
    <?php include_once "create.php"; ?>
</head>
<body>
    <div class="row-fluid" id="main_container">
        <div class="span12">
        </div>
        <div class="row-fluid">
            <div class="span2"></div>
            <div class="span8" id="inner_container">
                <h1 id="title">Create Things</h1>
                <p>RESULTS</p>

                <?php

                // $type = urldecode($_GET["what"]);
                echo "<p>Type: " . $type . "</p>";
                if ($type == "user") {
                    $user_name = urldecode($_GET["user_name"]);
                    $user_groups = $_GET["user_groups"];
                    create_user($user_name, $user_groups);
                    echo "<p>You created a User!</p>";
                    echo "<p>Name: " . $user_name . "</p>";
                    echo "<p>Groups: <br />";
                    foreach ($user_groups as $group) {
                        echo "" . urldecode($group) . "<br />";
                    }
                    echo "</p>";
                }

                if ($type == "group") {
                    $group_name = $_GET["group_name"];
                    $group_users = $_GET["group_users"];
                    $group_groups = $_GET["group_groups"];
                    create_group($group_name, $group_users, $group_groups);

                    echo "<p>You created a Group!</p>";
                    echo "<p>Name: " . $group_name . "</p>";
                    echo "<p>Users: <br />";
                    foreach ($group_users as $user) {
                        echo "" . urldecode($user) . "<br />";
                    }
                    echo "</p>";
                    echo "<p>Groups: <br />";
                    foreach ($group_groups as $group) {
                        echo "" . urldecode($group) . "<br />";
                    }
                    echo "</p>";
                }

                if ($type == "resource") {
                    $resource_name = $_GET["resource_name"];
                    create_resource($resource_name);
                    echo "<p>You created a Resource!</p>";
                    echo "<p>Name: " . $resource_name . "</p>";
                }

                if ($type == "permission") {
                    $group_select = $_GET["group_select"];
                    $action_type = $_GET["action_type"];
                    create_permission_set($group_select, $resource_select, $action_type);
                    echo "<p>You created a Permission Set!</p>";
                    echo "<p>Group: " . urldecode($_GET["group_select"]) . "</p>";
                    echo "<p>Resource: " . urldecode($_GET["resource_select"]) . "</p>";
                    echo "<p>Action: " . urldecode($_GET["action_type"]) . "</p>";
                }

                ?> 
            </div>
        <div class="span2"></div>
        </div>
    </div>
</body>
</html>