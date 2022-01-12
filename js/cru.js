$(document).ready(function(){	
	var employeeData = $('#employeeList').DataTable({
		"lengthChange":true,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listEmployee'},
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
		$('#action').val('addEmployee');
		$('#save').val('Add');
	

	});		
	$("#employeeList").on('click', '.update', function(){
		var empId = $(this).attr("id");
		var action = 'getEmployee';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{empId:empId, action:action},
			dataType:"json",
			success:function(data){
				$('#employeeModal').modal('show');											
				$('#empId').val(data.id);
				$('#empName').val(data.username);
				$('#empAge').val(data.name);
				$('.empSkills').hide();			
				$('#address').val(data.email);
				$('#mobile_no').val(data.mobile_no);
				$('.modal-title').html(" Edit Employee");
				$('#action').val('updateEmployee');
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
		var action = "empDelete";
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