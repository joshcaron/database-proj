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
                <h1 id="title">Initialization</h1>
                <div id="results">
                    <?php

                    include_once "backend.php";

                    connect();

                    echo "<p>Connected!</p>";

                    create_group("Group A");
                    create_group("Group B");
                    echo "<p>Created groups!</p>";

                    create_user("Josh");
                    create_user("Jeff");
                    create_user("Paul");
                    echo "<p>Created Users!</p>";

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

