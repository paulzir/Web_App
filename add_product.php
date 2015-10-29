<?php 
include("connection.php");
?>

<!-- Add Products -->

<?php if(isset($_POST['submit_prod']))
 {
 	 $cat_id='';
	 $prod_cat='';
	 $prod_name='';					
	 $prod_det='';
	 
	if(isset($_POST['prod_cat']))		
	 	$prod_cat=$_POST['prod_cat'];
	 	
		$query="SELECT cat_id FROM categories WHERE categories.cat_name='$prod_cat' ";
	 	$results = mysqli_query($link,$query);
	 	
		while($row = mysqli_fetch_array($results)) {

	 	$cat_id=$row['cat_id'];
	 	
	 	}
	 	
	if(isset($_POST['prod_name']))	
	 	$prod_name=$_POST['prod_name'];
	 	
	if(isset($_POST['prod_det']))
	 	$prod_det=$_POST['prod_det'];
	 		
 	mysqli_query($link,"INSERT INTO products (prod_cat, prod_name,prod_det) VALUES ('$cat_id','$prod_name', '$prod_det') ");

 }
 
 	header("Location:.?page=view_products" );

	exit();
 
 ?>
