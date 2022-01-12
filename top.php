<?php
session_start();
require("functions.php");
if($_SESSION['logged']=="")
{
redirect("index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="car_css/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="car_css/vendor/aos/aos.css" rel="stylesheet">
  <link href="car_css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="car_css/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="car_css/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="car_css/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="car_css/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="car_css/car.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <!-- Counter Function -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
  <script src="jquery.counterup.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <!-- end  -->

 <!-- data tables -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Cars</a></h1>
   
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>

          <li><a class="active" href="home.php">Home</a></li>
         <!-- <li><a href="aboutus.php">About</a></li>-->

         <li class="dropdown"><a href="#"><span>Masters</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="customer.php">Customer</a></li>
                <li><a href="supplier.php">Supplier</a></li>
                <li class="dropdown"><a href="item.php">cars</a> </li> 
                <li class="dropdown"><a href="cars.php">Items</a> </li>              

                <li><a href="bank.php">Bank</a></li>
                <li><a href="transporter.php">Transporter</a></li>
            </ul>
          </li>
      
          <li class="dropdown"><a href="#"><span>Transaction</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="invoice.php">Invoice</a></li>
                <li><a href="receipt.php">Receipt</a></li>
                <li class="dropdown"><a href="pay.php">Payment</a> </li>              
                <li><a href="purchase.php">Purchase</a></li>
                <li><a href="order.php">Orders</a></li>
                <li><a href="#">Bank Transaction</a></li>

            </ul>
          </li>
          <li><a href="contact.php">Contact</a></li>
                 
      <li class="dropdown spinner" ><a href="">Setting<i class="fa fa-cog fa-spin fa-2x fa-fw" ></i></a>
         
          <ul>
            <li><a href="Users.php"><i class="fa fa-user-o"></i><span>Users</span></a></li>
            <li><a href="company.php"><i class="fa fa-building-o"></i><span>Company</span></a></li>
          </ul>
        </li>
          
         <li class="dropdownn spinner"><a href="#"><?php echo "Welcome"."  ".ucfirst($_SESSION['name'])?><i class="fa fa-user-circle active"></i></a>
          <!--<li class="dropdownn spinner"><a href="#">Admin<i class="fa fa-user-circle active"></i></a>-->
            <ul>
              <li class="spinner"><a href="changepass.php"><i class="fa fa-key"></i><span>Change <br>Password</span></a></li>
              <li class="spinner"><a href="logout.php"><i class="fa fa-sign-out"></i><span>Log-Out</span></a></li>
            </ul>
          </li>
          
        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>


      </nav><!-- .navbar -->

    </div>

  </header><!-- End Header -->

<div id="topmarg" class="content-wrapper">