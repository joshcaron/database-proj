<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="modify.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
    <?php include_once "modify.php"; ?>
</head>
<body>
    <div class="row-fluid" id="main_container">
        <div class="span12">
        </div>
        <div class="row-fluid">
            <div class="span2"></div>
            <div class="span8" id="inner_container">
                <div id="results">
                    <h1 id="title">Delete Things</h1>
                    <?php 
                        $type = $_POST["type"];
                        if ($type == "user") {
                            $uname = $_POST["from"];
                            $uid = get_user_id($uname);
                            $groups = $_POST["group"];
                            foreach ($groups as $group) {
                                $gname = get_group_name($group);
                                delete_user_from_group($uid, $group);
                                echo "Removed " . $uname . " from " . $gname . "<br />";
                            }
                        }

                        if ($type == "group") {
                            $gname = $_POST["from"];
                            $gid = get_group_id($gname);
                            $users = $_POST["user"];
                            if ($users) {
                                foreach($users as $user) {
                                    $uname = get_user_name($user);
                                    delete_user_from_group($user, $gid);
                                    echo "Removed " . $uname . " from " . $gname . "<br />";
                                }
                            }
                            $groups = $_POST["group"];
                            if ($groups) {
                                foreach($groups as $group) {
                                    $group_name = get_group_name($group);
                                    delete_group_from_group($group, $gid);
                                    echo "Removed " . $group_name . " from " . $gname . "<br />";

                                }
                            }
                        }
                    ?>
                    <a href="..">Back</a>
                </div>
            </div>
        <div class="span2"></div>
        </div>
    </div>
</body>
</html>