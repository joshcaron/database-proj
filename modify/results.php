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
                    <h1 id="title">Modify Things</h1>
                    <form action="delete.php" method="post">
                        <?php 
                            create_table();
                        ?>
                    </form>
                    <form action="remove.php" method="post">
                        <?php
                            $type = modify_what();
                            if ($type == "user") {
                                $name = $_POST["user"];
                                create_input($type, $name);
                            }
                            if ($type == "group") {
                                $name == $_POST["group"];
                                create_input($type, $name);
                            }
                            if ($type == "resource") {
                                $name = $_POST["resource"];
                                create_input($type, $name);
                            }

                            function create_input($type, $name) {
                                $type = urlencode($type);
                                $name = urlencode($name);
                                echo "<input type=\"hidden\" name=\"type\" value=\"$type\">";
                                echo "<input type=\"hidden\" name=\"name\" value=\"$name\">";
                                echo "<input type=\"submit\" value=\"Remove $type\" class=\"btn\">";
                            }
                        ?>
                    </form>


                    <a href="..">Back</a>
                </div>
            </div>
        <div class="span2"></div>
        </div>
    </div>
</body>
</html>