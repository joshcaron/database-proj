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

                $type = urldecode($_GET["create_what"]);
                echo "<p>Type: " . $type . "</p>";
                if ($type == "user") {
                    echo "<p>You created a User!</p>";
                    echo "<p>Name: " . urldecode($_GET["user_name"]) . "</p>";
                    echo "<p>Groups: <br />";
                    foreach ($_GET["user_groups"] as $group) {
                        echo "" . urldecode($group) . "<br />";
                    }
                    echo "</p>";
                }

                if ($type == "group") {
                    echo "<p>You created a Group!</p>";
                    echo "<p>Name: " . urldecode($_GET["group_name"]) . "</p>";
                    echo "<p>Users: <br />";
                    foreach ($_GET["group_users"] as $user) {
                        echo "" . urldecode($user) . "<br />";
                    }
                    echo "</p>";
                    echo "<p>Groups: <br />";
                    foreach ($_GET["group_groups"] as $group) {
                        echo "" . urldecode($group) . "<br />";
                    }
                    echo "</p>";
                }

                if ($type == "resource") {
                    echo "<p>You created a Resource!</p>";
                    echo "<p>Name: " . urldecode($_GET["resource_name"]) . "</p>";
                }

                if ($type == "permission") {
                    echo "<p>You created a Permission Set!</p>";
                    echo "<p>Group: " . urldecode($_GET["group_select"]) . "</p>";
                    echo "<p>Action: " . urldecode($_GET["action_type"]) . "</p>";
                }

                ?> 
            </div>
        <div class="span2"></div>
        </div>
    </div>
</body>
</html>