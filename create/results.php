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
                <div id="results">
                    <?php 
                        $type = created_what();
                        echo "<p>You created a " . $type . "!</p>";
                        create_table();
                    ?>
                    <p><a href="..">Back</a></p>
                </div>
            </div>
        <div class="span2"></div>
        </div>
    </div>
</body>
</html>