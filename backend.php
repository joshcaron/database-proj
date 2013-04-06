<?
/*
 * to use any function in this module first call connect()
 * at the end of a page call disconnect()
 */

// get db connection
function connect() {
  $conn = mysql_connect("localhost","root","root") or die ("dbconnect failed");
  mysql_select_db("db_final") or die ("dbconnect failed");
  return $conn;
}

// unget db connection
function disconnect($link) {
  mysql_close($link);
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
      $news = mysql_fetch_array(mysql_query("SELECT contained_id FROM group_group_mapping WHERE container_id = $id"));
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
  $groups_id = mysql_query("SELECT group_id FROM user_group_mapping WHERE id = $id");
  return get_groups_groups(mysql_fetch_array($groups_id));
}

// String -> Int
function get_user_id($user) {
  return mysql_fetch_array(mysql_query("SELECT id FROM users WHERE name = $user"))[0];
}

// String -> Int
function get_group_id($group){
  return mysql_fetch_array(mysql_query("SELECT id FROM groups WHERE name = $group"))[0];
}
