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
                $type = urldecode($_GET["what"]);

                if ($type == "user") {
                    echo "<p>You created a User!</p>";
                }

                if ($type == "group") {
                    echo "<p>You created a Group!</p>";
                }

                if ($type == "resource") {
                    echo "<p>You created a Resource!</p>";
                }

                if ($type == "permission") {
                    echo "<p>You created a Permission Set!</p>";
                }

                    echo "<p>" . urldecode($_GET["user"]) . "</p>";
                    echo "<p>" . urldecode($_GET["what"]) . "</p>";
                    var_dump($_GET["groups"]);
                    foreach ($_GET["groups"] as $group) {
                        echo "<p>" . urldecode($group);
                    }
                ?> 
            </div>
        <div class="span2"></div>
        </div>
    </div>
</body>
</html>