<?php
session_start();

include_once'connectdb.php';

if($_SESSION['useremail']==""){
    
    
  header('location:login.php');
}

include_once'header.php'; 

$refno = $_GET['ref'];

$query = mysqli_query($connection, "SELECT * FROM tbl_order WHERE reference_no='{$refno}'");
while($row=mysqli_fetch_assoc($query)){
  $cId =$row['customerid'];
  $customeremail =$row['customer_email'];
  $date =$row['date'];
  $time =$row['time'];
  $method =$row['method'];
  $paymentmethod =$row['paymentmethod'];
  $billing =$row['billing'];
}

$query2 =mysqli_query($connection, "SELECT * FROM customer_info WHERE id ='{$cId}'");
while($row=mysqli_fetch_assoc($query2)){
  $firstname =$row['firstname'];
  $lastname =$row['lastname'];
  $email =$row['useremail'];
  $phone =$row['phone'];
  $country =$row['city'];
  $postal =$row['postal'];
  $address =$row['address'];
}

if($method == "Home Delivery (attracts charges)"){
  $shippingfee =2000;
}else{
  $shippingfee =0;
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice
        <small>#<?php echo $refno ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <img src="../img/logo_black.svg" height="" alt="">
            <small class="pull-right">Date: <?php echo $date?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Allaia Stores.</strong><br>
            Ibadan.<br>
            Phone:+234 (0)903 005 7103<br>
            Email: sales@allaia.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo $firstname?> <?php echo $lastname?></strong><br>
            <?php if($billing ==""){echo $address;}else{echo $billing;}?><br>
            <?php echo $postal?><br>
            Phone: <?php echo $phone?><br>
            Email: <?php echo $email?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice <?php echo $refno?></b><br>
          <br>
          <b>Method:</b> <?php echo $method?><br>
          <b>Payment Method:</b> <?php echo $paymentmethod?><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Product</th>
              <th>Unit Price</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
              <?php
              $grand_total = 0;
              $query3 = mysqli_query($connection, "SELECT * FROM tbl_order WHERE reference_no='{$refno}'");
              while($row=mysqli_fetch_assoc($query3)):
              ?>
              <tr>
                <td><?php echo $row['qty'] ?></td>
                <td><?php echo $row['product_name'] ?></td>
                <td>&#8358;<?php echo number_format($row['product_price'],2) ?></td>
                <td>&#8358; <?php echo number_format($row['total_price'],2) ?></td>
              </tr>
              <?php $grand_total += $row['total_price']; ?>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="dist/img/credit/visa.png" alt="Visa">
          <img src="dist/img/credit/mastercard.png" alt="Mastercard">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              Goods sold in good condition are not returnable!
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>&#8358; <?php echo number_format($grand_total,2) ?></td>
              </tr>
              <tr>
                <th>VAT (0%)</th>
                <td>&#8358; <?php echo number_format(0,2) ?></td>
              </tr>
              <tr>
                <th>Total:</th>
                <td><?php echo number_format(($grand_total),2) ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.php?ref=<?php echo $refno ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
 <?php include_once'footer.php'; ?>
