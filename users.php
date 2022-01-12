<?php 
require('top.php');
require('dtlink.php');
?>
 <script src="js/cru.js"></script> 
<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Users</h2>
      </div>
    </div><!-- End Breadcrumbs -->

<div class="container popup"> 
  
 <span class="d-flex justify-content-end" id="sp"><button type="button" class="btn btn-primary"  name="add" id="addEmployee">New</button></span>

    <table id="employeeList" class="table tabl-bordered table-striped">
      <thead >
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Name</th>         
          <!--<th>Password</th>-->
          <th>Email</th>
          <th>Mobile_no</th>          
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
    </table>
  
 <!-- The Modal -->
<div class="modal" id="employeeModal">
  <div class="modal-dialog">
    <form method="post" id="employeeForm">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Add Record</h4>
          
          <button type='submit'  class="close" name="save" id="Save"  data-dismiss="modal" value="Reload Page" onClick="document.location.reload(true)">X</button>
        <!--<button type="button" class="close" data-dismiss="modal" style="font-size:16pt">&times;</button>-->
      </div>

      <div class="modal-body">
       <div class="form-group spa"><!-- spa is use for top margin -->
        <label>Username</label>
        <input type="text" id="empName" name="empName" placeholder="Username"  class="form-control" required>
       </div>

       <div class="form-group spa">
        <label>Name</label>
        <input type="text" id="empAge" name="empAge" placeholder="Name" class="form-control" v>
       </div>

       <div class="form-group spa empSkills">
        <label>Password</label>
        <input type="text" id="empSkills" name="empSkills" placeholder="Password"  class="form-control" >
       </div>

       <div class="form-group spa">
        <label>Email</label>
        <input type="Email" id="address" name="address" placeholder="email" class="form-control" required>
       </div>

        <div class="form-group spa">
        <label>Mobile No</label>
        <input type="text" id="mobile_no" name="mobile_no" placeholder="Mobile_no" class="form-control" required>
       </div>

           
      </div>
  
      <div class="modal-footer">
        <input type="hidden" name="empId" id="empId" />
        <input type="hidden" name="action" id="action" value="" />
        <input type='submit' class="btn btn-danger sh"  name="save" id="Save" value="Save" data-dismiss="modal">
         
        <button type="button" class="btn btn-secondary clos" data-dismiss="modal"value="Reload Page" onClick="document.location.reload(true)">Close</button>
      </div>
    </div>
    </form>

  </div>
</div>

  </div>
  
  <script type="text/javascript">
    $(document).ready(function(){
   
    $("#addEmployee").click(function(){
      $("#employeeModal").show();
    })

    
    $(".close").click(function(){
      $(".modal").hide();
    })    
      
  });


   
  </script>
  
<?php require('bottom.php');?>
