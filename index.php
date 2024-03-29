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
                <h1 id="title">Database Design Project</h1>

		<?php 
                include_once "backend.php";

               $connection =  connect();

                if (!$connection) {
                    echo "<p style=\"text-align:center;\" class=\"text-error\">Could not connect to database. Proceed at own risk.</p>";
                }

                ?>
   		<div class="container" id="buttons">
                    <a href="create" class="btn btn-large btn-block btn-primary">Create</a>
                    <a href="modify" class="btn btn-large btn-block btn-danger">Modify</a>
                    <a href="query" class="btn btn-large btn-block btn-success">Query</a>
                    <a href="init.php">Init data</a>
                    <a href="clear.php">Clear data</a>
                </div>
            </div>
            <div class="span2">
            </div>
        </div>
    </div>

</body>

</html>