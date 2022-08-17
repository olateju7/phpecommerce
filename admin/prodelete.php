<?php

include_once'connectdb.php';

if($_SESSION['useremail']==""){
    
    
    header('location:login.php');
}


$id=$_POST['pidd'];


$sql="delete from products where id=$id";

$delete=$pdo->prepare($sql);


if($delete->execute()){
    
    
}else{
    
  echo'Error in Deleting';  
}






?>