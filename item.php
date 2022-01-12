<?php 
require('top.php');
require('dtlink.php');

?>
<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Cars</h2>
      </div>
    </div><!-- End Breadcrumbs -->
<div class="container popup"> 
  
 <span class="d-flex justify-content-end" id="sp"><button type="button" class="btn btn-primary"  name="add" id="addcar">New</button></span>
    <table id="carList"  class="table tabl-bordered table-striped">
     <thead >
        <tr>
          <th>Sr No</th>
          <th>Car name</th>
          <th>Price</th>          
          <th>Modelno</th>
          <th>color</th>
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
            <div class="form-group spa">
              <label  class="control-label">carname</label>
              <input type="text" class="form-control" id="carname" name="carname" placeholder="carname" required>      
            </div>
            <div class="form-group spa">
              <label class="control-label">price</label>              
              <input type="text" class="form-control" id="price" name="price" placeholder="price">              
            </div>      
            <div class="form-group spa">
              <label  class="control-label">Model no</label>              
              <input type="text" class="form-control"  id="modelno" name="modelno" placeholder="Model no" required>              
            </div>   
            
              <div class="form-group spa">
              <label class="control-label">color</label>             
              <input type="text" class="form-control"  id="color" name="color" placeholder="color" required>              
            </div>      
           
      </div>
  
      <div class="modal-footer">
        <input type="hidden" name="empId" id="empId" />
        <input type="hidden" name="action" id="action" value="" />
        <input type='submit' class="btn btn-danger sh"  name="save" id="save" value="Save" data-dismiss="modal">
         
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
  var employeeData = $('#carList').DataTable({
    "lengthChange":true,
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"action.php",
      type:"POST",
      data:{action:'listCar'},
      dataType:"json"
    },
    "columnDefs":[
      {
        "targets":[0, 6],
        "orderable":false,
      },
    ],
    "pageLength":10
  });   
   $('#addcar').click(function(){
    $('#employeeModal').modal('show');
    $('#employeeForm')[0].reset();
    $('.modal-title').html(" Add Car");
    $('#action').val('addCars');
    $('#save').val('Add');
  });   
  
  $("#carList").on('click', '.update', function(){
    var empId = $(this).attr("id");
    var action = 'getCar';
    $.ajax({
      url:'action.php',
      method:"POST",
      data:{empId:empId, action:action},
      dataType:"json",
      success:function(data){
        $('#employeeModal').modal('show');
        $('#empId').val(data.id);
        $('#carname').val(data.car_name);
        $('#price').val(data.price);
        $('#modelno').val(data.model_no);       
        $('#color').val(data.color);
        $('.modal-title').html(" Edit Car");
        $('#action').val('updateCar');
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
  $("#carList").on('click', '.delete', function(){
    var empId = $(this).attr("id");   
    var action = "carDelete";
    if(confirm("Are you sure you want to delete this employee?")) {
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