<html>
<head>
    <script type="text/javascript" src="../jquery.js"></script>
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
                    <h1 id="title">Remove</h1>
                    <?php 
                        $type = $_POST["type"];
                        $name = $_POST["name"];
                        if ($type == "user") {
                            $id = get_user_id();
                            $groups = get_user_groups($id);
                            foreach ($groups as $group) {
                                delete_user_from_group($id, $group);
                            }
                            delete_user($id);
                            echo "Deleted " . $name;
                        }

                        if ($type == "group") {

                        }

                        if ($type == "resource") {
                            delete_resource($name);
                            echo "Deleted " . $name;
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