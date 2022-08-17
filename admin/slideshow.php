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
    
$slideshow_db = $row['slideshow'];

if(isset($_POST['btnupdate'])){
		
	$slideshow =$_POST['slideshow'];
    
              $update=$pdo->prepare("update products set  slideshow=:slideshow where id = $id");
              
				$update->bindParam(':slideshow',$slideshow);
     
     
     
              if($update->execute()){
                  
                  echo'<script type="text/javascript">
              jQuery(function validation(){


              swal({
                title: "Updated Successfull!",
                text: "Slideshow Updated",
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
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Slideshow
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
                <label >SLIDESHOW</label>
                <select class="form-control" name="slideshow" id="">
					<?php
					if($slideshow_db=="yes"){
						echo'
						<option value="yes" selected>Yes</option>
						<option value="no">No</option>';
					}else{
						echo'
						<option value="no" selected>No</option>
						<option value="yes">Yes</option>';
					}
					?>
				</select>
              </div>  
            </div>     
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-info" name="btnupdate">Update Slideshow</button>            
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