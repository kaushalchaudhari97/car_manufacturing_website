<?php 
require('top.php');
require('dtlink.php');
?>
<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Transporter</h2>
      </div>
    </div><!-- End Breadcrumbs -->

<div class="container popup"> 
  
 <span class="d-flex justify-content-end" id="sp"><button type="button" class="btn btn-primary"  name="add" id="addtran">New</button></span>
  
  <table id="TList"class="table tabl-bordered table-striped">
      <thead >
        <tr>
          <th>Sr.No</th>
          <th>T.name</th>
          <th>T.address</th>          
          <th>Email</th>
          <th>mobile_no</th>                  
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
            <div class="form-group spa">  <!-- spa is use for top margin -->
              <label for="name" class="control-label">tname</label>
              <input type="text" class="form-control" id="tname" name="tname" placeholder="came" required>      
            </div>
            <div class="form-group spa">
              <label for="age" class="control-label">taddr</label>              
              <input type="text" class="form-control" id="taddr" name="taddr" placeholder="Caddr">              
            </div>      
            <div class="form-group spa">
              <label for="lastname" class="control-label">Email</label>             
              <input type="text" class="form-control"  id="email" name="email" placeholder="Email" required>              
            </div>   
            <div class="form-group spa">
              <label for="address" class="control-label">Mobile</label>             
              <input  type="text" class="form-control"  id="mobile" name="mobile" placeholder="Mobile">             
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
  
  
  
<?php require('bottom.php');?>

<script type="text/javascript">
  $(document).ready(function(){ 
  var employeeData = $('#TList').DataTable({
    "lengthChange":true,
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"action.php",
      type:"POST",
      data:{action:'listtran'},
      dataType:"json"
    },
    "columnDefs":[
      {
        "targets":[0,5],
        "orderable":false,
      },
    ],
    "pageLength":10
  });   
  $('#addtran').click(function(){
    $('#employeeModal').modal('show');
    $('#employeeForm')[0].reset();
    $('.modal-title').html("<i class='fa fa-plus'></i> Add Supplier");
    $('#action').val('addtran');
    $('#save').val('Add');
  });   
  $("#TList").on('click', '.update', function(){
    var empId = $(this).attr("id");
    var action = 'gettran';
    $.ajax({
      url:'action.php',
      method:"POST",
      data:{empId:empId, action:action},
      dataType:"json",
      success:function(data){
        $('#employeeModal').modal('show');
        $('#empId').val(data.id);
        $('#tname').val(data.tname);
        $('#taddr').val(data.taddr);
        $('#email').val(data.email);        
        $('#mobile').val(data.mobile);
        $('.cust').hide();
        $('.modal-title').html("<i class='fa fa-plus'></i> Edit Supplier");
        $('#action').val('updatetran');
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
  $("#TList").on('click', '.delete', function(){
    var empId = $(this).attr("id");   
    var action = "tranDelete";
    if(confirm("Are you sure you want to delete this transporter?")) {
      $.ajax({
        url:"action.php",
        method:"POST",
        data:{empId:empId, action:action},
        success:function(data) {          
          employeeData.ajax.reload();
        }
      })
    } else {
      return false;
    }
  }); 
});
</script>