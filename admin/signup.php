<?php
include_once'connectdb.php';

session_start();

if($_SESSION['useremail']==""){
    
    
    header('location:login.php');
}


include_once'header.php';


if(isset($_POST['btndelete'])){
    
  $delete=$pdo->prepare("delete from user_info where id=".$_POST['btndelete']); 
     
   
     
     
    if($delete->execute()){
        
        echo '<script type="text/javascript">
 jQuery(function validation(){
 
 
 swal({
   title: "Deleted!",
   text: "Account is Deleted!",
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
   text: "Account is Not Deleted!",
   icon: "success",
   button: "Ok",
 });
 
 
 });
 
 </script>';
        
        
        
        
        
    } 
     
     
 }







if(isset($_POST['btnsave'])){  

$username=$_POST['txtname'];
$useremail=$_POST['txtemail'];
$password=$_POST['txtpassword'];
$userrole=$_POST['txtselect_option'];


//echo $username ."-".$useremail."-".$password."-".$userrole;
    
if(isset($_POST['txtname'])){ 
    
$select=$pdo->prepare("select username from user_info where useremail='$useremail'"); 
$select->execute();
    
if($select->rowCount() > 0){
    
echo'<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Warning!",
  text: "Email already exist",
  icon: "warning",
  button: "Ok",
});


});

</script>'; 
    
}else{
    
    
      $insert=$pdo->prepare("insert into user_info(username,useremail,password,role) values(:name,:email,:pass,:role)"); 
    
    $insert->bindParam(':name',$username);
    $insert->bindParam(':email',$useremail);
    $insert->bindParam(':pass',$password);
    $insert->bindParam(':role',$userrole);
    
    
if( $insert->execute()){
        
echo'<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Good Job!",
  text: "Your Registration is Successfull",
  icon: "success",
  button: "Ok",
});


});

</script>';
   
        
}else{
        
echo'<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Error!",
  text: "Registration Fail !!!",
  icon: "error",
  button: "Ok",
});


});

</script>';  
        
}     
    
}    
    
}// end if txtemail
    

      
       
}
     
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Registration
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
               <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registration Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
              <div class="box-body">
              
              
              
              <div class="col-md-4">
                                 
                                  <div class="form-group">
                  <label >Name</label>
                  <input type="text" class="form-control" name="txtname" placeholder="Enter Name" required>
                </div>
                                 
                                 
                                  <div class="form-group">
                  <label >Email address</label>
                  <input type="email" class="form-control" name="txtemail" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label >Password</label>
                  <input type="password" class="form-control" name="txtpassword" placeholder="Password" required>
                </div>
               
 <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="txtselect_option" required>
                    <option value="" disabled selected>Select role</option>
                   <option>User</option>
                     <option>Admin</option>
                    
                  </select>
                </div>
                
                 <button type="submit" class="btn btn-info" name="btnsave">Save</button>
                 
                 
                
                  
                  
                  
              </div>
               <div class="col-md-8">
                   
        <table class="table table-striped">
        <thead>
        <tr>
        <th>#</th>
         <th>NAME</th>   
          <th>EMAIL</th>   
           <th>PASSWORD</th>   
            <th>ROLE</th>
            <th>DELETE</th>      
        </tr>    
            
        </thead> 
           
              
                 
        <tbody>
        
    <?php
    $select=$pdo->prepare("select * from user_info  order by id desc");
            
    $select->execute();
            
while($row=$select->fetch(PDO::FETCH_OBJ)  ){
    
    echo'
    <tr>
    <td>'.$row->id.'</td>
    <td>'.$row->username.'</td>
    <td>'.$row->useremail.'</td>
    <td>'.$row->password.'</td>
    <td>'.$row->role.'</td>
    <td>   
    <button type="submit" value="'.$row->id.'" class="btn btn-danger" name="btndelete">Delete</button>
    </td>
     </tr>
     ';
    
}          
?>        
                
 </tbody>               
</table>           
</div>
</div>
              <!-- /.box-body -->

              <div class="box-footer">
               
              </div>
            </form>
          </div>
       
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php

include_once'footer.php';

?>