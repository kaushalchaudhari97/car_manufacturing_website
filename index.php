<?php
session_start();
?>
<!doctype html>
<html>
    <head>
         <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="car_css/final.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="car_css/jquery-3.2.1.min.js" type="text/javascript"></script>
        </head>  
  <script>
  $("document").ready(function(){
  $("button").click(function(){
  if($(".uname").val().trim()=="")
  {
  alert("Enter user ID");
  }
  else if($(".passw").val().trim()=="")
  {
  alert("Enter Password.");
  }
  else
  {
  $.get("ajax.php?act=login&uname="+$(".uname").val().trim()+"&passw="+$(".passw").val().trim(),function(data){
  if(data.trim()=="ok")
  {
    
   self.location="home.php";
  }
  else
  {
  alert(data.trim());
  }
  })
  }
  })  
  })
  </script>
  <body>
      
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth ">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5" style="box-shadow: 0 6px 9px 0 rgba(0, 0, 0, 0.2), 0 8px 20px 0 rgba(0, 0, 0, 0.19); border-top-left-radius: 2em;border-bottom-right-radius: 2em;">
                <div class="brand-logo">
                <i class="fa fa-car" style="color: #706fd3; font-size:25px;"data-aos="zoom-in" data-aos-delay="200"></i>
                  <span style="color: #706fd3;font-size:28px;margin-left: 5px;"data-aos="zoom-in" data-aos-delay="200">Login</span>
                </div>
                <h4 data-aos="zoom-in" data-aos-delay="300">Sign in to continue.</h4>
                
                
                 <div class="form-group">
                    <input type="text" id="txt_uname" class="form-control form-control-lg form-control Input uname"  placeholder="Username">
                  </div>
                  
                  <div class="form-group">
                    <input type="password" id="txt_pwd" class="form-control form-control-lg form-control Input passw"  placeholder="Password" >
                  </div>
                
                  <div class="form-group">
                               <div id="message"></div>
                   </div>
                
                  <div class="mt-3">
                   
                    <button type="submit" name="but_submit" id="but_submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                  </div>              
                </form>
              </div>
            </div> 
          </div>
        </div>    
      </div>   
    </div>
  
    </body>
</html>
<script>
  AOS.init("slow");
</script>

