<?php
include "db.php";

session_start();

#Login script is begin here
#If user given credential matches successfully with the data available in database then we will echo string login_success
#login_success string will go back to called Anonymous funtion $("#login").click()
if(isset($_POST["title_prod"]) &&
   isset($_POST["description_prod"])&&
   isset($_POST["keywords_prod"])&&
   isset($_POST["stock_prod"])&&
   isset($_POST["price_prod"])&&
   isset($_POST["limit_date_prod"])&&
   isset($_POST["image_prod"]) &&
   isset($_POST["catego_prod"])
 ){
  $c_title = $_POST["title_prod"];
  $c_desc = $_POST["description_prod"];
  $c_key = $_POST["keywords_prod"];
  $c_stock = $_POST["stock_prod"];
  $c_price = $_POST["price_prod"];
  $c_limit = $_POST["limit_date_prod"];
  $c_image = $_POST["image_prod"];
  $c_cat = $_POST["catego_prod"];

  if(empty($c_title) || empty($c_desc) || empty($c_key) || empty($c_stock) || empty($c_price) ||
  	empty($c_limit) || empty($c_image) || empty($c_cat)){

  		echo "
  			<div class='alert alert-warning'>
  				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
  			</div>
  		";
  		exit();
  	}



  $title = pg_escape_string($con,$c_title);
  $description = pg_escape_string($con,$c_desc);
  $stock=(int)$stock_str = pg_escape_string($con,$c_stock);
  $price =(int)$price_str = pg_escape_string($con,$c_price);
  $limitdate = pg_escape_string($con, $c_limit);
  $keywords = pg_escape_string($con,$c_key);
  $image = pg_escape_string($con,);
  $id_session=(int)pg_escape_string($_SESSION["uid"]);
  $catego= pg_escape_string($con,$c_cat);

  $sql = "INSERT INTO products (user_id, product_desc, stock, limit_date, register_date, product_cat, product_prov, product_title, product_price,
     product_image, product_keywords) values
  ('$id_session', '$description', '$stock', '$limitdate', now(), '$catego', isProveedor('$id_session'), '$title', '$price', '$image', '$keywords')";
	$run_query = pg_query($con,$sql);
  echo "add_success";
  exit();
}


?>
