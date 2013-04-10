<html>
<head>
    <script type="text/javascript" src="jquery.js"></script>
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
                <div class="container" id="buttons">
                    <a href="create" class="btn btn-large btn-block btn-primary">Create</a>
                    <a href="modify" class="btn btn-large btn-block btn-danger">Modify</a>
                    <a href="query" class="btn btn-large btn-block btn-success">Query</a>
                </div>
            </div>
            <div class="span2">
             <?php 
                $url=parse_url(getenv("CLEARDB_DATABASE_URL"));

                $server = $url["host"];
                $username = $url["user"];
                $password = $url["pass"];
                $db = substr($url["path"],1);

                mysql_connect($server, $username, $password);
                        
                
                mysql_select_db($db);
            ?> 
            </div>
        </div>
    </div>

</body>
</html>