<?php

$db_name= "allaia";
$db_user= "root";
$db_password ="";
try{
    
	$pdo = new PDO('mysql:host=localhost;dbname='.$db_name.'',''.$db_user.'',''.$db_password.'');
  //echo'Connection Successfull'; 
	  
  }catch(PDOException $f){
	  
	  echo $f->getmessage();
	  
  }

 

$db['db_host'] = 'localhost';
        $db['db_user'] = $db_user;
        $db['db_pass'] = $db_password;
        $db['db_name'] = $db_name;

      foreach($db as $key=>$value){
          define(strtoupper($key),$value);
      }
      global $connection;
      $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
      if(!$connection){
          die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
      }

      try{
          $db = new PDO('mysql:dbhost=localhost;dbname='.$db_name.';charset=utf8',''.$db_user.'',''.$db_password.'');

      }
      catch(Exception $e){

          die('Cannot Establish A Secure Connection To The Host Server At The Moment!');
      }


?>