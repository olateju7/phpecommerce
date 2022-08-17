<?php


include_once'connectdb.php';

session_start();

if($_SESSION['useremail']=="" OR $_SESSION['role']=="User"){
    
    
    header('location:login.php');
}


include_once'header.php';





if(isset($_POST['btnsave'])){
    
$brand = $_POST['txtcategory'];
    
    
if(empty($brand)){
    
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
    
$insert=$pdo->prepare("insert into product_brand(brand) values(:brand)");
    
$insert->bindParam(':brand',$brand); 
    
if($insert->execute()){
   
    echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Added!",
  text: "Your Brand is Added!",
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
    
   $brand = $_POST['txtcategory'];
    $id = $_POST['txtid'];
    
if(empty($brand)){
   
$errorupdate='<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Error",
  text: "Feild is empty : please enter brand!",
  icon: "error",
  button: "Ok",
});


});

</script>';    
    
    
  echo $errorupdate; 
    
} 
    
if(!isset($errorupdate)){ 

$update=$pdo->prepare("update product_brand set brand=:brand where id=".$id);
    
$update->bindParam(':brand',$brand); 
    
if($update->execute()){
   echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Updated!",
  text: "Your Brand is Updated!",
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
  text: "Your Brand is  Not Updated!",
  icon: "error",
  button: "Ok",
});


});

</script>';
    
    
    
    
}    




}  
    
    
    
    
    
    
    
    
    
} // btn update code end here



if(isset($_POST['btndelete'])){
    
 $delete=$pdo->prepare("delete from product_brand where id=".$_POST['btndelete']); 
    
  
    
    
   if($delete->execute()){
       
       echo '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Deleted!",
  text: "Your Brand is Deleted!",
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
  text: "Your Brand is Not Deleted!",
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
            BRANDS/MANUFACTURERS
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
                <h3 class="box-title">Product Brand Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->




            <div class="box-body">
                <form role="form" action="" method="post">
                    <?php
        if(isset($_POST['btnedit'])){
            
    $select=$pdo->prepare("select * from product_brand where id=".$_POST['btnedit']); 
    $select->execute();
    if($select){
    $row =$select->fetch(PDO::FETCH_OBJ);    
         echo' <div class="col-md-4">
                                 
                   <div class="form-group">
                  <label >Product Brand</label>
<input type="hidden" class="form-control" value="'.$row->id.'" name="txtid"  placeholder="Enter Brand" >
                  
                  
<input type="text" class="form-control" value="'.$row->brand.'" name="txtcategory"  placeholder="Enter Brand" >
                </div>
                
    <button type="submit" class="btn btn-info" name="btnupdate">Update</button>
                   
              </div>'; 
        
        
        
        
        
    }        
            
          
            
            
            
            
            
        }else{
            
        echo' <div class="col-md-4">
                                 
                   <div class="form-group">
                  <label >Product Brand</label>
                  <input type="text" class="form-control" name="txtcategory" placeholder="Enter Brand" >
                </div>
                
                 <button type="submit" class="btn btn-warning" name="btnsave">Save</button>
                   
              </div>';    
            
            
        }          
                  
                  
         ?>






                    <div class="col-md-8">

                        <table id="tablecategory" class="table table-striped">
                        <thead>
                            <tr>
                             <th>BRANDS</th>
                             <th>EDIT</th>
                             <th>DELETE</th>
                            </tr>

                            </thead>
               <tbody>
    <?php
    $select=$pdo->prepare("select * from product_brand order by brand desc");
    $select->execute();
  while($row=$select->fetch(PDO::FETCH_OBJ)){
    
echo' <tr>
    <td>'.$row->brand.'</td>
    
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