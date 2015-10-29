<?php 
include("connection.php");
?>

<!-- Add Products -->

<?php if(isset($_POST['submit_order']))
 {
 	 $orderid='';
 	 $customer='';
	 $product='';					
	 $price='';
	 $date='';					
	 $payment='';
	 $details='';
	 
	if(isset($_POST['customer']))		
	 	$customer=$_POST['customer'];
	 	
		$query="SELECT customerid FROM customers WHERE customers.lastname='$customer' ";
	 	$results = mysqli_query($link,$query);
	 	
		while($row = mysqli_fetch_array($results)) {

	 	$customerid=$row['customerid'];
	 	
	 	}
	 	
	if(isset($_POST['product']))	
	 	$product=$_POST['product'];
	 	
	 	$query="SELECT prod_id,prod_cat FROM products,categories WHERE products.prod_name='$product' ";
	 	$results = mysqli_query($link,$query);
	 	
		while($row = mysqli_fetch_array($results)) {

	 	$prod_id=$row['prod_id'];
	 	
	 	$prod_cat=$row['prod_cat'];
	 	
	 	}	 	
	 	
	if(isset($_POST['price']))
	 	$price=$_POST['price'];
	 	
	 if(isset($_POST['date']))
	 	$date=$_POST['date'];
	 	
	 if(isset($_POST['payment']))
	 	$payment=$_POST['payment'];
	 	
	 if(isset($_POST['details']))
	 	$details=$_POST['details'];
	 		
 	mysqli_query($link,"INSERT INTO orders (customer, product,category,price,date,payment,details) VALUES ('$customerid','$prod_id','$prod_cat','$price','$date','$payment','$details') ");

 }
 
 	header("Location:.?page=view_orders" );

	exit();
 
 ?>
