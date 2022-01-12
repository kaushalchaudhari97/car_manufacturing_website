<?php 
require('top.php');
require('dtlink.php');
require("config.php");
//session_start();

$query = "SELECT * FROM supp ORDER BY sname ASC";
$result = mysqli_query($con, $query);

$que="SELECT count(id) As total FROM payment";
 $resu=mysqli_query($con,$que);
 $data=mysqli_fetch_assoc($resu);
 $show=$data['total']+1;
 
?>
<style type="text/css">
   #employeeModal{margin-top: 3%;}
  .modal-body{margin-left:5%;}
 div.dataTables_length label{display: none;} 
#payList_filter{display: none;}
#payList{margin-top: 5%;}

</style>
<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Receipt</h2>
      </div>
    </div><!-- End Breadcrumbs -->
<div class="container "> 
  <div id="employeeModal">
  <div>
    <form method="post" id="employeeForm">
      <div class="modal-content">

        <div class="modal-body">
            <table class="pay">
             
      <tr>
        <td width="250px">No</td>
        <td><input type="number" name="idno" id="no" value="<?php echo $show ?>"></td>
      </tr>

      <tr>
        <td>Date</td>
        <td><input type="Date" name="pdate" id="pdate"></td>
      </tr>

      <tr>
        <td>Supplier</td>
        <td>
    <select name="ehead" id="ehead">
          <?php 
            while($row = mysqli_fetch_array($result))
             {
              echo '<option>'.$row["sname"].'</option>';
                  $pric=$row["price"];
             }
            ?>
      </select>
        </td>
      </tr>
      <tr>
        <td>Amount</td>
       <td><input type="text" name="amount" id="amount"></td>
     
      </tr>
      <tr>
        <td>Pay Mode</td>
      <td>
      <select name="mode" id="mode">
            <option>cash </option>
            <option>online</option>
            <option>cheque</option>
      </select>
      </td>
      </tr>
       <tr>
        <td>Cheque</td>
        <td><input type="Date" name="cd" id="cd"></td>
      </tr>
       <tr>
        <td valign="top">Remark</td>
        <td><textarea rows="5" name="remark" id="remark"></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td>
        <input type="hidden" name="empId" id="empId" />
        <input type="hidden" name="action" id="action" value="" />
        <input type='submit' class="btn btn-danger sh"  name="save" id="save" value="Save" data-dismiss="modal">
      </td>
      </tr>       
  </table>  
       </div>
    </form>
  </div>
</div>

  <table id="payList"class="table tabl-bordered table-striped">
      <thead >
        <tr>
          <th>Sr.No</th>
          <th>Date</th>
          <th>Supplier</th>          
          <th>Amount</th>
          <th>Mode</th>                  
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
    </table>

 <!-- The Modal -->

</div>
  

<?php require('bottom.php');?>

<script type="text/javascript">

  $(document).ready(function(){ 
    $('#employeeForm')[0].reset();
    $('#action').val('addpay');
    $('#save').val('Save');
  var employeeData = $('#payList').DataTable({
    "lengthChange":true,
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"action.php",
      type:"POST",
      data:{action:'listpay'},
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

   
  
  $("#payList").on('click', '.update', function(){
    var empId = $(this).attr("id");
    var action = 'getpay';
    $.ajax({
      url:'action.php',
      method:"POST",
      data:{empId:empId, action:action},
      dataType:"json",
      success:function(data){
        $('#empId').val(data.id);
        $('#no').val(data.id);
        $('#pdate').val(data.pdate);
        $('#ehead').val(data.ehead);
        $('#amount').val(data.amount);
        $('#mode').val(data.mode);        
        $('#cd').val(data.chq_date);
        $('#remark').val(data.remark);
        $('#action').val('updatepay');
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
  $("#payList").on('click', '.delete', function(){
    var empId = $(this).attr("id");   
    var action = "payDelete";
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