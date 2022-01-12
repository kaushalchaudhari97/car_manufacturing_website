<?php
require("top.php");
?>
<script>
$("document").ready(function(){
$("#save").click(function(){
if($("input[name=old_pass]").val().trim()=="")
{
alert("Enter old password");
}
else if($("input[name=new_pass]").val().trim()=="")
{
alert("Enter new password"); 
}
else if($("input[name=conf_pass]").val().trim()=="")
{
alert("Enter confirm pasword.");
}
else
{
if($("input[name=new_pass]").val().trim()==$("input[name=conf_pass]").val().trim())
{
$.get("ajax.php?act=savepass&old_pass="+$("input[name=old_pass]").val()+"&new_pass="+$("input[name=new_pass]").val(),function(data){
if(data.trim()=="ok")
{
 
alert("Password changed successfully.");

}
else
{
alert(data.trim());
}
})
}
else
{
alert("Password do not match.");
}
}
   $("#old").val("");
   $("#new").val("");
   $("#con").val("");
  
   
})

})
</script>
<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Change Password</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="changepass" class="changepass">
      
      <div class="container card cont" data-aos="fade-up">

        <div class="row mt-5" style="margin-left: 30%;">

          <div class="col-lg-4">
            <div class="info">
              <div class="old">           
                <h4>Old Password</h4>     
              </div>

              <div class="new">          
                <h4>New Password</h4>       
              </div>

              <div class="conf">     
                <h4>Confirm Password</h4>        
              </div>

            </div>

          </div>

          <div class="col-lg-5">

            <form name="changepass" method="POST"  class="passwo" action="changepass.php">
              <input type='hidden' name='posted' value='y'>
              <div class="row">
                <div class="col-md-9 form-group">
                  <input type="password" name='old_pass' class="form-control" id="old" placeholder="Old Password" required>
                </div>
                <div class="col-md-9 form-group mt-3 mt-md-2">
                  <input type="password" class="form-control" name='new_pass' id="new" placeholder="New Password" required>
                </div>
                <div class="col-md-9 form-group mt-3 mt-md-2">
                  <input type="password" class="form-control" name='conf_pass' id="con" placeholder="Confirm Password" required>
                </div>
              </div>

              <div class=" cont  mt-md-4"><button type="submit" id='save'>Save</button></div>
            </form>
           
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->


<?php
require("bottom.php");
?>