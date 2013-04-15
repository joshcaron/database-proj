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

    $resources = get_all_resources();
    foreach($resources as $resource) {
        delete_resource($resource);
    }
}

?>


<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <div class="row-fluid" id="main_container">
        <div class="span12">
        </div>
        <div class="row-fluid">
            <div class="span2"></div>
            <div class="span8" id="inner_container">
                <h1 id="title">Reset Database</h1>
                <div id="results">
                    <?php

                    clear_all();
                    echo "<p>Cleared!</p>";

                    ?>
                    <a href="index.php">Back</back>
                </div>
                
            </div>
            <div class="span2">
            </div>
        </div>
    </div>

</body>
</html>

