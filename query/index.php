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
                <div id="query_form">
                    <form action="results.php" method="post">
                        <div class="control-group">
                            <div class="control-container">
                                <label class="control-label" for="user">User</label>
                                <div class="controls">
                                    <select name="user">
                                        <?php echo get_all_usernames(); ?>
                                    </select> 
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="control-container">
                                <label class="control-label" for="resource">Resource</label>
                                <div class="controls">
                                    <select name="resource">
                                        <?php echo get_all_resource_uri(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">  
                            <div class="control-container">
                                <label class="control-label" for="action">Action</label>
                                <div class="controls">
                                    <select name="action">
                                        <?php echo get_all_action_names(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">  
                            <div class="control-container">
                                <div class="controls">
                                    <input type="submit" value="Submit" class="btn ">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <div class="span2"></div>
        </div>
    </div>
</body>
</html>