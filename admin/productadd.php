<?php
include_once'connectdb.php';

session_start();


if($_SESSION['useremail']==""){
    
    
    header('location:login.php');
}


if($_SESSION['role']=="Admin"){
  include_once 'header.php';
}else{
  include_once 'headuser.php';
}


if(isset($_POST['btnaddproduct'])){
    
$proname = $_POST['proname'];
    
$category= $_POST['procat'];  // $_POST[''];  
    
$price =$_POST['price'];
$brand =$_POST['probrand'];
$qty =$_POST['qty'];
   $code= 'A'.rand(100000,999999); 
$description =  $_POST['prodesc']; 
    
    
 $f_name= $_FILES['myfile']['name'];
    
    
    
$f_tmp = $_FILES['myfile']['tmp_name'];

    
 $f_size =  $_FILES['myfile']['size'];
    
$f_extension = explode('.',$f_name);
 $f_extension= strtolower(end($f_extension));
    
  $f_newfile =  uniqid().'.'. $f_extension;   
  
    $store = "../images/products/".$f_newfile;
    
    
if($f_extension=='jpg' || $f_extension=='jpeg' ||  $f_extension=='png' || $f_extension=='gif'){
 
    if($f_size>=3000000 ){
        
       
        
        $error= '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Error!",
  text: "Max file should be 3MB!",
  icon: "warning",
  button: "Ok",
});


});

</script>';
       
  echo $error;      
        
        
        
    }else{
      
       if(move_uploaded_file($f_tmp,$store)){
           
           $productimages=$f_newfile;
            if(!isset($error)){
     
$insert=$pdo->prepare("insert into products(name,category,price,brand,description,image,code,stock) values(:name,:category,:price,:brand,:description,:image,:code,:stock)"); 
     
     $insert->bindParam(':name',$proname); 
     $insert->bindParam(':category',$category);
     $insert->bindParam(':price',$price);
     $insert->bindParam(':brand',$brand);
     $insert->bindParam(':description',$description);
	 $insert->bindParam(':image',$productimages);
	 $insert->bindParam(':code',$code);
	 $insert->bindParam(':stock',$qty);
     
     
if($insert->execute()){
    
    echo'<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Add Product Successfull!",
  text: "Blog Added",
  icon: "success",
  button: "Ok",
});


});

</script>';
    
    
}else{
    
   echo'<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "ERROR!",
  text: "Add Product Fail",
  icon: "error",
  button: "Ok",
});


});

</script>';  
    
}     
     
     
     
     
     
 } 
           
           
           
           
           
       } 
        
        
        
    }   
    
    
    
}else
{
    
  
    
      $error= '<script type="text/javascript">
jQuery(function validation(){


swal({
  title: "Warning!",
  text: "only jpg ,jpeg, png and gif can be upload!",
  icon: "error",
  button: "Ok",
});


});

</script>';
       
  echo $error;      
        
    
    
    
    
    
}    
    
    
    
  
    
    
    
    
    
}


if(isset($_POST['submitaddcat'])){

  $categoryadd = $_POST['addcat'];

  $insert=$pdo->prepare("insert into product_category(category) VALUES(:categoryadd)");

  $insert->bindParam(':categoryadd',$categoryadd);

  if($insert->execute()){
    $message= "<p class='text-success text-center'>Category Added Successfully</p>";
  }

}

if(isset($_POST['submitaddbrand'])){

  $brandadd = $_POST['addbrand'];

  $insert=$pdo->prepare("insert into product_brand(brand) VALUES(:brandadd)");

  $insert->bindParam(':brandadd',$brandadd);

  if($insert->execute()){
    $message= "<p class='text-success text-center'>Brand Added Successfully</p>";
  }

}


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     Add Product
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <?php if(!empty($message)){ echo $message;} ?>
    <!-- Main content -->
    <section class="content container-fluid">
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
      <div class="box box-info">
        <!-- /.box-header -->
        <!-- form start -->
        <form action="" method="post"  name="formproduct" enctype="multipart/form-data" >
          <div class="box-body">    
            <div class="col-md-6">                
              <div class="form-group">
                <label >Product Name</label>
                <input type="text" class="form-control" name="proname" placeholder="Enter Name *" required>
              </div>                                
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="procat" required>
                  <option value="" disabled selected>Select Category</option>
                  <?php
                  $select = $pdo->prepare("select * from product_category order by id desc");          
                  $select->execute();
                  while($row=$select->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                  ?>    
                  <option><?php echo $row['category'];?></option>
                  <?php   
                    }                           
                  ?>                      
                </select>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#procat">
                Add Category
              </button>
              </div>
			  <div class="form-group">
                <label>Brand/Manufacturer</label>
                <select class="form-control" name="probrand" required>
                  <option value="" disabled selected>Select Brand</option>
                  <?php
                  $select = $pdo->prepare("select * from product_brand order by id desc");          
                  $select->execute();
                  while($row=$select->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                  ?>    
                  <option><?php echo $row['brand'];?></option>
                  <?php   
                    }                           
                  ?>                      
                </select>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#probrand">
                Add Brand
              </button>
              </div>                                 
              <div class="form-group">
                <label >QTY</label>
                <input type="number" class="form-control" name="qty" placeholder="Quantity *" required>
              </div>
			  <div class="form-group">
                <label >PRICE</label>
                <input type="number" class="form-control" name="price" placeholder="Price *" required>
              </div>
			  <div class="form-group">
                <label >Product Image</label>
                <input type="file" class="input-group dropify" id="dropify-event" name="myfile">
              </div>  
            </div> 
            <div class="col-md-6">                    
              <div class="form-group">
                <label >Product Description</label>
                <textarea class="form-control summernote" name="prodesc" placeholder="Enter..."  rows="4" required></textarea>
              </div>           
            </div>      
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-info" name="btnaddproduct">Add Product</button>            
          </div>
        </form>
      </div>
    </section>
    <div class="modal fade" id="procat">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add New Category</h4>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="form-group mt-3">
                  <input type="text" name="addcat" id="" placeholder="Enter New Category *" class="form-control" required>
              </div>
              <div class="form-group mt-3">
                  <input type="submit" name="submitaddcat" id="" class="form-control btn-warning" value="Submit">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="probrand">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add New Brand</h4>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="form-group mt-3">
                  <input type="text" name="addbrand" id="" placeholder="Enter New Brand *" class="form-control" required>
              </div>
              <div class="form-group mt-3">
                  <input type="submit" name="submitaddbrand" id="" class="form-control btn-warning" value="Submit">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php

include_once'footer.php';

?>