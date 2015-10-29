
<?php 
include("connection.php");
?>

<!-- Update/Delete Customers -->

<?php
if(isset($_POST['update_cus'])){

	//if(isset($_POST['upname']))		
		$upname = $_POST['upname'];
		
	//if(isset($_POST['uplastname']))	
		$uplastname = $_POST['uplastname'];

	//if(isset($_POST['upaddress']))	
		$upaddress = $_POST['upaddress'];

	//if(isset($_POST['upafm']))	
		$upafm = $_POST['upafm'];
		
		$cus_id=$_POST['cus_id'];
		
	//	$pag_id=$_POST['pag_id'];
		
	mysqli_query($link,"UPDATE customers SET name='$upname', lastname='$uplastname', address='$upaddress', afm='$upafm' WHERE customerid='$cus_id' ");
	
	header("Location:.?page=view_customers" );
	
	//	header("Location:.?page=view_customers&pages='$pag_id';" );

	exit();

} elseif(isset($_POST['delete_cus'])) {
	
	$cus_id=$_POST['cus_id'];
	
	mysqli_query($link,"DELETE FROM customers WHERE customerid='$cus_id' ");
	
	header("Location:.?page=view_customers" );

	exit();
	
}	

?>

<!-- Update/Delete Products -->

<?php

if(isset($_POST['update_prod'])){		

		$upprod_name = $_POST['upprod_name'];
			
		$upprod_cat = $_POST['upprod_cat'];
	
		$upprod_det = $_POST['upprod_det'];

		$prod_id=$_POST['prod_id'];
		
	
	$query="SELECT cat_id,cat_name FROM categories WHERE categories.cat_name='$upprod_cat'  ";    
	$results = mysqli_query($link,$query);								
											
		if(mysqli_num_rows($results)>0){
					         
			while($row = mysqli_fetch_array($results)){
			
			$id_cat=$row['cat_id'];
			
			}
			
		}							
		
	mysqli_query($link,"UPDATE products SET prod_name='$upprod_name', prod_cat='$id_cat', prod_det='$upprod_det' WHERE prod_id='$prod_id' ");

	header("Location:.?page=view_products" );

	exit();
	
} elseif(isset($_POST['delete_prod'])) {
	
	$prod_id=$_POST['prod_id'];
	
	mysqli_query($link,"DELETE FROM products WHERE prod_id='$prod_id' ");

	header("Location:.?page=view_products" );

	exit();		
}	

?>

<!-- Update/Delete Orders -->

<?php
if(isset($_POST['update_order'])){		

		$uplastname = $_POST['uplastname'];
			
		$uppro = $_POST['uppro'];
	
		$upprice = $_POST['upprice'];
		
		$update = $_POST['update'];
		
		$uppay = $_POST['uppay'];
		
		$updetails = $_POST['updetails'];

		$orderid=$_POST['orderid'];
			
	$query="SELECT prod_id,prod_cat FROM products WHERE products.prod_name='$uppro'  ";    
	$results = mysqli_query($link,$query);								
											
		if(mysqli_num_rows($results)>0){
					         
			while($row = mysqli_fetch_array($results)){
			
			$prod_id=$row['prod_id'];
			
			$prod_cat=$row['prod_cat'];
			
			}
			
		}
		
	$query2="SELECT customerid FROM customers WHERE customers.lastname='$uplastname'  ";    
	$results2 = mysqli_query($link,$query2);								
											
		if(mysqli_num_rows($results2)>0){
					         
			while($row2 = mysqli_fetch_array($results2)){
			
			$customerid=$row2['customerid'];
			
			}
			
		}								
		
	mysqli_query($link,"UPDATE orders SET product='$prod_id',category='$prod_cat', customer='$customerid', price='$upprice', date='$update', payment='$uppay', details='$updetails' WHERE orders.orderid='$orderid' ");

	header("Location:.?page=view_orders" );

	exit();
	
} elseif(isset($_POST['delete_order'])) {
	
	$orderid=$_POST['orderid'];
	
	mysqli_query($link,"DELETE FROM orders WHERE orderid='$orderid' ");

	header("Location:.?page=view_orders" );

	exit();		
}	

?>
