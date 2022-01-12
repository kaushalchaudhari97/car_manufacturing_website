<?php
include('Employee.php');
$emp = new Employee();
if(!empty($_POST['action']) && $_POST['action'] == 'listEmployee') {
	$emp->employeeList();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addEmployee') {
	$emp->addEmployee();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getEmployee') {
	$emp->getEmployee();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateEmployee') {
	$emp->updateEmployee();
}
if(!empty($_POST['action']) && $_POST['action'] == 'empDelete') {
	$emp->deleteEmployee();
}


/* company */
if(!empty($_POST['action']) && $_POST['action'] == 'listComp') {
	$emp->companyList();
}  
if(!empty($_POST['action']) && $_POST['action'] == 'getComp') {
	$emp->getComp();
}
if(!empty($_POST['action']) && $_POST['action'] == 'compaup') {
	$emp->compaup();
}
/* car */
if(!empty($_POST['action']) && $_POST['action'] == 'listCar') {
	$emp->carList(); 
}
if(!empty($_POST['action']) && $_POST['action'] == 'addCars') {
	$emp->additem();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getCar') {
	$emp->getCar();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateCar') {
	$emp->updateCar();
}
if(!empty($_POST['action']) && $_POST['action'] == 'carDelete') {
	$emp->deleteCar();
}


/*   ---- end  */

/*   Customer   */
if(!empty($_POST['action']) && $_POST['action'] == 'listcust') {
	$emp->custList();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addcusto') {
	$emp->addCust();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getcust') {
	$emp->getcust();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updatecust') {
	$emp->updatecust();
}
if(!empty($_POST['action']) && $_POST['action'] == 'custDelete') {
	$emp->deletecust();
}

/*   supplier  */
if(!empty($_POST['action']) && $_POST['action'] == 'listsupp') {
	$emp->suppList();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addsupp') {
	$emp->addsupp();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getsupp') {
	$emp->getsupp();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updatesupp') {
	$emp->updatesupp();
}
if(!empty($_POST['action']) && $_POST['action'] == 'suppDelete') {
	$emp->deletesupp();
}

/*   Bank  */
if(!empty($_POST['action']) && $_POST['action'] == 'listbank') {
	$emp->bankList();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addbank') {
	$emp->addbank();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getbank') {
	$emp->getbank();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updatebank') {
	$emp->updatebank();
}
if(!empty($_POST['action']) && $_POST['action'] == 'bankDelete') {
	$emp->deletebank();
}

/*   Transporter  */
if(!empty($_POST['action']) && $_POST['action'] == 'listtran') {
	$emp->tranList();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addtran') {
	$emp->addtran();
}
if(!empty($_POST['action']) && $_POST['action'] == 'gettran') {
	$emp->gettran();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updatetran') {
	$emp->updatetran();
}
if(!empty($_POST['action']) && $_POST['action'] == 'tranDelete') {
	$emp->deletetran();
}

/*  Payments  */
if(!empty($_POST['action']) && $_POST['action'] == 'listpay') {
	$emp->payList();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addpay') {
	$emp->addpay();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getpay') {
	$emp->getpay();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updatepay') {
	$emp->updatepay();
}
if(!empty($_POST['action']) && $_POST['action'] == 'payDelete') {
	$emp->deletepay();
}

/* Items list */
if(!empty($_POST['action']) && $_POST['action'] == 'listitem') {
	$emp->itemList();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addit') {
	$emp->addit();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getitem') {
	$emp->getitem();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updatenew') {
	$emp->updatenew();
}
if(!empty($_POST['action']) && $_POST['action'] == 'itemDelete') {
	$emp->deleteitem();
}
/*----Order  -----*/

if(!empty($_POST['action']) && $_POST['action'] == 'addorder') {
	$emp->addorder();
}

if(isset($_POST["id"]))
{
  $con = mysqli_connect("localhost","root","","car");
 $query = "SELECT * FROM cars WHERE id = '".$_POST["id"]."'";
 $result = mysqli_query($con, $query);
 while($row = mysqli_fetch_array($result))
 {

  $data["price"] = $row["price"]; 
  $data["car_name"] = $row["car_name"]; 
  $data["model_no"] = $row["model_no"]; 
   
 }

 echo json_encode($data);
}

session_start();

if(isset($_POST["action"]))
{
 if($_POST["action"] == "add")
 {
  $product_id = $_POST["product_id"];
  $product_name = $_POST["product_name"];
  $product_price = $_POST["product_price"];
  for($count = 0; $count < count($product_id); $count++)
  {
   $cart_product_id = array_keys($_SESSION["shopping_cart"]);
   if(in_array($product_id[$count], $cart_product_id))
   {
    $_SESSION["shopping_cart"][$product_id[$count]]['product_quantity']++;
   }
   else
   {
    $item_array = array(
     'product_id'               =>     $product_id[$count],  
     'product_name'             =>     $product_name[$count],
     'product_price'            =>     $product_price[$count],
     'product_quantity'         =>     1
    );

    $_SESSION["shopping_cart"][$product_id[$count]] = $item_array;

    
   }
  }
 }

 if($_POST["action"] == 'remove')
 {
  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
   if($values["product_id"] == $_POST["product_id"])
   {
    unset($_SESSION["shopping_cart"][$keys]);
   }
  }
 }
 if($_POST["action"] == 'empty')
 {
  unset($_SESSION["shopping_cart"]);
 }
}
/*------order end ---*/
?>