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
       Track Orders
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
          <div class="box box-danger">
           
            <div class="box-header with-border">
                <h3 class="box-title">Orders' List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->




              <div class="box-body">
			  	<div style="overflow-x:auto;" >
					<table id="ordertable" class="table table-striped">
							<thead>
								<tr>
									<th>Reference Number</th>
									<th>Customer Email</th>
									<th>Total Price</th>
									<th>Transaction Date</th>
									<th>Delivery Method</th>
									<th>Payment Method</th>
									<th>Status</th>
									<th>Print Receipt</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$select=$pdo->prepare("select * from tbl_order where status='Delivered' group by reference_no order by id desc");
								$select->execute();
					
								while($row=$select->fetch(PDO::FETCH_OBJ)  ){
									echo'
									<tr>
										<th>'.$row->reference_no.'</th>
										<th>'.$row->customer_email.'</th>
										<th>&#8358;'.number_format($row->total_price,2).'</th>
										<th>'.$row->date.'</th>
										<th>'.$row->method.'</th>
										<th>'.$row->paymentmethod.'</th>
										<th>'.$row->status.'</th>
										<th><a href="invoice.php?ref='.$row->reference_no.'"><button id='.$row->id.' class="btn btn-info changestatus" ><span class="glyphicon glyphicon-print" style="color:#ffffff" data-toggle="tooltip"  title="Generate Receipt"></span></button></a></th>
									</tr>';
								}
								?>
							</tbody>
					</table>
				</div>
			  </div>
              </div>
        
        
        

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
  $(document).ready( function () {
    $('#ordertable').DataTable({
        
    "order":[[0,"desc"]]   
        
    });
});  
    
    
</script>
  
   <script>
  $(document).ready( function () {
    $('[data-toggle="tooltip"]').tooltip();
} );  
    
    
</script>
 


<?php include_once'footer.php'; ?>