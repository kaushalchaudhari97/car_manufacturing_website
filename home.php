<?php
require("top.php");
require("config.php");
//session_start();
$query="SELECT count(id) As total FROM orders";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($result);
$show=$data['total'];

?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Cars, that impresses you at first glance.,<br>Designed for safe drive.</h1>
      <h2>Comfort in cars is our manufacturing priority.</h2>
      <a href="courses.html" class="btn-get-started">New Models..</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    
  <!--- counter --->
<section class="container card" style="margin-top:2%;">
  <div class="row" >
              <div class="col-md-3 stretch-card grid-margin ">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                  <img src="car_css/img/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Weekly Sales </h4>
                    <h2 class="mb-5"id="show"> 15,00</h2>
                    <h6 class="card-text">Increased by 60%</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="car_css/img/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3"> Orders </h4>
                    <h2 class="mb-5 count" id="show"><?php echo "$show"; ?></h2>
                    <h6 class="card-text">Decreased by 10%</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="car_css/img/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Visitors Online </h4>
                    <h2 class="mb-5" id="show">101</h2>
                    <h6 class="card-text">Increased by 5%</h6>
                  </div>
                </div>
              </div>
            
                <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-primary card-img-holder text-white">
                  <div class="card-body">
                    <img src="car_css/img/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Visitors Online </h4>
                    <h2 class="mb-5" id="show">9557</h2>
                    <h6 class="card-text">Increased by 5%</h6>
                  </div>
                </div>
              
              </div>
               <script type="text/javascript">
               $('#show,s').counterUp({
               delay:10,
               time: 5000
               });
               </script>
              <!-- end-->
            </div>
</section>
    <!-- About section  -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-3" data-aos="zoom-in-up" data-aos-delay="200" style="margin-top:6%;">
            <img src="car_css/img/f.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
           <!-- <h3 style="color: #3ac162;">Aboutus</h3>-->
           <div class="section-title" data-aos="fade-up">
              <h2>About Us</h2>
           </div>
            <p class="card-body card">
             Honda Cars India Ltd., (HCIL) is a leading manufacturer of premium cars in India. The company was established in 1995 with a commitment to provide Honda’s latest passenger car models and technologies, to the Indian customers. The company is a subsidiary of Honda Motor Co. Ltd., Japan.

             HCIL's first manufacturing unit was set up at Greater Noida, U.P in 1997. The green field project  is spread across 150 acres and has an annual production capacity of 100,000 units. HCIL's second plant in Tapukara is the first car manufacturing plant in the state of Rajasthan. The state-of the art Power train and Press shop in Tapukara plant have been operational since September 2008. This facility is spread over 450 acres and has an annual production capacity of 180,000 units. HCIL started the production of cars from its Tapukara Plant from February 2014. This plant is the culmination of the best manufacturing know-how and practices gathered from Honda's global operations.
            </p>

          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->

   
    <!-- ======= Contact Section ======= -->
    <section id="popular-courses" >

        <div class=" container section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
        </div>
      <div class="container" data-aos="fade-up" id="heroo">

      <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      
        <div class=" container section-title" data-aos="fade-up">
          <center><h2>Contact Us</h2></center>
          <center><a href="contact.php" type="button" class="bt">Talk To Use</a></center>
        </div>
            
    </div>
      </div>
    </section><!-- End Contact Section -->


  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">


        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>