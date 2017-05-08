<?php
 $dsn = 'mysql:host=sql2.njit.edu;dbname=yz746';
 $username = 'yz746';
 $password = 'XpKmPKQQB';
 try{
   $db = new PDO($dsn,$username,$password);
 }catch (PDOException $e){
   $error_message = $e->getMessage();
   echo $error_message;
   exit();
 }
?>
