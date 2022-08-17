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
      Customers' List
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
                <h3 class="box-title">Customers' list</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->




             <div class="box-body">
                 <div style="overflow-x:auto;" > 
                
                 <table id="blogtable" class="table table-striped">
        <thead>
        <tr>
        <th>#</th>
         <th>First Name</th>   
          <th>Last Name</th>   
           <th>Email</th>   
            <th>Phone</th>
			<th>Address</th>
        </tr>    
            
        </thead> 
           
              
                 
        <tbody>
        
    <?php
    $select=$pdo->prepare("select * from customer_info order by id desc");
            
    $select->execute();
            
while($row=$select->fetch(PDO::FETCH_OBJ)  ){
    
    echo'
    <tr>
    <td>'.$row->id.'</td>
    <td>'.$row->firstname.'</td>
    <td>'.$row->lastname.'</td>
    <td>'.$row->useremail.'</td>
    <td>'.$row->phone.'</td>
	<td>'.$row->address.', '.$row->city.', '.$row->postal.', '.$row->country.'.</td>
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
        
    "order":[[0,"desc"]]    
        
        
        
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
  text: "Once Blog is deleted, you can not recover it!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      
       $.ajax({
                            url: 'blogdelete.php',
                            type: 'post',
                            data: {
                            pidd: id
                            },
                            success: function(data) {
                            tdh.parents('tr').hide();
                            }


                        });
      
      
      
    swal("Your Blog has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your Blog is safe!");
  }
});
            
            
            
            
            

                       

        });
    });
    
    
    
</script>
  
  

  <?php

include_once'footer.php';

?>