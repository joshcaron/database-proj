<?

include_once "backend.php";

connect();
echo "Connected!";
create_group("Group A");
create_group("Group B");
echo "Created groups!";
create_user("Josh");
create_user("Jeff");
create_user("Paul");
echo "Created Users!";