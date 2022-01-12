<?php
require("top.php");
require("config.php");
$query = "SELECT * FROM orders ORDER BY cust_name ASC";
$result = mysqli_query($con, $query);
$randno=rand(0,500000);

?>
<style type="text/css">
    
     #employee_list{margin-left: 80%;margin-top: 5%;margin-right: 1%;}
    .invoice{display:none;}


</style>

<style media="print">
button {display:none}
#header ,#employee_list ,#search ,#save ,#footer{display: none;}

</style>

<div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Invoice</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  
<select name="employee_list" id="employee_list" style="padding: 2px; border-radius: 5px;">
                             <option value="">Order-Id</option>
                             <?php 
                             while($row = mysqli_fetch_array($result))
                             {
                              echo '<option value="'.$row["id"].'">'.$row["order_id"].'</option>';
                                  $pric=$row["price"];
                             }
                             ?>
                          </select>
     <button type="button" class="btn btn-primary" name="search" id="search" >Search</button>

    	<div class="container invoice">
        
        <div class="brand-section" >
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Cars</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                       <!-- <p class="text-white">Cars Manufactures</p>
                        <p class="text-white">Pune</p>
                        <p class="text-white">+91 888555XXXX</p>-->
                        <span class="d-flex justify-content-end" id="sp">
                          
                            <button type='button' onclick="window.print()" style="background:none;border: none;font-size:17pt;"><i class="fa fa-print"></i></button>
                              <button type='button' style="background:none;border: none;font-size:17pt;"><i class="fa fa-times" onClick="document.location.reload(true)"></i></button>
                        </span>

                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <h2 class="heading">Invoice No: <?php echo $randno;?><span id="invoice"></span></h2> 
                 <p class="sub-heading">Order-Id <span id="order_no"></span> </p>         
                    <p class="sub-heading">Order Date- <span id="date"></span> </p>
                    <p class="sub-heading">Email Address- <span id="email"></span> </p>
                   

                </div>
                <div class="col-6 cust-detail">
                    <p class="sub-heading">Full Name- <span id="name"></span></p>
                    <p class="sub-heading">Address- <span id="address"></span></p>
                    <p class="sub-heading">Phone Number-<span id="mo_no"></span></p>
                    <p class="sub-heading">Pincode-<span id="pin"></span></p>

                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
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
                        <td><span id="cname"></span></td>
                        <td><span id="price"></span></td>                        
                        <td><span id="qty"></span></td>
                        <td><span id="total"></span></td>
                    </tr>
                   
                </tbody>
            </table>
            <br>

           <div class="row">
                <div class="col-6">
                  <h6 class="heading"></h6>
                </div>

                <div class="col-6 company-details">
                  <button type="button" class="btn btn-primary"  name="add" id="save">Save</button>
                </div>
            </div>
        </div>
  
    </div>        	
    </section>
</div>
   
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
    $('.invoice').css("display", "block");
     $('#date').text(data.order_date);
     $('#email').text(data.email);
     $('#name').text(data.cust_name);
     $('#address').text(data.address);
     $('#mo_no').text(data.mobile_no);
     $('#pin').text(data.pincode);
      $('#cname').text(data.cname); 
    $('#price').text(data.price);
    $('#order_no').text(data.order_id); 
     $('#qty').text(data.qty);
    $('#total').text(data.total);  

    }
   })
  }
  else
  {
   alert("Please Select Order-Id");
  
  }
 });
 
});
</script>
       
<?php
require("bottom.php");
?>