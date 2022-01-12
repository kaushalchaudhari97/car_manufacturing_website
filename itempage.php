<?php 
require('top.php');
require('dtlink.php');
?>
<div class="container">	
	
	<span class="d-flex justify-content-end" id="sp"><button type="button" class="btn btn-primary"  name="add" id="additem">New</button></span>
		
		<table id="CustList" class="table table-striped table-hover">
			<thead >
				<tr>
					<th>Sr.No</th>
					<th>iname</th>
					<th>uom</th>					
					<th>price</th>
					<th>gst</th>									
					<th>edit</th>
					<th>delete</th>

					

				</tr>
			</thead>
		</table>
	</div>
	<div id="employeeModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="employeeForm">
    			<div class="modal-content">

    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit User</h4>
    				</div>

    				<div class="modal-body">
						<div class="form-group">
							<label for="name" class="control-label">cname</label>
							<input type="text" class="form-control" id="cname" name="des" placeholder="came" required>			
						</div>
						<div class="form-group">
							<label for="age" class="control-label">caddr</label>							
							<input type="text" class="form-control" id="caddr" name="uom" placeholder="Caddr">							
						</div>	   	
						<div class="form-group">
							<label for="lastname" class="control-label">Email</label>							
							<input type="text" class="form-control"  id="email" name="price" placeholder="Email" required>							
						</div>	 
						<div class="form-group">
							<label for="address" class="control-label">Mobile</label>							
							<input  type="text" class="form-control"  id="mobile" name="gst" placeholder="Mobile">							
						</div>
						
											
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="empId" id="empId" />
    					<input type="hidden" name="action" id="action" value="" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
</div>	
<script type="text/javascript">
	$(document).ready(function(){	
	var employeeData = $('#CustList').DataTable({
		"lengthChange":true,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listcust'},
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
	$('#addEmployee').click(function(){
		$('#employeeModal').modal('show');
		$('#employeeForm')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Employee");
		$('#action').val('addcusto');
		$('#save').val('Add');
			$('.cust').show();
	});		
	$("#CustList").on('click', '.update', function(){
		var empId = $(this).attr("id");
		var action = 'getcust';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{empId:empId, action:action},
			dataType:"json",
			success:function(data){
				$('#employeeModal').modal('show');
				$('#empId').val(data.id);
				$('#cname').val(data.description);
				$('#caddr').val(data.unitofm);
				$('#email').val(data.purchaseprice);				
				$('#mobile').val(data.gst);
				$('.cust').hide();
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit Employee");
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
	$("#CustList").on('click', '.delete', function(){
		var empId = $(this).attr("id");		
		var action = "custDelete";
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
<?php require('bottom.php');?>
