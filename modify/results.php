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
                <div id="results">
                    <h1 id="title">Modify Things</h1>
                    <?php 
                        create_table();
                    ?>
                    <a href="..">Back</a>
                </div>
            </div>
        <div class="span2"></div>
        </div>
    </div>
</body>
</html>