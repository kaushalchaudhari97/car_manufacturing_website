<?php

$connect = new PDO("mysql:host=localhost;dbname=car", "root", "");

$query = "SELECT * FROM tbl_product ORDER BY id DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
 $result = $statement->fetchAll();
 $output = '';
 foreach($result as $row)
 {
  $output .= '
  <div>  
            <div id="product_'.$row["id"].'">
             <h5>
                        <div class="checkbox">
                              <label><input type="checkbox" class="select_product" data-product_id="'.$row["id"].'" data-product_name="'.$row["name"].'" data-product_price="'.$row["price"] .'" value="">'.$row["name"].'</label>
                        </div>
                  </h4>
             <h5 class="text-danger">$ '.$row["price"] .'</h5><hr>
            </div>
        </div>
  ';
 }
 echo $output;
}



?>