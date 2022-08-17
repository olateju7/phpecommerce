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
      Product List
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
                <h3 class="box-title">Product list</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->




             <div class="box-body">
                 <div style="overflow-x:auto;" > 
                
                 <table id="blogtable" class="table table-striped">
        <thead>
        <tr>
        <th>Code</th>
         <th>Name</th>   
          <th>Category</th>   
           <th>Price</th>   
            <th>Image</th>
              <th>Brand</th>
			  <th>Quantity</th>
        <th>Slideshow</th>
               <th>View</th>
                <th>Edit</th> 
                 <th>Delete</th>       
        </tr>    
            
        </thead> 
           
              
                 
        <tbody>
        
    <?php
    $select=$pdo->prepare("select * from products order by name asc");
            
    $select->execute();
            
while($row=$select->fetch(PDO::FETCH_OBJ)  ){
    
    echo'
    <tr>
    <td>'.$row->code.'</td>
    <td>'.$row->name.'</td>
    <td>'.$row->category.'</td>
    <td>&#8358;'.number_format($row->price,2).'</td>
    <td><img src = "../images/products/'.$row->image.'" class="img-rounded" width="40px" height="40px"/></td>
	<td>'.$row->brand.'</td>
	<td>'.$row->stock.'</td>
  <td>
<a href="slideshow.php?id='.$row->id.'" class="btn btn-warning" role="button"><span class="glyphicon glyphicon-list"  style="color:#ffffff" data-toggle="tooltip"  title="Slideshow"></span></a>   
    
    </td>
    <td>
<a href="viewproduct.php?id='.$row->id.'" class="btn btn-success" role="button"><span class="glyphicon glyphicon-eye-open"  style="color:#ffffff" data-toggle="tooltip"  title="View Product"></span></a>   
    
    </td>
    
    
    
    
    <td>
<a href="editproduct.php?id='.$row->id.'" class="btn btn-info" role="button"><span class="glyphicon glyphicon-edit" style="color:#ffffff" data-toggle="tooltip" title="Edit Product"></span></a>   
    
    </td>
    
    <td>
<button id='.$row->id.' class="btn btn-danger btndelete" ><span class="glyphicon glyphicon-trash" style="color:#ffffff" data-toggle="tooltip"  title="Delete Product"></span></button>  
    
    
    
    
    </td>
     </tr>
     ';
    
}          
?>        
                
 </tbody>               
                     </table>  </div>     
                 
                 
             </div>
        
        </div>
        
        

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <script>
  $(document).ready( function () {
    $('#blogtable').DataTable({
        
    "order":[[0,"asc"]]    
        
        
        
    });
} );  
    
    
</script>
  
   <script>
  $(document).ready( function () {
    $('[data-toggle="tooltip"]').tooltip();
} );  
    
    
</script>
 
 
 <script>
    $(document).ready(function() {
    $('.btndelete').click(function() {
            var tdh = $(this);
            var id = $(this).attr("id");
             swal({
  title: "Do you want to delete this Product?",
  text: "Once Product is deleted, you can not recover it!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      
       $.ajax({
                            url: 'prodelete.php',
                            type: 'post',
                            data: {
                            pidd: id
                            },
                            success: function(data) {
                            tdh.parents('tr').hide();
                            }


                        });
      
      
      
    swal("Your Product has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your Product is safe!");
  }
});
            
            
            
            
            

                       

        });
    });
    
    
    
</script>
  
  

  <?php

include_once'footer.php';

?>