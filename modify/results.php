<html>
<head>
    <script type="text/javascript" src="../jquery.js"></script>
    <script type="text/javascript" src="query.js"></script>
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
                <h1 id="title">Modify Things</h1>
                <?php 
                    $type = modify_what();
                    echo "<p>Modifying a " . $type . "!</p>";
                    create_table();
                ?>
                <a href="..">Back</a>
            </div>
        <div class="span2"></div>
        </div>
    </div>


    <div id="dialog-confirm"><p>Are you sure you want to delete this? It cannot be undone.</p></div>
</body>
</html>