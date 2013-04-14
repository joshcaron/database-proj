<html>
<head>
    <script type="text/javascript" src="../jquery.js"></script>
    <script type="text/javascript" src="query.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
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
                <div id="query_form">
                <form action="results.php" method="post">
                    <!-- Options to Modify -->
                    <div class="control-group">
                        <div class="control-container">
                            <label class="control-label" for="modify_what">Type</label>
                            <div class="controls">
                                <select name="modify_what" id="what">
                                    <option value="user">User</option>
                                    <option value="group">Group</option>
                                    <option value="resource">Resource</option>
                                </select> 
                            </div>
                        </div>
                    </div>

                    <!-- User Modify Options -->
                    <div id="user_options">
                        <div class="control-group">
                            <div class="control-container">
                                <label class="control-label" for="user_name">Name</label>
                                <div class="controls">
                                    <select name="user">
                                        <?php get_all_user_names(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Group Modify Options -->
                    <div id="group_options" style="display:none;">
                        <div class="control-group">
                            <div class="control-container">
                                <label class="control-label" for="group_name">Name</label>
                                <div class="controls">
                                    <select name="group">
                                        <?php get_all_group_names(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Resource Modify Options -->
                    <div id="resource_options" style="display:none;">
                        <div class="control-group">
                            <div class="control-container">
                                <label class="control-label" for="resource">Name</label>
                                <div class="controls">
                                    <select name="resource">
                                        <?php get_all_resource_names(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
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