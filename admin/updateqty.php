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
      Update Quantity & Price
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
                <h3 class="box-title">Update Quantity & Price</h3>
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
            <th>Image</th>
                <th>Edit</th>     
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
    <td><img src = "../images/products/'.$row->image.'" class="img-rounded" width="40px" height="40px"/></td>
    
    <td>
<a href="editqty.php?id='.$row->id.'" class="btn btn-info" role="button"><span class="glyphicon glyphicon-edit" style="color:#ffffff" data-toggle="tooltip" title="Edit Product"></span></a>   
    
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
  title: "Do you want to delete this blog?",
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