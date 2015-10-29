
<?php 

include("connection.php");

?>
 
<div id="insert_order" align="center">
        
            <fieldset>
            <legend>Order Details</legend>
            <form action="add_order.php" method="post">
            <table class="column">
            <tr><td>Customer: </td><td><select name="customer" >
            
            <?php 
            
            	$query="SELECT lastname FROM customers ";    
				$results = mysqli_query($link,$query);
	
				if(mysqli_num_rows($results)>0){
					         
					while($row = mysqli_fetch_array($results)){
					
					echo '<option value="'. $row['lastname'].'" >'. $row['lastname'].'</option>';
					
					}
				} else {
						echo "<option>Add new customer</option>";
				}	
							
			?>
			            
            </select></td></tr>
            <tr><td>Product: </td><td><select name="product" multiple="multiple" id="in_sel">

            <?php
            
 				$query2="SELECT cat_name,cat_id FROM categories ORDER BY cat_id ASC";    
				$results2 = mysqli_query($link,$query2);

				if(mysqli_num_rows($results2)>0){
					         
					while($row2 = mysqli_fetch_array($results2)){ 
					
					$cat_id=$row2['cat_id'];
					?>					
						<optgroup label="<?php echo $row2['cat_name']?>">
			<?php
            
 				$query3="SELECT prod_name FROM products,categories WHERE products.prod_cat=categories.cat_id AND products.prod_cat='$cat_id' ORDER BY prod_id ASC";    
				$results3 = mysqli_query($link,$query3);

				if(mysqli_num_rows($results3)>0){
					         
					while($row3 = mysqli_fetch_array($results3)){ ?>			    
						    
						<option value="<?php echo $row3['prod_name']?>" ><?php echo $row3['prod_name']?></option>
																				
			<?php	}
			
								
				}	
			?>
						</optgroup>
			<?php	
					}
				
				} else {
					echo "<option> Add new product</option>";
					
				}							
			?>
            
            </select></td></tr>
      		<tr><td>Price (&euro;):</td><td><input style="width:100px; display:inline-block" type="range" id="rangeInput" name="rangeInput" min="0" max="10000" onchange="updateTextInput(this.value);">
			<input style="width:92px" name="price" id="textInput" onchange="updateRangeInput(this.value);"/></td></tr>
      		<tr><td>Date: </td><td><input type="date" name="date" /></td></tr>
         	<tr><td>Payment: </td><td><input name="payment" /></td></tr>
      		<tr><td>Comments: </td><td><textarea name="details"></textarea></td></tr>
      		<tr><td></td><td align="center">
	  		<input type="submit" id="add_order" name="submit_order" value="Add New Order"/>
	 		</td></tr>      
            </table>
            </form>
            </fieldset>
            
</div>
