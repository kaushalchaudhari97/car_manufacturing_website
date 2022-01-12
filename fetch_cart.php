<?php

session_start();
$total_price = 0;
$total_item = 0;
require("config.php");
$query = "SELECT * FROM supp ORDER BY sname ASC";
$result = mysqli_query($con, $query);
?>
<style type="text/css">
    tr{margin-bottom: 5%;}
</style>
<div class="table-responsive panel-body" >
 <table class="table table-striped">
        <tr>  
            <td>Bill no</td>
            <td><input type="text" name="bill"></td>    
            <td>Date</td>    
            <td><input type="date" name="purdate"></td>    
        </tr>
         <tr>  
            <td>Supplier</td>
            <td>
               <select name="supname" id="supname">
             <?php 
                             while($row = mysqli_fetch_array($result))
                             {
                              echo '<option value="'.$row["id"].'">'.$row["sname"].'</option>';
                             }
                             ?>
            
              
            </select>

        </td>
            <td>Party bill no</td>    
            <td><input type="number" name="pbn"></td>    

        </tr>
        </table>
        </div>    
<?php
$output = '

<div class="table-responsive" id="order_table">
 <table class="table table-bordered table-striped">
  <tr>  
            <th width="40%">Product Name</th>  
            <th width="10%">Quantity</th>  
            <th width="20%">Price</th>  
            <th width="15%">Total</th>  
            <th width="5%">Action</th>  
        </tr>
';
if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
  $output .= '
  <tr>
   <td><input type="text" name="proname" value="'.$values["product_name"].'"></td>

   <td>'.$values["product_quantity"].'</td>
   <td align="right">'.$values["product_price"].'</td>
   <td align="right">'.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
   <td><button name="delete" class=" delete" id="'. $values["product_id"].'"><span class="fa fa-trash"></button></td>
  </tr>
  ';
  $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
  //$total_item = $total_item + 1;
        $_SESSION['tot']=$total_price ;
          // $_SESSION['prname']=trim($_POST['proname']);
         $pr_name=$values["product_name"];
          //$_SESSION['prname']=$pr_name;
 }
 $output .= '
 <tr>  
        <td colspan="3" align="right">Totall</td>  
        <td  class="tot"><input type="text"  value='.number_format($total_price, 2).' style="text-align: right;" name="tot"></td> 
        <td>
         <span><a href="pay.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> </span> 
        </td>  
    </tr> 
 ';
}
else
{
 $output .= '
    <tr>
     <td colspan="5" align="center">
      Your Cart is Empty!
     </td>
    </tr>
    ';
}
$output .= '</table></div>';

echo $output;

?>
<!--
   <td><input type="number" value="'.$values["product_quantity"].'"></td>
   <td>'.$values["product_name"].'</td>
   
    <script type="text/javascript">
       $(document).ready(function(){
         $(".fa").hide();
         $("#save").click(function(){
         $("#save").hide();
         $(".fa").show();

         })
       })
    </script> -->