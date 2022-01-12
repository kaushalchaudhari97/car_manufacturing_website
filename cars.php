<?php 
require('top.php');
require('dtlink.php');

?>

  <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Items</h2>
      </div>
    </div>

<div class="container popup"> 
  
 <span class="d-flex justify-content-end" id="sp"><button type="button" class="btn btn-primary"  name="add" id="addEmployee">New</button></span>

    <table id="employeeList" class="table tabl-bordered table-striped">
      <thead >
        <tr>
          <th>Sr No.</th>
          <th>Item name</th>
          <th>UOM</th>         
          <th>Price</th>
          <th>GST</th>          
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
    </table>
  
<div class="modal" id="employeeModal">
  <div class="modal-dialog">
    <form method="post" id="employeeForm">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Add Record</h4>
          
          <button type='submit'  class="close" name="save" id="Save"  data-dismiss="modal" value="Reload Page" onClick="document.location.reload(true)">X</button>
      </div>

      <div class="modal-body">
       <div class="form-group spa"><!-- spa is use for top margin -->
        <label>Item name</label>
        <input type="text" id="iname" name="iname" placeholder="Item name"  class="form-control" required>
       </div>

       <div class="form-group spa">
        <label>Unit Of M.</label>
        <input type="text" id="uom" name="uom" placeholder="Unit Of M." class="form-control" v>
       </div>

       <div class="form-group spa ">
        <label>Price</label>
        <input type="text" id="price" name="price" placeholder="Price"  class="form-control" >
       </div>

       <div class="form-group spa">
        <label>Gst</label>
        <input type="text" id="gst" name="gst" placeholder="Gst" class="form-control" required>
       </div>
     
        <div class="form-group spa cust" >
        <label>Category</label>
        <input type="text" id="cat" name="cat" placeholder="Category"  class="form-control" >
       </div>

       <div class="form-group spa cust">
        <label>Sale Price</label>
        <input type="text" id="salep" name="salep" placeholder="Sale Price" class="form-control">
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
  var employeeData = $('#employeeList').DataTable({
    "lengthChange":true,
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"action.php",
      type:"POST",
      data:{action:'listitem'},
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
  $('#addEmployee').click(function(){
    $('#employeeModal').modal('show');
    $('#employeeForm')[0].reset();
    $('.modal-title').html("Add User");
    $('.cust').show();
    $('#action').val('addCars');
    $('#save').val('Add');
  

  });   
  $("#employeeList").on('click', '.update', function(){
    var empId = $(this).attr("id");
    var action = 'getitem';
    $.ajax({
      url:'action.php',
      method:"POST",
      data:{empId:empId, action:action},
      dataType:"json",
      success:function(data){
        $('#employeeModal').modal('show');                      
        $('#empId').val(data.id);
        $('#iname').val(data.description);
        $('#uom').val(data.unitofm);
        $('#price').val(data.purchaseprice);
        $('#gst').val(data.gst);
        $('.cust').hide();
        $('.modal-title').html(" Edit Employee");
        $('#action').val('updatenew');
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
  $("#employeeList").on('click', '.delete', function(){
    var empId = $(this).attr("id");   
    var action = "itemDelete";
    if(confirm("Are you sure you want to delete this user?")) {
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