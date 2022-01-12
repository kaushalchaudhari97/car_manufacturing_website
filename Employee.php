<?php
require('datatconfig.php');
class Employee extends Dbconfig {	
    protected $hostName;
    protected $userName;
    protected $password;
	protected $dbName;
	private $empTable = 'login';
	private $compTab = 'company';
	private $carTab = 'cars';
	private $cust = 'customer';



	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 		
			$database = new dbConfig();            
            $this -> hostName = $database -> serverName;
            $this -> userName = $database -> userName;
            $this -> password = $database ->password;
			$this -> dbName = $database -> dbName;			
            $conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else{
                $this->dbConnect = $conn;
            }
        }
    }
	 function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	 function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	} 	
	 function employeeList(){		
		$sqlQuery = "SELECT * FROM ".$this->empTable." ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR username LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR name LIKE "%'.$_POST["search"]["value"].'%" ';
			//$sqlQuery .= ' OR password LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR email LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		
		$sqlQuery1 = "SELECT * FROM ".$this->empTable." ";
		$result1 = mysqli_query($this->dbConnect, $sqlQuery1);
		$numRows = mysqli_num_rows($result1);
		$sr=1;
		$employeeData = array();	
		while( $employee = mysqli_fetch_assoc($result) ) {	
			
			$empRows = array();			
			$empRows[] = $sr;
			$empRows[] = ucfirst($employee['username']);
			$empRows[] = $employee['name'];		
			//$empRows[] = $employee['password'];	
			$empRows[] = $employee['email'];
			$empRows[] = $employee['mobile_no'];
			$empRows[] = '<button type="button" name="update" id="'.$employee["id"].'" class="update btn btn-warning"><span class=" fa fa-pencil"></button>';
			$empRows[] = '<button type="button" name="delete" id="'.$employee["id"].'" class="btn btn-danger delete" ><span class="fa fa-trash"></button>';
			$employeeData[] = $empRows;
           $sr++;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$employeeData
		);
		echo json_encode($output);
	}
	 function getEmployee(){
		if($_POST["empId"]) {
			$sqlQuery = "
				SELECT * FROM ".$this->empTable." 
				WHERE id = '".$_POST["empId"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo json_encode($row);
		}
	}
	 function updateEmployee(){
		if($_POST['empId']) {	
			$updateQuery = "UPDATE ".$this->empTable." 
			SET  username= '".$_POST["empName"]."', name = '".$_POST["empAge"]."',email = '".$_POST["address"]."',mobile_no = '".$_POST["mobile_no"]."'
			WHERE id ='".$_POST["empId"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}
	 function addEmployee(){
		$insertQuery = "INSERT INTO ".$this->empTable." (username, name, password, email,mobile_no) 
			VALUES ('".$_POST["empName"]."', '".$_POST["empAge"]."', '".$_POST["empSkills"]."', '".$_POST["address"]."','".$_POST["mobile_no"]."')";
		$isUpdated = mysqli_query($this->dbConnect, $insertQuery);		
	}
	 function deleteEmployee(){
		if($_POST["empId"]) {
			$sqlDelete = "
				DELETE FROM ".$this->empTable."
				WHERE id = '".$_POST["empId"]."'";		
			mysqli_query($this->dbConnect, $sqlDelete);		
		}
	}

/*   Company Page_____  */
	 function companyList(){		
		$sqlQuery = "SELECT * FROM ".$this->compTab." ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR cname LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR caddr LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR email LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR mobile LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		
		$sqlQuery1 = "SELECT * FROM ".$this->compTab." ";
		$result1 = mysqli_query($this->dbConnect, $sqlQuery1);
		$numRows = mysqli_num_rows($result1);
		$sr=1;
		$employeeData = array();	
		while( $employee = mysqli_fetch_assoc($result) ) {	
			
			$empRows = array();			
			$empRows[] = $sr;
			$empRows[] = ucfirst($employee['cname']);
			$empRows[] = $employee['caddr'];		
			$empRows[] = $employee['email'];	
			$empRows[] = $employee['mobile'];
			$empRows[] = $employee['pan'];
			$empRows[] = $employee['gstn'];
			$empRows[] = $employee['state_code'];

			$empRows[] = '<button type="button" name="update" id="'.$employee["id"].'" class="update btn btn-warning"><span class=" fa fa-pencil"></button>';
			
			$employeeData[] = $empRows;
           $sr++;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$employeeData
		);
		echo json_encode($output);
	}
     function getComp(){
		if($_POST["empId"]) {
			$sqlQuery = "
				SELECT * FROM ".$this->compTab." 
				WHERE id = '".$_POST["empId"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo json_encode($row);
		}
	}
	 function compaup(){
		if($_POST['empId']) {	
			$updateQuery = "UPDATE ".$this->compTab." 
			SET  cname= '".$_POST["un"]."', caddr = '".$_POST["ui"]."', email = '".$_POST["up"]."', mobile = '".$_POST["em"]."',pan = '".$_POST["mo"]."',gstn = '".$_POST["gst"]."',state_code = '".$_POST["statecode"]."'
			WHERE id ='".$_POST["empId"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);	
				
		}	
	}

	/*   ----- cars ------*/
	 function carList(){		
		$sqlQuery = "SELECT * FROM ".$this->carTab." ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR car_name LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR price LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR model_no LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR color LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		
		$sqlQuery1 = "SELECT * FROM ".$this->carTab." ";
		$result1 = mysqli_query($this->dbConnect, $sqlQuery1);
		$numRows = mysqli_num_rows($result1);
		$sr=1;
		$employeeData = array();	
		while( $employee = mysqli_fetch_assoc($result) ) {		
			$empRows = array();			
				$empRows[] = $sr;
			$empRows[] = ucfirst($employee['car_name']);
			$empRows[] = $employee['price'];		
			$empRows[] = $employee['model_no'];	
			$empRows[] = $employee['color'];
			$empRows[] = '<button type="button" name="update" id="'.$employee["id"].'" class="update btn btn-warning"><span class=" fa fa-pencil"></button>';
			$empRows[] = '<button type="button" name="delete" id="'.$employee["id"].'" class="btn btn-danger delete" ><span class="fa fa-trash"></button>';
			$employeeData[] = $empRows;
			$sr++;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$employeeData
		);
		echo json_encode($output);
	}
	 function getCar(){
		if($_POST["empId"]) {
			$sqlQuery = "
				SELECT * FROM ".$this->carTab." 
				WHERE id = '".$_POST["empId"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo json_encode($row);
		}
	}
	 function updateCar(){
		if($_POST['empId']) {	
			$updateQuery = "UPDATE ".$this->carTab." 
			SET  car_name= '".$_POST["carname"]."', price = '".$_POST["price"]."', model_no = '".$_POST["modelno"]."', color = '".$_POST["color"]."'
			WHERE id ='".$_POST["empId"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}
	 function additem(){
		$insertQuery = "INSERT INTO ".$this->carTab." (`car_name`, `price`, `model_no`, `color`) 
		VALUES ('".$_POST["carname"]."', '".$_POST["price"]."', '".$_POST["modelno"]."', '".$_POST["color"]."')";
		$isUpdated = mysqli_query($this->dbConnect, $insertQuery);		
	}
	 function deleteCar(){
		if($_POST["empId"]) {
			$sqlDelete = "
				DELETE FROM ".$this->carTab."
				WHERE id = '".$_POST["empId"]."'";		
			mysqli_query($this->dbConnect, $sqlDelete);		
		}
	}

	/*   customer   */
   
     public function custList(){		
		$sqlQuery = "SELECT * FROM ".$this->cust." ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR cname LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR caddr LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR email LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR mobile LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		
		$sqlQuery1 = "SELECT * FROM ".$this->cust." ";
		$sqlQuery1 = "SELECT DISTINCT (cust_name) FROM orders ";
        
		$result1 = mysqli_query($this->dbConnect, $sqlQuery1);
		$numRows = mysqli_num_rows($result1);
		$sr=1;
		
		$employeeData = array();	
		while( $employee = mysqli_fetch_assoc($result) ) {		
			$empRows = array();			
			$empRows[] = $sr;
			
			$empRows[] = ucfirst($employee['cname']);
			$empRows[] = $employee['caddr'];		
			$empRows[] = $employee['email'];	
			$empRows[] = $employee['mobile'];
            $empRows[] = '<button type="button" name="update" id="'.$employee["id"].'" class="update btn btn-warning"><span class=" fa fa-pencil"></button>';
			$empRows[] = '<button type="button" name="delete" id="'.$employee["id"].'" class="btn btn-danger delete" ><span class="fa fa-trash"></button>';
			$employeeData[] = $empRows;
			$sr++;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$employeeData
		);
		echo json_encode($output);
	}
	public function getcust(){
		if($_POST["empId"]) {
			$sqlQuery = "
				SELECT * FROM ".$this->cust." 
				WHERE id = '".$_POST["empId"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo json_encode($row);
		}
	}
	public function updatecust(){
		if($_POST['empId']) {	
			$updateQuery = "UPDATE ".$this->cust." 
			SET  cname= '".$_POST["cname"]."', caddr = '".$_POST["caddr"]."', email = '".$_POST["email"]."', mobile = '".$_POST["mobile"]."'
			WHERE id ='".$_POST["empId"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}
	

	function addCust(){
		$insertQuery = "INSERT INTO ".$this->cust." (`cname`, `caddr`, `email`, `mobile`, `gstn_no`, `pan_no`, `state_code`, `age`, `gender`) 
		VALUES ('".$_POST["cname"]."', '".$_POST["caddr"]."', '".$_POST["email"]."', '".$_POST["mobile"]."', '".$_POST["gst"]."', '".$_POST["pan"]."', '".$_POST["state_code"]."', '".$_POST["age"]."', '".$_POST["gender"]."')";
		$isUpdated = mysqli_query($this->dbConnect, $insertQuery);		
	}
	public function deletecust(){
		if($_POST["empId"]) {
			$sqlDelete = "
				DELETE FROM ".$this->cust."
				WHERE id = '".$_POST["empId"]."'";		
			mysqli_query($this->dbConnect, $sqlDelete);		
		}
	}
	/*  customer end */


	/*   Supplier   */
   
     public function suppList(){		
		$sqlQuery = "SELECT * FROM supp ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR sname LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR saddr LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR email LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR mobile LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		
		$sqlQuery1 = "SELECT * FROM supp ";
        
		$result1 = mysqli_query($this->dbConnect, $sqlQuery1);
		$numRows = mysqli_num_rows($result1);
		$sr=1;
		
		$employeeData = array();	
		while( $employee = mysqli_fetch_assoc($result) ) {		
			$empRows = array();			
			$empRows[] = $sr;
			
			$empRows[] = ucfirst($employee['sname']);
			$empRows[] = $employee['saddr'];		
			$empRows[] = $employee['email'];	
			$empRows[] = $employee['mobile'];
            $empRows[] = '<button type="button" name="update" id="'.$employee["id"].'" class="update btn btn-warning"><span class=" fa fa-pencil"></button>';
			$empRows[] = '<button type="button" name="delete" id="'.$employee["id"].'" class="btn btn-danger delete" ><span class="fa fa-trash"></button>';
			$employeeData[] = $empRows;
			$sr++;

		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$employeeData
		);
		echo json_encode($output);
	}
	public function getsupp(){
		if($_POST["empId"]) {
			$sqlQuery = "
				SELECT * FROM supp 
				WHERE id = '".$_POST["empId"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo json_encode($row);
		}
	}
	public function updatesupp(){
		if($_POST['empId']) {	
			$updateQuery = "UPDATE supp
			SET  sname= '".$_POST["sname"]."', saddr = '".$_POST["saddr"]."', email = '".$_POST["email"]."', mobile = '".$_POST["mobile"]."'
			WHERE id ='".$_POST["empId"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}
	

	function addsupp(){
		$insertQuery = "INSERT INTO supp (`sname`, `saddr`, `email`, `mobile`, `gstn_no`, `pan_no`, `state_code`) 
		VALUES ('".$_POST["sname"]."', '".$_POST["saddr"]."', '".$_POST["email"]."', '".$_POST["mobile"]."', '".$_POST["gst"]."', '".$_POST["pan"]."', '".$_POST["state_code"]."')";
		$isUpdated = mysqli_query($this->dbConnect, $insertQuery);		
	}
	public function deletesupp(){
		if($_POST["empId"]) {
			$sqlDelete = "
				DELETE FROM supp
				WHERE id = '".$_POST["empId"]."'";		
			mysqli_query($this->dbConnect, $sqlDelete);		
		}
	}
	/*  customer end */
    
    /*   Bank   */
   
     public function bankList(){		
		$sqlQuery = "SELECT * FROM bank ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR bankname LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR branch LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR acno LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR isfc LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		
		$sqlQuery1 = "SELECT * FROM bank ";
        
		$result1 = mysqli_query($this->dbConnect, $sqlQuery1);
		$numRows = mysqli_num_rows($result1);
		$sr=1;
		
		$employeeData = array();	
		while( $employee = mysqli_fetch_assoc($result) ) {		
			$empRows = array();			
			$empRows[] = $sr;
			
			$empRows[] = ucfirst($employee['bankname']);
			$empRows[] = $employee['branch'];		
			$empRows[] = $employee['acno'];	
			$empRows[] = $employee['isfc'];
            $empRows[] = '<button type="button" name="update" id="'.$employee["id"].'" class="update btn btn-warning"><span class=" fa fa-pencil"></button>';
			$empRows[] = '<button type="button" name="delete" id="'.$employee["id"].'" class="btn btn-danger delete" ><span class="fa fa-trash"></button>';
			$employeeData[] = $empRows;
			$sr++;

		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$employeeData
		);
		echo json_encode($output);
	}
	public function getbank(){
		if($_POST["empId"]) {
			$sqlQuery = "
				SELECT * FROM bank 
				WHERE id = '".$_POST["empId"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo json_encode($row);
		}
	}
	public function updatebank(){
		if($_POST['empId']) {	
			$updateQuery = "UPDATE bank
			SET  bankname= '".$_POST["bname"]."', branch = '".$_POST["branch"]."', acno = '".$_POST["an"]."', isfc = '".$_POST["ifsc"]."'
			WHERE id ='".$_POST["empId"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}
	

	function addbank(){
		$insertQuery = "INSERT INTO bank ( `bankname`, `branch`, `acno`, `isfc`) 
		VALUES ('".$_POST["bname"]."', '".$_POST["branch"]."', '".$_POST["an"]."', '".$_POST["ifsc"]."')";
		$isUpdated = mysqli_query($this->dbConnect, $insertQuery);		
	}
	public function deletebank(){
		if($_POST["empId"]) {
			$sqlDelete = "
				DELETE FROM bank
				WHERE id = '".$_POST["empId"]."'";		
			mysqli_query($this->dbConnect, $sqlDelete);		
		}
	}
	/*  customer end */

	
	/*   Transporter   */
   
     public function tranList(){		
		$sqlQuery = "SELECT * FROM transporter ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR tname LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR taddr LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR email LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR mobile LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		
		$sqlQuery1 = "SELECT * FROM transporter ";
        
		$result1 = mysqli_query($this->dbConnect, $sqlQuery1);
		$numRows = mysqli_num_rows($result1);
		$sr=1;
		
		$employeeData = array();	
		while( $employee = mysqli_fetch_assoc($result) ) {		
			$empRows = array();			
			$empRows[] = $sr;
			
			$empRows[] = ucfirst($employee['tname']);
			$empRows[] = $employee['taddr'];		
			$empRows[] = $employee['email'];	
			$empRows[] = $employee['mobile'];
            $empRows[] = '<button type="button" name="update" id="'.$employee["id"].'" class="update btn btn-warning"><span class=" fa fa-pencil"></button>';
			$empRows[] = '<button type="button" name="delete" id="'.$employee["id"].'" class="btn btn-danger delete" ><span class="fa fa-trash"></button>';
			$employeeData[] = $empRows;
			$sr++;

		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$employeeData
		);
		echo json_encode($output);
	}
	public function gettran(){
		if($_POST["empId"]) {
			$sqlQuery = "
				SELECT * FROM transporter 
				WHERE id = '".$_POST["empId"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo json_encode($row);
		}
	}
	public function updatetran(){
		if($_POST['empId']) {	
			$updateQuery = "UPDATE transporter
			SET  tname= '".$_POST["tname"]."', taddr = '".$_POST["taddr"]."', email = '".$_POST["email"]."', mobile = '".$_POST["mobile"]."'
			WHERE id ='".$_POST["empId"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}
	

	function addtran(){
		$insertQuery = "INSERT INTO transporter (`tname`, `taddr`, `email`, `mobile`) 
		VALUES ('".$_POST["tname"]."', '".$_POST["taddr"]."', '".$_POST["email"]."', '".$_POST["mobile"]."')";
		$isUpdated = mysqli_query($this->dbConnect, $insertQuery);		
	}
	public function deletetran(){
		if($_POST["empId"]) {
			$sqlDelete = "
				DELETE FROM transporter
				WHERE id = '".$_POST["empId"]."'";		
			mysqli_query($this->dbConnect, $sqlDelete);		
		}
	}
	/*  customer end */

	/*   Payments   */
   
      function payList(){		
		$sqlQuery = "SELECT * FROM payment ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR date LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR ehead LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR amount LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR mode LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		
		$sqlQuery1 = "SELECT * FROM payment ";
        
		$result1 = mysqli_query($this->dbConnect, $sqlQuery1);
		$numRows = mysqli_num_rows($result1);
		$sr=1;
		
		$employeeData = array();	
		while( $employee = mysqli_fetch_assoc($result) ) {		
			$empRows = array();			
			$empRows[] = $sr;
			
			$empRows[] = $employee['pdate'];
			$empRows[] = $employee['ehead'];		
			$empRows[] = $employee['amount'];	
			$empRows[] = $employee['mode'];
            $empRows[] = '<button type="button" name="update" id="'.$employee["id"].'" class="update btn btn-warning"><span class=" fa fa-pencil"></button>';
			$empRows[] = '<button type="button" name="delete" id="'.$employee["id"].'" class="btn btn-danger delete" ><span class="fa fa-trash"></button>';
			$employeeData[] = $empRows;
			$sr++;

		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$employeeData
		);
		echo json_encode($output);
	}
	 function getpay(){
		if($_POST["empId"]) {
			$sqlQuery = "
				SELECT * FROM payment 
				WHERE id = '".$_POST["empId"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo json_encode($row);
		}
	}
	 function updatepay(){
		if($_POST['empId']) {	
			$updateQuery = "UPDATE payment
			SET  pdate= '".$_POST["pdate"]."', ehead = '".$_POST["ehead"]."', amount = '".$_POST["amount"]."', mode = '".$_POST["mode"]."', chq_date = '".$_POST["cd"]."', remark = '".$_POST["remark"]."'
			WHERE id ='".$_POST["empId"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}
	
    function addpay(){
		$insertQuery = "INSERT INTO payment (`id`, `pdate`, `ehead`, `amount`, `mode`, `chq_date`, `remark`) 
		VALUES ('".$_POST["idno"]."','".$_POST["pdate"]."', '".$_POST["ehead"]."', '".$_POST["amount"]."', '".$_POST["mode"]."', '".$_POST["cd"]."', '".$_POST["remark"]."')";
		$isUpdated = mysqli_query($this->dbConnect, $insertQuery);		
	}
	 function deletepay(){
		if($_POST["empId"]) {
			$sqlDelete = "
				DELETE FROM payment
				WHERE id = '".$_POST["empId"]."'";		
			mysqli_query($this->dbConnect, $sqlDelete);		
		}
	}
	/*  Payments */

	/* order add */
	function addorder(){
		$insertQuery = "INSERT INTO orders (`cname`, `model_no`, `price`, `order_date`, `cust_name`, `address`, `mobile_no`, `pincode`, `email`, `order_id`, `qty`, `total`) 
		VALUES ('".$_POST["cname"]."','".$_POST["model_no"]."', '".$_POST["price"]."', '".$_POST["order_date"]."', '".$_POST["cust_name"]."', '".$_POST["address"]."', '".$_POST["mobile_no"]."', '".$_POST["pincode"]."', '".$_POST["email"]."', '".$_POST["order_id"]."', '".$_POST["qty"]."', '".$_POST["total"]."')";
		$isUpdated = mysqli_query($this->dbConnect, $insertQuery);		
	}

	/*  Item List   */
   
      function itemList(){		
		$sqlQuery = "SELECT * FROM item ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR description LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR unitofm LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR purchaseprice LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR gst LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		
		$sqlQuery1 = "SELECT * FROM item ";
        
		$result1 = mysqli_query($this->dbConnect, $sqlQuery1);
		$numRows = mysqli_num_rows($result1);
		$sr=1;
		
		$employeeData = array();	
		while( $employee = mysqli_fetch_assoc($result) ) {		
			$empRows = array();			
			$empRows[] = $sr;
			
			$empRows[] = $employee['description'];
			$empRows[] = $employee['unitofm'];		
			$empRows[] = $employee['purchaseprice'];	
			$empRows[] = $employee['gst'];
            $empRows[] = '<button type="button" name="update" id="'.$employee["id"].'" class="update btn btn-warning"><span class=" fa fa-pencil"></button>';
			$empRows[] = '<button type="button" name="delete" id="'.$employee["id"].'" class="btn btn-danger delete" ><span class="fa fa-trash"></button>';
			$employeeData[] = $empRows;
			$sr++;

		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$employeeData
		);
		echo json_encode($output);
	}
	function getitem(){
		if($_POST["empId"]) {
			$sqlQuery = "
				SELECT * FROM item 
				WHERE id = '".$_POST["empId"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo json_encode($row);
		}
	}
	  function updatenew(){
		if($_POST['empId']) {	
			$updateQuery = "UPDATE item 
			SET  description= '".$_POST["iname"]."', unitofm= '".$_POST["uom"]."', purchaseprice= '".$_POST["price"]."', gst = '".$_POST["gst"]."'
			WHERE id ='".$_POST["empId"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}
	
	
    function addit(){
	$insertQuery = "INSERT INTO item (`description`, `unitofm`, `purchaseprice`, `gst`, `category`, `sale_price`) 
		VALUES ('".$_POST["iname"]."','".$_POST["uom"]."', '".$_POST["price"]."', '".$_POST["gst"]."', '".$_POST["cat"]."', '".$_POST["salep"]."')";
		$isUpdated = mysqli_query($this->dbConnect, $insertQuery);		
	}
	 function deleteitem(){
		if($_POST["empId"]) {
			$sqlDelete = "
				DELETE FROM item
				WHERE id = '".$_POST["empId"]."'";		
			mysqli_query($this->dbConnect, $sqlDelete);		
		}
	}
	/*  Payments */
}
?>