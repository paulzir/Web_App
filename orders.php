
<?php 
include("connection.php");

		//Paging
		$rec_limit = 5;

		$sql = "SELECT COUNT(orderid) FROM orders ";
		$retval = mysqli_query($link,$sql);
		
		$row = mysqli_fetch_array($retval, MYSQL_NUM );
		$rec_count = $row[0];
		
		if( isset($_GET{'pages'} ) )
		{
		   $pages = $_GET{'pages'} + 1;
		   $offset = $rec_limit * $pages ;
		}
		else
		{
		   $pages = 0;
		   $offset = 0;
		}
		$left_rec = $rec_count - ($pages * $rec_limit);


?>

<?php

		$query="SELECT orderid,category,product,price,lastname,date,payment,details,prod_name,cat_name".
		 " FROM orders,customers,products,categories WHERE orders.customer=customers.customerid".
		 " AND orders.category=categories.cat_id AND orders.product=products.prod_id ORDER BY orderid DESC LIMIT $offset, $rec_limit";    
		
		$results = mysqli_query($link,$query);

?>			
			<div id="orders">
            	<h3>Orders</h3>
            	
            	<!-- Paging Orders -->
					<h4>	
						<?php
				        if ( $rec_count > $rec_limit )
        				{        
						if( $pages > 0 && $left_rec > $rec_limit)
						{
						$last = $pages - 2;
						echo "<a href=\".?page=view_orders&pages=$last\">Previous</a> | ";
						echo "<a href=\".?page=view_orders&pages=$pages\">Next</a>";
						}
						else if( $pages == 0 )
						{
						echo "<a href=\".?page=view_orders&pages=$pages\">Next</a>";
						}
						else if( $left_rec < $rec_limit )
						{
						$last = $pages - 2;
						echo "<a href=\".?page=view_orders&pages=$last\">Previous</a>";
						}
						}						
						?>  
				   </h4>
			  <!-- /Paging Orders -->
            	
                <?php 
                
                
                
				 ?>
                	
					<ol id="order_list">  
					<?php
											
           			if(mysqli_num_rows($results)>0){
           			
						while($row = mysqli_fetch_array($results)){
							
									$prodnam=$row['prod_name'];
									$custnam=$row['lastname'];
					?>
					<li>
					<form method="post" action="update_delete.php">
					<table id="ord" class="column"><input type="hidden" name="orderid" value="<?php echo $row['orderid'];?>">
					<tr><td>Customer: </td><td><?php echo $row['lastname']; ?></td>
					<td><select name="uplastname">
					
					<?php 
            
            			$query2="SELECT lastname FROM customers ORDER BY customers.customerid DESC ";    
						$results2 = mysqli_query($link,$query2);
	
						if(mysqli_num_rows($results2)>0){
					         
							while($row2 = mysqli_fetch_array($results2)){
								
								if($row2['lastname']==$custnam){
								
									echo '<option value="'. $row2['lastname'].'" selected>'. $row2['lastname'].'</option>';
									
								} else {
								
									echo '<option value="'. $row2['lastname'].'" >'. $row2['lastname'].'</option>';
							
								}				
							}
						} else {
							echo "<option>Add new customer</option>";
						}	
					?>

					
					
					</select></td></tr>					
					<tr><td>Category: </td><td><?php echo $row['cat_name']; ?></td>
					<td rowspan="2"><select name="uppro" multiple="multiple" id="ord_sel">
					
					<?php
            
 							$query2="SELECT cat_name,cat_id FROM categories ORDER BY cat_id ASC";    
							$results2 = mysqli_query($link,$query2);

							if(mysqli_num_rows($results2)>0){
					         
								while($row2 = mysqli_fetch_array($results2)){ 
					
								$cat_id=$row2['cat_id'];
					?>					
							<optgroup label="<?php echo $row2['cat_name'];?>">
							
					<?php
            
 							$query3="SELECT prod_name FROM products,categories WHERE products.prod_cat=categories.cat_id AND products.prod_cat='$cat_id' ORDER BY products.prod_id ASC";    
							$results3 = mysqli_query($link,$query3);
							
							

							if(mysqli_num_rows($results3)>0){
								
											         
								while($row3 = mysqli_fetch_array($results3)){ ?>			    
						    
									<?php if ($row3['prod_name']==$prodnam) { ?>
							
							<option value="<?php echo $row3['prod_name'];?>" selected><?php echo $row3['prod_name'];?></option>
							
									<?php } else { ?>
							<option value="<?php echo $row3['prod_name'];?>"><?php echo $row3['prod_name'];?></option>
							
																				
									<?php	}	}
			
							} else {
						
									echo "<option>Add new product</option>";
								}	
					?>
							
					<?php	
								}
							}								
					?>
					
					</optgroup>
	
					</select></td></tr>
					<tr><td>Product: </td><td><?php echo $row['prod_name']; ?></td></tr>
					<tr><td>Price (&euro;): </td><td><?php echo $row['price']; ?></td><td><input name="upprice" value="<?php echo $row['price']; ?>" /></td></tr>
					<tr><td>Date: </td><td><?php echo $row['date']; ?></td><td><input type="date" name="update" value="<?php echo $row['date']; ?>" /></td></tr>
					<tr><td>Payment: </td><td><?php echo $row['payment']; ?></td><td><input name="uppay" value="<?php echo $row['payment']; ?>" /></td></tr>
					<tr><td>Comments: </td><td><?php echo $row['details']; ?></td><td><textarea name="updetails"><?php echo $row['details']; ?></textarea></td></tr>
					<tr><td colspan="2" align="left"><input name="delete_order" type="submit" value="Delete" id="delete" onclick="return confirm('Are you sure you want to delete this item?');"></td><td align="left">
						<input name="update_order" type="submit" value="Update" id="update" onclick="return confirm('Do you want to update this item?');"></td></tr>
					</table>
					</form>              
					</li>
                <?php } ?>
                </ol>
                
                <!-- Paging Orders -->
					<h4>	
						<?php
				        if ( $rec_count > $rec_limit )
        				{        
						if( $pages > 0 && $left_rec > $rec_limit)
						{
						$last = $pages - 2;
						echo "<a href=\".?page=view_orders&pages=$last\">Previous</a> | ";
						echo "<a href=\".?page=view_orders&pages=$pages\">Next</a>";
						}
						else if( $pages == 0 )
						{
						echo "<a href=\".?page=view_orders&pages=$pages\">Next</a>";
						}
						else if( $left_rec < $rec_limit )
						{
						$last = $pages - 2;
						echo "<a href=\".?page=view_orders&pages=$last\">Previous</a>";
						}
						}						
						?>  
				   </h4>
			  <!-- /Paging Orders -->
                
         		<?php 
				}else{
					echo "<p>There are no orders.</p>";
				}?>
			</div>
				