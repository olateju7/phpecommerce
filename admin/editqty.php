<?php
include_once'connectdb.php';

session_start();

if($_SESSION['useremail']==""){
    
    
    header('location:login.php');
}




include_once'header.php';    

$id=$_GET['id'];

$select=$pdo->prepare("select * from products where id=$id");
$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db=$row['productid'];

$proname_db = $row['name'];
    
$category_db= $row['categoryid'];  // $row[''];  
    
$price_db =$row['price'];
$brand_db =$row['brand'];
$qty_db =$row['stock'];
$description_db =  $row['description'];
$image_db=$row['image'];


if(isset($_POST['btnupdate'])){
		
	$price =$_POST['price'];
	$qty =$_POST['qty'];
    
              $update=$pdo->prepare("update products set  price=:price , stock=:stock where id = $id");
              
				$update->bindParam(':price',$price);
				$update->bindParam(':stock',$qty);
     
     
     
              if($update->execute()){
                  
                  echo'<script type="text/javascript">
              jQuery(function validation(){


              swal({
                title: "Update Product Successfull!",
                text: "Product Updated",
                icon: "success",
                button: "Ok",
              });


              });
			  window.location.href = "updateqty.php";

              </script>';
                  
              }else{
                  
                echo'<script type="text/javascript">
              jQuery(function validation(){


              swal({
                title: "ERROR!",
                text: "Update product Fail",
                icon: "error",
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
      Edit Product
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
        <!-- /.box-header -->
        <!-- form start -->
        <form action="" method="post"  name="formproduct" enctype="multipart/form-data" >
          <div class="box-body">    
            <div class="col-md-6">                
              <div class="form-group">
                <label >Product Name</label>
                <input type="text" class="form-control" name="proname" placeholder="Enter Name *" value="<?php echo $proname_db ?>" readonly>
              </div>                                                                 
              <div class="form-group">
                <label >QTY</label>
                <input type="number" class="form-control" name="qty" placeholder="Quantity *" value="<?php echo $qty_db ?>" required>
              </div>
			  <div class="form-group">
                <label >PRICE</label>
                <input type="text" class="form-control" name="price" placeholder="Price *" value="<?php echo $price_db ?>" required>
              </div>   
            </div>     
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-info" name="btnupdate">Update Product</button> 
			<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#proimage">
                Edit Image
              </button>           
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