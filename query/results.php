<html>
<head>
    <script type="text/javascript" src="../jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
    <?php include_once "query.php"; ?>
</head>
<body>
    <div class="row-fluid" id="main_container">
        <div class="span12">
        </div>
        <div class="row-fluid">
            <div class="span2"></div>
            <div class="span8" id="inner_container">
                <h1 id="title">Query Things</h1>
                <?php
                $user = urldecode($_POST["user"]);
                $resource = urldecode($_POST["resource"]);
                $action = urldecode($_POST["action"]);
                $uid = get_user_id($user);
                $allow = does_user_has_access($uid, $resource, $action);
                var_dump($allow);
                echo "<p>User: " . $user . "</p>";
                echo "<p>Resource: " . $resource . "</p>";
                echo "<p>Action: " . $action . "</p>";
                echo "<p>Allow: " . $allow . "</p>";

                ?>
            </div>
        <div class="span2"></div>
        </div>
    </div>
</body>
</html>