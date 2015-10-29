
<?php 

include("connection.php");

?>

<?php

		$query="SELECT cat_name FROM categories ";    
		$results = mysqli_query($link,$query);
			
?>

 
<div id="insert_product" align="center">
        
            <fieldset>
            <legend>Product Details</legend>
            <form action="add_product.php" method="post">
            <table class="column">
            <tr><td>Category: </td><td><select name="prod_cat" >
            
            <?php 
	
				if(mysqli_num_rows($results)>0){
					         
					while($row = mysqli_fetch_array($results)){
					
					echo '<option value="'. $row['cat_name'].'" >'. $row['cat_name'].'</option>';
					
					}
					
				} else {
						
						echo "<option>Add new category</option>";
														
				}	
							
			?>
			            
            </select></td></tr>
            <tr><td>Product Name: </td><td><input name="prod_name" /></td></tr>
      		<tr><td>Comments: </td><td><textarea name="prod_det"></textarea></td></tr>
      		<tr><td></td><td align="center">
	  		<input type="submit" id="add_pro" name="submit_prod" value="Add New Product" />
	 		</td></tr>      
            </table>
            </form>
            </fieldset>
            
</div>
