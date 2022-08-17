<?php 
session_start();

include_once'connectdb.php';

if($_SESSION['useremail']=="" OR $_SESSION['role']=="User"){
    
    
  header('location:login.php');
}

include_once'header.php'; 

$query = mysqli_query($connection, "SELECT * FROM tbl_order WHERE status='Delivered' GROUP BY reference_no");
$query2 = mysqli_query($connection, "SELECT * FROM tbl_order WHERE status='pending' GROUP BY reference_no");
$query3 =mysqli_query($connection, "SELECT * FROM products");
$query4 =mysqli_query($connection, "SELECT * FROM customer_info");


$query8 = mysqli_query($connection, "SELECT * FROM newsletter where status='SUBSCRIBED'");

$select=$pdo->prepare("select date, sum(total_price) as t from tbl_order where status='Delivered'  group by date  LIMIT 30");
     
            
    $select->execute();
                  
    $ttl=[];
    $dat=[];              
            //$grand_total=0;
while($row=$select->fetch(PDO::FETCH_ASSOC)  ){
    
extract($row);
    
	//$grand_total += $total_price;

    $ttl[]=$t;
    $dat[]=$date;
    
}

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
	  	<div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner text-center">
                <h3><?php echo mysqli_num_rows($query);?></h3>

                <p>Delivered Order<?php if(mysqli_num_rows($query)>=2){ echo 's';}?></p>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
		<div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner text-center">
                <h3><?php echo mysqli_num_rows($query2);?></h3>

                <p>Pending Order<?php if(mysqli_num_rows($query2)>=2){ echo 's';}?></p>
              </div>
              <a href="pendingorders.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
		<div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner text-center">
                <h3><?php echo mysqli_num_rows($query3);?></h3>

                <p>Product<?php if(mysqli_num_rows($query3)>=2){ echo 's';}?></p>
              </div>
              <a href="productlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
		<div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner text-center">
                <h3><?php echo mysqli_num_rows($query4);?></h3>

                <p>Customer<?php if(mysqli_num_rows($query4)>=2){ echo 's';}?></p>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
          
          
          
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner text-center">
                <h3><?php echo mysqli_num_rows($query8);?></h3>

                <p>Subscriber<?php if(mysqli_num_rows($query8)>=2){ echo 's';}?></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <div class="col-md-5 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Paystack Money Today</span>
              <?php
              $datetoday = date('d/m/Y');
                $query9 = mysqli_query($connection, "SELECT * FROM tbl_order WHERE paymentmethod='paystack' AND date='{$datetoday}'");
                $paystackmtoday=0;
                while($row=mysqli_fetch_assoc($query9)):
              ?>
              <?php $paystackmtoday += $row['total_price'] ?>
              <?php endwhile; ?>
              <span class="info-box-number">&#8358;<?php echo number_format($paystackmtoday,2). ' from '. mysqli_num_rows($query9). ' transactions' ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Transactions Today</span>
              <?php
                $datetoday = date('d/m/Y');
                $query10 = mysqli_query($connection, "SELECT * FROM tbl_order WHERE date='{$datetoday}'");
              ?>
              <span class="info-box-number"><?php echo mysqli_num_rows($query10) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
					<tr>
						<th>Reference No</th>
						<th>Item</th>
						<th>Method</th>
						<th>Status</th>
						<th>Receipt</th>
					</tr>
                  </thead>
                  <tbody>
					  <?php
					  $query5 = mysqli_query($connection, "SELECT * FROM tbl_order ORDER BY id DESC LIMIT 6");

					  while($row=mysqli_fetch_assoc($query5)):
					?>
					<tr>
						<td><a href="invoice.php?ref=<?php echo $row['reference_no'] ?>"><?php echo $row['reference_no'] ?></a></td>
						<td><?php echo $row['product_name'] ?></td>
						<?php
						if($row['status']=="Delivered"){
							echo '<td><span class="label label-success">'.$row['status'].'</span></td>';
						}else if($row['status']=="pending"){
							echo '<td><span class="label label-danger">'.$row['status'].'</span></td>';
						}else{
							echo "";
						}
						?>
						<td><?php echo $row['method'] ?></td>
						<td><a href="invoice.php?ref=<?php echo $row['reference_no'] ?>">Generate Receipt</a></td>
					</tr>
					<?php endwhile; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="pendingorders.php" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Email</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea class="textarea" placeholder="Message"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </form>
            </div>
            <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
          </div>
        </div>
        <!-- /.col -->

        <div class="col-md-4">

          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
				  <?php
				  $query6 = mysqli_query($connection, "SELECT * FROM products ORDER BY id DESC LIMIT 4");

				  while($row=mysqli_fetch_assoc($query6)):
				?>
                <li class="item">
                  <div class="product-img">
                    <img src="../images/products/<?php echo $row['image'] ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo $row['name'] ?>
                      <span class="label label-warning pull-right">&#8358; <?php echo $row['price'] ?></span></a>
                    <span class="product-description">
                          <?php echo substr($row['description'], 0,40) ?>
                        </span>
                  </div>
                </li>
				<?php endwhile; ?>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="productlist.php" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
var ctx = document.getElementById('earningbydate').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: <?php echo json_encode($dat);?>,
        datasets: [{
            label: 'Total Earning',
        backgroundColor: 'orangered',
            borderColor: 'orange',
           
            data:<?php echo json_encode($ttl);?>
        }]
    },

    // Configuration options go here
    options: {}
});




</script>
  <?php include_once'footer.php'; ?>