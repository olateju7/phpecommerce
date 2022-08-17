<?php


include_once'connectdb.php';

session_start();

if($_SESSION['useremail']==""){
    
    
    header('location:login.php');
}


include_once'header.php';





if(isset($_POST['btnsave'])){
    
$email = $_POST['txtemail'];
    
    
if(empty($email)){
    
 $error='<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Feild is Empty!",
  text: "Please Fill Feild!!",
  icon: "error",
  button: "Ok",
});


});

</script>';   
    
  echo $error;  
    
    
    
}
    
    
if(!isset($error)){
    
$insert=$pdo->prepare("insert into newsletter(email) values(:email)");
    
$insert->bindParam(':email',$email); 
    
if($insert->execute()){
   
    echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Added!",
  text: "Subscriber Email was Added!",
  icon: "success",
  button: "Ok",
});


});

</script>';
    
    
    
    
}else{
 echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Error",
  text: "Query Fail!",
  icon: "error",
  button: "Ok",
});


});

</script>';
    
}    
}        
}// btnadd end here

if(isset($_POST['btnupdate'])){
    
   $email = $_POST['txtemail'];
    $id = $_POST['txtid'];
    
if(empty($email)){
   
$errorupdate='<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Error",
  text: "Feild is empty : please enter Email!",
  icon: "error",
  button: "Ok",
});


});

</script>';    
    
    
  echo $errorupdate; 
    
} 
    
if(!isset($errorupdate)){ 

$update=$pdo->prepare("update newsletter set email=:email where id=".$id);
    
$update->bindParam(':email',$email); 
    
if($update->execute()){
   echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Updated!",
  text: "Your Email was Updated!",
  icon: "success",
  button: "Ok",
});


});

</script>';
       
    
    
}else{
    
      echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Error!",
  text: "Your Email is  Not Updated!",
  icon: "error",
  button: "Ok",
});


});

</script>';
    
    
    
    
}    




}  
    
    
    
    
    
    
    
    
    
} // btn update code end here



if(isset($_POST['btndelete'])){
    
 $delete=$pdo->prepare("delete from subscribers where id=".$_POST['btndelete']); 
    
  
    
    
   if($delete->execute()){
       
       echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Deleted!",
  text: "Your Email is Deleted!",
  icon: "success",
  button: "Ok",
});


});

</script>'; 
       
   }else{
       echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Error!",
  text: "Your Email is Not Deleted!",
  icon: "success",
  button: "Ok",
});


});

</script>';
       
       
       
       
       
   } 
    
    
}










?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Subscribers
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
        | Your Page Content Here |
        -------------------------->

        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Subscribers Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->




            <div class="box-body">
                <form role="form" action="" method="post">
                    <?php
        if(isset($_POST['btnedit'])){
            
    $select=$pdo->prepare("select * from newsletter where id=".$_POST['btnedit']); 
    $select->execute();
    if($select){
    $row =$select->fetch(PDO::FETCH_OBJ);    
         echo' <div class="col-md-4">
                                 
                   <div class="form-group">
                  <label >Update Subscriber Email</label>
<input type="hidden" class="form-control" value="'.$row->id.'" name="txtid"  placeholder="Enter Email" >
                  
                  
<input type="email" class="form-control" value="'.$row->email.'" name="txtemail"  placeholder="Enter Email" >
                </div>
                
    <button type="submit" class="btn btn-info" name="btnupdate">Update</button>
                   
              </div>'; 
        
        
        
        
        
    }        
            
          
            
            
            
            
            
        }else{
            
        echo' <div class="col-md-4">
                                 
                   <div class="form-group">
                  <label >Subscriber Email</label>
                  <input type="email" class="form-control" name="txtemail" placeholder="Enter Email" >
                </div>
                
                 <button type="submit" class="btn btn-warning" name="btnsave">Save</button>
                   
              </div>';    
            
            
        }          
                  
                  
         ?>






                    <div class="col-md-8">

                        <table id="tablecategory" class="table table-striped">
                        <thead>
                            <tr>
                             <th>#</th>
                             <th>EMAIL</th>
                             <th>STATUS</th>
                             <th>EDIT</th>
                             <th>DELETE</th>
                            </tr>

                            </thead>
               <tbody>
    <?php
    $select=$pdo->prepare("select * from newsletter order by id desc");
    $select->execute();
  while($row=$select->fetch(PDO::FETCH_OBJ)){
    
echo' <tr>
    <td>'.$row->id.'</td>
    <td>'.$row->email.'</td>
    <td>'.$row->status.'</td>
    
    <td>
      <button type="submit" value='.$row->id.' class="btn btn-success" name="btnedit">Edit</button>
    </td>
    
    <td>
        <button type="submit" value="'.$row->id.'" class="btn btn-danger" name="btndelete">Delete</button>
    </td>
   
     </tr>';    
    
}            
    
   ?>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">

            </div>

        </div>





    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>
  $(document).ready( function () {
    $('#tablecategory').DataTable();
} );  
    
    
</script>



<?php

include_once'footer.php';

?>