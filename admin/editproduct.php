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

$id_db=$row['id'];

$proname_db = $row['name'];
    
$category_db= $row['category'];  // $row[''];  
    
$price_db =$row['price'];
$brand_db =$row['brand'];
$qty_db =$row['stock'];
$description_db =  $row['description'];
$image_db=$row['image'];


if(isset($_POST['btnupdate'])){
    
	$proname = $_POST['proname'];
    
	$category= $_POST['procat'];  // $_POST[''];  
		
	$price =$_POST['price'];
	$brand =$_POST['probrand'];
	$qty =$_POST['qty'];
	$description =  $_POST['prodesc']; 
    
              $update=$pdo->prepare("update products set name=:name , category=:category , price=:price , brand=:brand , description=:description  , stock=:stock where id = $id");
              
              $update->bindParam(':name',$proname); 
				$update->bindParam(':category',$category);
				$update->bindParam(':price',$price);
				$update->bindParam(':brand',$brand);
				$update->bindParam(':description',$description);
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

			if(isset($_POST['updimage'])){
				$f_name= $_FILES['proimage']['name'];
    
if(!empty($f_name)){
      
  $f_tmp = $_FILES['proimage']['tmp_name'];

    
  $f_size =  $_FILES['proimage']['size'];
    
  $f_extension = explode('.',$f_name);
  $f_extension= strtolower(end($f_extension));
    
  $f_newfile =  uniqid().'.'. $f_extension;   
  
  $store = "../productimages/".$f_newfile;
    
    
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
           
           $f_newfile;
            if(!isset($error)){
     
              $update=$pdo->prepare("update products set image=:image where id = $id");
              
              
              $update->bindParam(':image',$f_newfile);
     
     
     
              if($update->execute()){
                  
                  echo'<script type="text/javascript">
              jQuery(function validation(){


              swal({
                title: "Update blog Successfull!",
                text: "Product Image Updated",
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
                text: "Update Fail",
                icon: "error",
                button: "Ok",
              });


              });

              </script>';  
                  
              }     
            }   
        } 
    }       
  }else{
    
  
    
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
                <input type="text" class="form-control" name="proname" placeholder="Enter Name *" value="<?php echo $proname_db ?>" required>
              </div>                                
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="procat" required>
                  <option value="" disabled>Select Category</option>
                  <option selected><?php echo $category_db ?></option>
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
              </div>
			  <div class="form-group">
                <label>Brand/Manufacturer</label>
                <select class="form-control" name="probrand" required>
                  <option value="" disabled>Select Brand</option>
                  <option selected><?php echo $brand_db ?></option>
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
            <div class="col-md-6">                    
              <div class="form-group">
                <label >Product Description</label>
                <textarea class="form-control summernote" name="prodesc" placeholder="Enter..."  rows="4" required><?php echo $description_db ?></textarea>
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
	<div class="modal fade" id="proimage">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Edit Image</h4>
				</div>
				<form action="" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label >Product image</label>
							<input type="file" class="input-group dropify" id="dropify-event" data-default-file="../productimages/<?php echo $image_db?>" name="proimage"  required>
						</div>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" name="updimage" class="btn btn-warning">Save changes</button>
					</div>
				</form>
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