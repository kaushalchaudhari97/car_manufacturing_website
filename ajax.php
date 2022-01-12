<?php
session_start();
require("config.php");
require("functions.php");
//require("dbname.php");
foreach ($_GET as $name => $value) { $$name = $value; }
foreach ($_POST as $name => $value) { $$name = $value; }
$sessionid=session_id();
if($act=="login")
{
    $rs=getdata("select * from login where username='$uname' and password='$passw'");
    if($rs[0]=="")
    {
        echo "Invalid user id or password.";
    }
    else
    {
        //$_SESSION['s_location']=$rs['godown'];
        $_SESSION['name']=$rs['name'];
        $_SESSION['userid']=$rs['id'];
        $_SESSION['logged']="y";
        
        
        echo "ok";

    }
}


if($act=="savepass")
{
    $pass=getdata("select password from login where id=".$_SESSION['userid']);
    if($pass[0]==$old_pass)
    {
        if(mysqli_query($con,"update login set password='$new_pass' where id=".$_SESSION['userid']))
        {
            echo "ok";
        }
        else
        {
            echo "Error";
        }
    }
    else
    {
        echo "Wrong old password.";
    }
}

/*----Invoice Page -----*/
if(isset($_POST["id"]))
{
 //$con = mysqli_connect("localhost","root","","car");
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

/*-------invoice end -----*/


?>