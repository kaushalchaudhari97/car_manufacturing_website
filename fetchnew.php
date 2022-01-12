<?php
if(isset($_POST["id"]))
{
 $con = mysqli_connect("localhost","root","","car");
 $query = "SELECT * FROM orders WHERE id = '".$_POST["id"]."'";
 $result = mysqli_query($con, $query);
 while($row = mysqli_fetch_array($result))
 {

  $data["order_date"] = $row["order_date"];
  $data["email"] = $row["email"];
  $data["cust_name"] = $row["cust_name"];
  $data["address"] = $row["address"];
  $data["mobile_no"] = $row["mobile_no"];
  $data["pincode"] = $row["pincode"];
  $data["cname"] = $row["cname"];
  $data["price"] = $row["price"];
  $data["order_id"] = $row["order_id"];
  $data["qty"] = $row["qty"];
  $data["total"] = $row["total"];

  
 }

 echo json_encode($data);
}

?>