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
else if ($action == 'add')
{


}
?>
