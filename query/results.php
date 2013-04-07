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
                    echo "<p>" . urldecode($_POST["user"]);
                    echo "<p>" . urldecode($_POST["resource"]);
                    echo "<p>" . urldecode($_POST["action"]);
                ?>
            </div>
        <div class="span2"></div>
        </div>
    </div>
</body>
</html>