<?php
require("top.php");
require("config.php");
$query = "SELECT * FROM cars ORDER BY car_name ASC";
$result = mysqli_query($con, $query);
$randno=rand(0,500000);

?>


<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Order</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  
        <div class="container invoice order">
     <div id="employeeModal">
  <div>
    <form method="post" id="employeeForm"> 
        <div class="brand-section" >
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Cars</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                      
                        <span class="d-flex justify-content-end" id="sp">
                         
                            <button type='button' onclick="window.print()" style="background:none;border: none;font-size:17pt;"><i class="fa fa-print"></i></button>
                             
                        </span>

                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <h2 class="heading">Order-Id: <input type="text" name="order_id" value="<?php echo 'Id'.$randno;?>"></h2> 
                       
                    <p class="sub-heading">Order Date- <input type="date" name="order_date" id="date"></p>
                    <p class="sub-heading">Email Address-<input type="Email" name="email" id="email"></p>
                   

                </div>
                <div class="col-6 cust-detail">
                    <p class="sub-heading">Full Name-<input type="text" name="cust_name" id="name" ></p>
                    <p class="sub-heading">Address- <input type="text" name="address" id="address" ></p>
                    <p class="sub-heading">Phone Number-<input type="Number" name="mobile_no" id="no" ></p>
                    <p class="sub-heading">Pincode-<input type="Number" name="pincode" id="pin" ></p>

                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items 
                <span style="float: right; width:20%">
                    <select name="cname" id="employee_list" style="padding: 2px; border-radius: 5px;font-size: 13pt;">
                             <option value="">Select Car</option>
                             <?php 
                             while($row = mysqli_fetch_array($result))
                             {
                              echo '<option value="'.$row["id"].'">'.$row["car_name"].'</option>';
                                  $pric=$row["price"];
                             }
                             ?>
                          </select>
                      </span>
                  </h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Car Name</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <td><input type="text" name="cname" id="car" ></td>  
                                                                         
                        <td><input type="text" name="price" id="price"></td>                        
                        <td><input type="Number" name="qty" id="qty" onchange="calculateAmount(this.value)"></td>
                        <td><input type="Number" name="total" id="total"></td>
                    </tr>
                   
                </tbody>
            </table>
            <br>

           <div class="row">
                <div class="col-6">
                  <h6 class="heading"></h6>
                </div>

                <div class="col-6 company-details">
                  <!--<button type="button" class="btn btn-primary" name="submit" >Save</button>-->
               <input type="submit" name="save" class="btn btn-primary" value="save" id="save">
                </div>
            </div>
        </div>
     
  </form>

    </div>          
    </section>
</div>

   <script type="text/javascript">
$(document).ready(function(){

     $('#employeeForm')[0].reset();
    $('#action').val('addorder');
    $('#save').val('Save');
    
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

 $('#car').click(function(){
  var id= $('#employee_list').val();
  if(id != '')
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{id:id},
    dataType:"JSON",
    success:function(data)
    {
     $('#price').val(data.price); 
     $('#model_no').val(data.model_no);  
     $('#car').val(data.car_name);     

    }
   })
  }
  else
  {
   alert("Please Select Order-Id");
  
  }
 });
 
 
});
function calculateAmount(val) {
                var pri=$('#price').val();
                
                var tot_price = val * pri;
                /*display the result*/
                var result = document.getElementById('total');
                result.value = tot_price;
            }
</script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
       
<?php
require("bottom.php");
?>