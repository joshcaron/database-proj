<?
/*
 * to use any function in this module first call connect()
 * at the end of a page call disconnect()
 */

$LINK = NULL;

// get db connection
function connect() {
  global $LINK;
  $conn = mysql_connect("localhost","root","root") or die ("dbconnect failed");
  mysql_select_db("db_final") or die ("dbconnect failed");
  $LINK = $conn;
  return $conn;
}

// unget db connection
function disconnect() {
  mysql_close($LINK);
}

/*
 * Creating
 */

// String [[Arrayof Int] = array()] ->
function create_user($name, $groups = array()){
  mysql_query("INSERT INTO users(name) VALUES (\"$name\");",$LINK);
  $id = get_user_id($name);
  add_user_to_groups($id,$groups);
}

// String [[Arrayof int] = array()] [[Arrayof int] = array()] ->
function create_group($name,$users = array(), $groups = array()) {
  mysql_query("INSERT INTO groups(name)  VALUES ($name)",$LINK);
  $id = get_group_id($name);
  foreach($users as $user) {
    add_user_to_groups($user,array($id));
  }
  foreach($group as $group) {
    add_group_to_groups($group,array($id));
  }
}

// String ->
function create_resource($uri) {
  mysql_query("INSERT INTO resources VALUES ($uri)",$LINK);
}

// Int String String [Boolean = true] ->
function create_permission_set($group,$uri,$action,$access = true) {}

/*
 * Modifying
 */

// Int [Arrayof Int] ->
function add_user_to_groups($id,$groups) {
  foreach($groups as $group) {
    mysql_query("INSERT INTO user_group_mapping (user,group) VALUES ($id,$group)",$LINK);
  }
}

// Int [Arrayof Int] ->
function add_group_to_groups($id,$groups) {
  foreach($groups as $group) {
    mysql_query("INSERT INTO group_group_mapping (contained,container) VALUES ($group,$id)",$LINK);
  }
}
/*
 * querying
 */

// Int String String -> Boolean
function does_user_has_access($uid,$uri,$action){
  $user_groups = get_user_groups($uid);
  $permission_set_groups = get_permission_set_groups(get_permission_sets($uri,$action));
  foreach($user_groups as $id) {
    if(in_array($id,$permission_set_groups)) {
      return true;
    }
  }
  return false;
}

// [Array Ints] -> [Arrayof Ints]
function get_permission_set_groups($ids){
  return mysql_fetch_array(mysql_query("SELECT group_id FROM permission_sets WHERE id in (\"" . implode("\", \"",$ids) . "\")",$LINK));
}

// String String -> [Arrayof Ints]
function get_permission_sets($uri,$action){
  return mysql_fetch_array(mysql_query("SELECT group_id FROM permission_sets WHERE resource_uri = \"$url\" AND action_name = \"$action\"",$LINK));
}

// Int -> Arrayof Int
function get_group_groups($id) {
  return get_groups_groups(array($id));
}

// [Arrayof Int] -> [Arrayof Int]
function get_groups_groups($ids) {
  $todos = $ids;
  $acc = array();
  $results = $todos;
  while(!empty($todos)) {
    foreach($todos as $id) {
      $news = mysql_fetch_array(mysql_query("SELECT contained_id FROM group_group_mapping WHERE container_id = $id",$LINK));
      foreach($news as $new) {
        if(!in_array($new,$results)){
          array_push($results,$new);
          array_push($acc,$new);
        }
      }
      $todos = $acc;
      $acc = array();
    }
  }
  return $results;
}

// Int -> [Arrayof Int]
function get_user_groups($id) {
  $groups_id = mysql_query("SELECT group_id FROM user_group_mapping WHERE id = $id",$LINK);
  return get_groups_groups(mysql_fetch_array($groups_id));
}

// String -> Int
function get_user_id($user) {
  $res =  mysql_fetch_array(mysql_query("SELECT id FROM users WHERE name = $user",$LINK));
  return $res[0];
}

// String -> Int
function get_group_id($group){
  $res =  mysql_fetch_array(mysql_query("SELECT id FROM groups WHERE name = $group",$LINK));
  return $res[0];
}

// -> Arrayof Strings
function get_all_users() {
  return mysql_fetch_array(mysql_query("SELECT name FROM users",$LINK));
}
function get_all_groups(){
  return mysql_fetch_array(mysql_query("SELECT name FROM groups",$LINK));
}
function get_all_resources(){
  return mysql_fetch_array(mysql_query("SELECT uri FROM resources",$LINK));
}
function get_all_actions(){
  return mysql_fetch_array(mysql_query("SELECT name FROM actions",$LINK));
}
