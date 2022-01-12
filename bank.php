<?php 
require('top.php');
require('dtlink.php');
?>
<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Supplier</h2>
      </div>
    </div><!-- End Breadcrumbs -->

<div class="container popup"> 
  
 <span class="d-flex justify-content-end" id="sp"><button type="button" class="btn btn-primary"  name="add" id="addbank">New</button></span>
  
  <table id="BankList"class="table tabl-bordered table-striped">
      <thead >
        <tr>
          <th>Sr.No</th>
          <th>Bank Name </th>
          <th>Branch</th>          
          <th>Acc/No</th>
          <th>IFSC Code</th>                  
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
              <label for="name" class="control-label">Bank name</label>
              <input type="text" class="form-control" id="bname" name="bname" placeholder="came" required>      
            </div>
            <div class="form-group spa">
              <label for="age" class="control-label">Branch</label>              
              <input type="text" class="form-control" id="branch" name="branch" placeholder="Caddr">              
            </div>      
            <div class="form-group spa">
              <label for="lastname" class="control-label">Acc/No</label>             
              <input type="text" class="form-control"  id="an" name="an" placeholder="Email" required>              
            </div>   
            <div class="form-group spa">
              <label for="address" class="control-label">IFSC Code</label>             
              <input  type="text" class="form-control"  id="ifsc" name="ifsc" placeholder="Mobile">             
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
  var employeeData = $('#BankList').DataTable({
    "lengthChange":true,
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"action.php",
      type:"POST",
      data:{action:'listbank'},
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
  $('#addbank').click(function(){
    $('#employeeModal').modal('show');
    $('#employeeForm')[0].reset();
    $('.modal-title').html("<i class='fa fa-plus'></i> Add Bank info");
    $('#action').val('addbank');
    $('#save').val('Add');
      $('.cust').show();
  });   
  $("#BankList").on('click', '.update', function(){
    var empId = $(this).attr("id");
    var action = 'getbank';
    $.ajax({
      url:'action.php',
      method:"POST",
      data:{empId:empId, action:action},
      dataType:"json",
      success:function(data){
        $('#employeeModal').modal('show');
        $('#empId').val(data.id);
        $('#bname').val(data.bankname);
        $('#branch').val(data.branch);
        $('#an').val(data.acno);        
        $('#ifsc').val(data.isfc);
        $('.cust').hide();
        $('.modal-title').html("<i class='fa fa-plus'></i> Edit Bank");
        $('#action').val('updatebank');
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
  $("#BankList").on('click', '.delete', function(){
    var empId = $(this).attr("id");   
    var action = "bankDelete";
    if(confirm("Are you sure you want to delete this detail?")) {
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