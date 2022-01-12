<?php 
//index.php
require("top.php");
require("config.php");
$connect = mysqli_connect("localhost","root","","firstdb");
$query = "SELECT * FROM employee ORDER BY name ASC";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
 <head>
  
  
  <style>
  #result {
   position: absolute;
   width: 100%;
   max-width:870px;
   cursor: pointer;
   overflow-y: auto;
   max-height: 400px;
   box-sizing: border-box;
   z-index: 1001;
  }
  .link-class:hover{
   background-color:#f1f1f1;
  }
  </style>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">How to return JSON Data from PHP Script using Ajax Jquery</h2>
   <h3 align="center">Search Employee Data</h3><br />   
   <div class="row">
    <div class="col-md-4">
     <select name="employee_list" id="employee_list" class="form-control">
      <option value="">Select Employee</option>
      <?php 
      while($row = mysqli_fetch_array($result))
      {
       echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
      }
      ?>
     </select>
    </div>
    <div class="col-md-4">
     <button type="button" name="search" id="search" class="btn btn-info">Search</button>
    </div>
   </div>
   <br />
   <div class="table-responsive" id="employee_details" style="display:none">
   <table class="table table-bordered">
    <tr>
     <td width="10%" align="right"><b>Name</b></td>
     <!--<td width="90%"><span id="employee_name"></span></td>-->
     <td width="90%"><input type="text" id="employee_name" value=""></td>
     
    </tr>
    <tr>
     <td width="10%" align="right"><b>Address</b></td>
     <!--<td width="90%"><span id="employee_address"></span></td>-->
     <td width="90%"><input type="text" id="employee_address" value=""></td>
     

    </tr>

    <tr>
     <td width="10%" align="right"><b>Gender</b></td>
     <!--<td width="90%"><span id="employee_gender"></span></td>-->
     <td width="90%"><input type="text" id="employee_gender" value=""></td>
     

    </tr>
    <tr>
     <td width="10%" align="right"><b>Designation</b></td>
     <!--<td width="90%"><span id="employee_designation"></span></td>-->
     <td width="90%"><input type="text" id="employee_designation" value=""></td>

    </tr>
    <tr>
     <td width="10%" align="right"><b>Age</b></td>
    <!--<td width="90%"><span id="employee_age"></span></td>-->
     <td width="90%"><input type="text" id="employee_age" value=""></td>
     

     


    </tr>
   </table>
   </div>
   
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('#search').click(function(){
  var id= $('#employee_list').val();
  if(id != '')
  {
   $.ajax({
    url:"fetchnew.php",
    method:"POST",
    data:{id:id},
    dataType:"JSON",
    success:function(data)
    {
     /*$('#employee_details').css("display", "block");
     $('#employee_name').text(data.name);
     $('#employee_address').text(data.address);
     $('#employee_gender').text(data.gender);
     $('#employee_designation').val(data.designation);
     $('#employee_age').text(data.age);*/
     $('#employee_details').css("display", "block");
     $('#employee_name').val(data.name);
     $('#employee_address').val(data.address);
     $('#employee_gender').val(data.gender);
     $('#employee_designation').val(data.designation);
     $('#employee_age').val(data.age);

   
    }
   })
  }
  else
  {
   alert("Please Select Employee");
   $('#employee_details').css("display", "none");
  }
 });
});
</script>
