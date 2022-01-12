<?php
//session_start();
require("config.php");
require("dbname.php");
//$sqlSource = file_get_contents('insert.sql');
//mysqli_multi_query($sql,$sqlSource);


function getdata($query)
{
$con=mysqli_connect("localhost","root","","car");
	if(!mysqli_query($con,$query)){echo mysqli_error($con)." ".$query;}
 	$getdata=mysqli_fetch_array(mysqli_query($con,$query));
 	return $getdata;
}

function redirect($url)
{
echo("<script language='javascript'>self.location='$url'</script>");
}

?>