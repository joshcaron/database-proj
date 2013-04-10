<?

include_once "backend.php";

connect();
$group = array('');
create_user("Josh", $group);
create_user("Jeff");
create_user("Paul");
echo "Created Users!";


echo "Connected!";
create_group("Group A");
create_group("Group B");
echo "Created groups!";