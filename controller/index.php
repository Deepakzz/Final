<?php
require('db_connection.php');
require('db.php');
$action = filter_input(INPUT_POST, "action");
if($action == NULL)
{
  $action = "show_login_page";
}
if($action == "show_login_page")
{
  include('login.php');
}else if($action == 'test_user')
{
  $username = $_POST['email'];
  $password = $_POST['password'];
  $suc = isUserValid($username,$password);
  if($suc == true)
  {
    $result = getTodoItems($_COOKIE['my_id']);
    $result2 = completedItems($_COOKIE['my_id']);
    include('list.php');
  }else{
    header("Location: badInfo.php");
  }
}else if ($action == 'register')
{
 // echo " we want to create a new account";
   $fname = filter_input(INPUT_POST, 'firstname');
   $lname = filter_input(INPUT_POST, 'lastname');
   $email = filter_input(INPUT_POST, 'mailid');
   $contact = filter_input(INPUT_POST, 'contact');
   $username = filter_input(INPUT_POST, 'user');
   $password = filter_input(INPUT_POST, 'password');
   $birth = filter_input(INPUT_POST, 'dob');
   $gender = filter_input(INPUT_POST, 'gender');
   $exit = registerUser($fname,$lname,$contact,$email,$username,$password,$birth,$gender);
   if($exit == true)
  {
     
       header("Location: login.php");
     }else {
     header("Location: index.php");
 } 
}
else if ($action == 'add')
{
 $user_id = filter_input(INPUT_POST, 'userid',FILTER_VALIDATE_INT);
  $description = filter_input(INPUT_POST, 'description');
 $add = addTodoItem($user_id,$description);
 if($add == true)
 {
$result = getToDoItems($_COOKIE['my_id']);
$result2 = completedItems($_COOKIE['my_id']);
include('list.php');
}
}

else if ($action == 'addtask')
{
$user_id = filter_input(INPUT_POST, 'userid',FILTER_VALIDATE_INT);
$task = filter_input(INPUT_POST, 'task');
$description = filter_input(INPUT_POST, 'description');
$date = filter_input(INPUT_POST, 'datetodo');
$time = filter_input(INPUT_POST, 'timetodo');
$status = "incomplete";
$addtask = addTodoItems($user_id,$description,$task,$date,$time,$status);
          if($addtask == true){
	  $result = getToDoItems($_COOKIE['my_id']);
          $result2 = completedItems($_COOKIE['my_id']);
	  include('list.php');
	  }
	  }


?>
