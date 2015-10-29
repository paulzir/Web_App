<?php 
include("connection.php");
?>

<!-- Add Customers -->

<?php if(isset($_POST['submit_customer']))
 {
	 
	 $name='';
	 $lastname='';
	 $address='';
	 $afm='';
	 
	if(isset($_POST['name']))		
	 	$name=$_POST['name'];
	 	
	if(isset($_POST['lastname']))	
	 	$lastname=$_POST['lastname'];
	 	
	if(isset($_POST['address']))
	 	$address=$_POST['address'];
	 	
	if(isset($_POST['afm']))
	 	$afm=$_POST['afm'];
	 	
		
 	mysqli_query($link,"INSERT INTO customers (name, lastname, address, afm) VALUES ('$name','$lastname', '$address','$afm')");

 }
 
 	header("Location:.?page=view_customers" );

	exit();
 
 ?>
