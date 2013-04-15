<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
                <div id="results">
                    <h1 id="title">Query Things</h1>
                    <?php
                    $user = urldecode($_POST["user"]);
                    $resource = urldecode($_POST["resource"]);
                    $action = urldecode($_POST["action"]);
                    $uid = get_user_id($user);
                    $allow = does_user_has_access($uid, $resource, $action);
                    if ($allow) {
                        $allow = "True";
                    } else {
                        $allow = "False";
                    }
                    echo "<table><tbody>";
                    echo "<tr><td>User</td><td>" . $user . "</td></tr>";
                    echo "<tr><td>Resource</td><td>" . $resource . "</td></tr>";
                    echo "<tr><td>Action</td><td>" . $action . "</td></tr>";
                    echo "<tr><td>Allow</td><td>" . $allow . "</tr>";
                    echo "</tbody></table>";
                    ?>
                    <a href="..">Back</a>
                </div>
            </div>
        <div class="span2"></div>
        </div>
    </div>
</body>
</html>