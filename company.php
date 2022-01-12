<?php
require("top.php")
?>
<style type="text/css">
  #employeeList_filter{display: none;}
  .dataTables_length{display: none;}
  .dataTables_info{display: none;}
  .dataTables_paginate{display: none;}
</style>
<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Company</h2>
      </div>
    </div><!-- End Breadcrumbs -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>    
 <!--<script src="js/newo.js"></script> -->
<style type="text/css">
  button{border: none;}

      .input-group{margin-top: 10px;}
      span{margin-right: 5px;}
      #sp{margin-left:66em;}
      .btn-primary{margin-top: 10%;}
      .spa{margin-top:4%;}
      div.dataTables_paginate ul.pagination{margin:2px 0;font-size: 15pt;margin-left: 80%;}
      div.dataTables_filter{text-align:right} div.dataTables_filter label{font-weight:normal;text-align:left} div.dataTables_filter input{}
       div.dataTables_length label{font-weight:normal;text-align:left;} div.dataTables_length select{width:75px;display:inline-block}
       .close {
    float: right;
    font-size: 1.1rem;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: .5;
    background-color: transparent;
    border: 0;
    cursor: pointer;
}
  .alert{display: none; margin-top: 10px;}
  
      </style>



<div class="container popup"> 
  
 <!--<span class="d-flex justify-content-end" id="sp"><button type="button" class="btn btn-primary"  name="add" id="addEmployee">New</button></span>-->

  <div class='alert alert-info'> Data inserted Successfully....</div>
    <table id="employeeList" class="table tabl-bordered table-striped" style="margin-top: 5%;margin-bottom: 20%;" >
      <thead >
        <tr>
          <th>Sr.No</th>
          <th>Name</th>
          <th>Address</th>         
          <th>Email</th>
          <th>Mobile</th>
          <th>Pan</th>          
          <th>gstn</th>
          <th>statecode</th>
          <th>Edit</th>

         
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
          
          <button type='submit'  class="close" name="save" id="close"  data-dismiss="modal" value="Reload Page" onClick="document.location.reload(true)">X</button>
        <!--<button type="button" class="close" data-dismiss="modal" style="font-size:16pt">&times;</button>-->
      </div>

      <div class="modal-body">
       <div class="form-group spa">
        <label>Name</label>
        <input type="text" id="un" name="un" placeholder="Username"  class="form-control" required>
       </div>

       <div class="form-group spa">
        <label>Address</label>
        <input type="text" id="ui" name="ui" placeholder="Name" class="form-control" v>
       </div>

       <div class="form-group spa">
        <label>Email</label>
        <input type="text" id="up" name="up" placeholder="Password"  class="form-control" >
       </div>

       <div class="form-group spa">
        <label>Mobile</label>
        <input type="text" id="em" name="em" placeholder="email" class="form-control" required>
       </div>

        <div class="form-group spa">
        <label>Pan</label>
        <input type="text" id="mo" name="mo" placeholder="Mobile_no" class="form-control" required>
       </div>

        <div class="form-group spa">
        <label>Gstn</label>
        <input type="text" id="gst" name="gst" placeholder="email" class="form-control" required>
       </div>

        <div class="form-group spa">
        <label>State code</label>
        <input type="text" id="sc" name="statecode" placeholder="Mobile_no" class="form-control" required>
       </div>

           
      </div>
  
      <div class="modal-footer">
        <input type="hidden" name="empId" id="empId" />
        <input type="hidden" name="action" id="action" value="" />
        <input type='submit' class="btn btn-danger sh"  name="save" id="Save" value="Save" data-dismiss="modal">
         
        <button type="button" class="btn btn-secondary clos"  data-dismiss="modal" value="Reload Page" onClick="document.location.reload(true)">Close</button>
      </div>
    </div>
    </form>

  </div>
</div>

  </div>
  
  <script type="text/javascript">
    $(document).ready(function(){
    $("#save").click(function(){
      $("#employeeModal").hide();
        $(".alert").show();
    })
    $("#addEmployee").click(function(){
      $("#employeeModal").show();
    })

    $(".clos").click(function(){
      $(".modal").hide();
    })

    /*$(".close").click(function(){
      $(".modal").hide();
    }) */   
      
  });


   
  </script>
  
<?php require('bottom.php');?>
<script type="text/javascript">
  $(document).ready(function(){ 
  var employeeData = $('#employeeList').DataTable({
    "lengthChange":true,
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"action.php",
      type:"POST",
      data:{action:'listComp'},
      dataType:"json"
    },
    "columnDefs":[
      {
        "targets":[0,6],
        "orderable":false,
      },
    ],
    "pageLength":10
  });   
 
  $("#employeeList").on('click', '.update', function(){
    var empId = $(this).attr("id");
    var action = 'getComp';
    $.ajax({
      url:'action.php',
      method:"POST",
      data:{empId:empId, action:action},
      dataType:"json",
      success:function(data){
        $('#employeeModal').modal('show');                      
        $('#empId').val(data.id);
        $('#un').val(data.cname);
        $('#ui').val(data.caddr);
        $('#up').val(data.email);       
        $('#em').val(data.mobile);
        $('#mo').val(data.pan);
         $('#gst').val(data.gstn);
        $('#sc').val(data.state_code);
        $('.modal-title').html(" Edit Company");
        $('#action').val('compaup');
        $('#save').val('Save');
        
      }
    })
  });
  $("#employeeModal").on('submit','#employeeForm', function(event){
    event.preventDefault();
    $('#save').attr('disabled','disabled');
    var formData = $(this).serialize();
    $.ajax({
      url:"action.php",
      method:"POST",
      data:formData,
      success:function(data){       
        $('#employeeForm')[0].reset();
        $('#employeeModal').modal('hide');                
        $('#save').attr('disabled', false);
        employeeData.ajax.reload();
      }
    })
  });   
   
});
</script>
<?php
 if ($isUpdated)
   {
    echo "<div class='alert alert-success' role='alert'>";
   }

  ?>