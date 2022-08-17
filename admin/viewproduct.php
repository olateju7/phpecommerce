<?php

include_once'connectdb.php';

session_start();

if($_SESSION['useremail']==""){
    
    
    header('location:login.php');
}


include_once'header.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       View Product
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
                <h3 class="box-title"><a href="productlist.php" class="btn btn-primary" role="button"><--Back To Product List</a></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->




              <div class="box-body">
                  
    <?php
    $id=$_GET['id'];
                  
$select=$pdo->prepare("select * from products where id=$id");
                  
$select->execute();
                  
while($row=$select->fetch(PDO::FETCH_OBJ)){
    
echo'
<div class="col-md-6">

<ul class="list-group">
<center><p class="list-group-item list-group-item-success"><b>Product Detail</b></p></center>

  <li class="list-group-item"><b>ID</b> <span class="badge">'.$row->id.'</span></li>
  <li class="list-group-item"><b>Code</b> <span class="badge">'.$row->code.'</span></li>
  <li class="list-group-item"><b>Name</b> <span class="label label-info pull-right">'.$row->name.'</span></li>
   <li class="list-group-item"><b>Category</b> <span class="label label-primary pull-right">'.$row->category.'</span></li>
   <li class="list-group-item"><b>Brand/Manufacturer</b> <span class="label label-primary pull-right">'.$row->brand.'</span></li>
    <li class="list-group-item"><b>Price</b> <span class="label label-warning pull-right">&#8358;'.number_format($row->price,2).'</span></li>
    <li class="list-group-item"><b>Description</b> <p style="float:right;"><p>'.$row->description.'</p></p></li>
     <li class="list-group-item"><b>Quantity</b> <span class="badge">'.$row->stock.'</span></li>
  
</ul>



</div>

<div class="col-md-6">

<ul class="list-group">
<center><p class="list-group-item list-group-item-success"><b>Product image</b></p></center>

  <img src = "../images/products/'.$row->image.'" class="img-responsive text-center"/>
  
</ul>



</div>







';    
    
    
    
    
}                  
                  
                  
                  
                  
                  
                  
                  
                  ?>              
                  
                  
                  
                  
                  
              </div></div>
        
        
        

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php

include_once'footer.php';

?>