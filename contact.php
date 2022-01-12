<?php
require("top.php");
error_reporting(0);

?>
<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Contact Us</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div data-aos="fade-up">
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872070.8445274667!2d71.52350806250004!3d18.604708000000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b9718532353b%3A0xd332bd02254bb8db!2sAudi%20Service%20Pune!5e0!3m2!1sen!2sin!4v1625392114298!5m2!1sen!2sin" style="border:0; width: 100%; height: 350px; margin-top:0px;" allowfullscreen="" loading="lazy"></iframe>
      </div>

      <div class="container card cont" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Pune</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>Car@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+917775757890</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form name="info" method="POST" action="contact.php" class="cont_form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="services" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
             
              <div class="text-center cont"><button type="submit">Send Message</button></div>
            </form>
           <?php   
             $mysql=new mysqli("localhost","root","","firstdb");
             $sql="insert into service values('$_POST[name]','$_POST[email]','$_POST[services]','$_POST[message]')"; 
             $mysql ->query($sql);
           ?>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->


<?php
require("bottom.php");
?>