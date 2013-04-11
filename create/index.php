<html>
<head>
    <script type="text/javascript" src="../jquery.js"></script>
    <script type="text/javascript" src="create.js"></script>
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
                <div id="query_form">
                    <form action="results.php" method="get">

                        <!-- Options to Create -->
                        <div class="control-group">
                            <div class="control-container">
                                <label class="control-label" for="create_what">Type</label>
                                <div class="controls">
                                    <select name="create_what" id="what">
                                        <option value="user">User</option>
                                        <option value="group">Group</option>
                                        <option value="resource">Resource</option>
                                        <option value="permission">Permission Set</option>
                                    </select> 
                                </div>
                            </div>
                        </div>

                        <!-- User Creation Options -->
                        <div id="user_options">
                            <p>Create a user with the given name. Select groups that the user belongs to.</p>
                            <div class="control-group">
                                <div class="control-container">
                                    <label class="control-label" for="user_name">Name</label>
                                    <div class="controls">
                                        <input type="text" name="user_name" placeholder="Enter user name..." style="width:220px">
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-container">
                                    <label class="control-label" for="user_groups[]">Groups</label>
                                    <div class="controls">
                                        <select name="user_groups[]" multiple="multiple">
                                            <?php echo get_all_group_names(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Group Creation Options -->
                        <div id="group_options" style="display:none;">
                            <p>Create a group with the given name. Select users and groups that this group contains.</p>
                            <!-- Name of group -->
                            <div class="control-group">
                                <div class="control-container">
                                    <label class="control-label" for="group_name">Name</label>
                                    <div class="controls">
                                        <input name="group_name" type="text" placeholder="Enter group name..." style="width:220px;">
                                    </div>
                                </div>
                            </div>

                            <!-- Users contained in this group -->
                            <div class="control-group">
                                <div class="control-container">
                                    <label class="control-label" for="group_users[]">Users</label>
                                    <div class="controls">
                                        <select name="group_users[]" multiple="multiple">
                                            <?php echo get_all_user_names(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Groups contained in this group -->
                            <div class="control-group">
                                <div class="control-container">
                                    <label class="control-label" for="group_groups[]">Groups</label>
                                    <div class="controls">
                                        <select name="group_groups[]" multiple="multiple">
                                            <?php echo get_all_group_names(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Resource Creation Options -->
                        <div id="resource_options" style="display:none;">
                            <div class="control-group">
                                <div class="control-container">
                                    <label class="control-label" for="resource_name">Name</label>
                                    <div class="controls">
                                        <input name="resource_name" type="text" placeholder="Enter resource name..." style="width:220px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Permission Set Options -->
                        <div id="permission_options" style="display:none;">
                            <!-- Select Group to give permission -->
                            <div class="control-group">
                                <div class="control-container">
                                    <label class="control-label" for="group_select">Group</label>
                                    <div class="controls">
                                        <select name="group_select">
                                            <?php echo get_all_group_names(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Select Action type -->
                            <div class="control-group">
                                <div class="control-container">
                                    <label class="control-label" for="action_type">Permission to Give</label>
                                    <div class="controls">
                                        <select name="action_type">
                                            <?php echo get_all_action_names(); ?>
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