
<?php 
include("connection.php");

		//Paging
		$rec_limit = 5;

		$sql = "SELECT COUNT(prod_id) FROM products ";
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

<!-- View Products -->

<?php

		$query="SELECT prod_id,prod_cat,prod_name,prod_det,cat_id,cat_name FROM products,categories".
		" WHERE products.prod_cat=categories.cat_id ORDER BY products.prod_id DESC LIMIT $offset, $rec_limit ";    
		$results = mysqli_query($link,$query);

?>			
			<div id="products">
			
            	<h3>Products</h3>
            	
            	<!-- Paging Products -->
					<h4>	
						<?php
				        if ( $rec_count > $rec_limit )
        				{        
						if( $pages > 0 && $left_rec > $rec_limit)
						{
						$last = $pages - 2;
						echo "<a href=\".?page=view_products&pages=$last\">Previous</a> | ";
						echo "<a href=\".?page=view_products&pages=$pages\">Next</a>";
						}
						else if( $pages == 0 )
						{
						echo "<a href=\".?page=view_products&pages=$pages\">Next</a>";
						}
						else if( $left_rec < $rec_limit )
						{
						$last = $pages - 2;
						echo "<a href=\".?page=view_products&pages=$last\">Previous</a>";
						}
						}						
						?>  
				   </h4>
			  <!-- /Paging Products -->
	
					<ol id="products_list">  
					<?php
						if(mysqli_num_rows($results)>0){          
						while($row = mysqli_fetch_array($results,MYSQL_BOTH)){
						
						 $cat_id=$row['cat_id'];
						 $catsel=$row['cat_name'];
						 
						?>
						<li>
						<form method="post" action="update_delete.php">
						<table id="pro" class="column"><input type="hidden" name="prod_id" value="<?php echo $row['prod_id'];?>">
						<tr><td>Product Name: </td><td><?php echo $row['prod_name']; ?></td><td><input name="upprod_name" value="<?php echo $row['prod_name']; ?>"/></td></tr>
						<tr><td>Category: </td><td><?php echo $row['cat_name']; ?></td>
						<td><select name="upprod_cat">
						
					<?php
					
						$query2="SELECT cat_name FROM categories ORDER BY categories.cat_id ASC ";    
						$results2 = mysqli_query($link,$query2);								
											
 							if(mysqli_num_rows($results2)>0){
					         
								while($row2 = mysqli_fetch_array($results2)){								
								
									if($row2['cat_name']==$catsel){
									
										echo '<option  value="'. $row2['cat_name'].'" selected>'. $row2['cat_name'].'</option>';
									
									} else{
									
										echo '<option  value="'. $row2['cat_name'].'">'. $row2['cat_name'].'</option>';
																	
									} 
								}
								
								}else {
									echo "<option>Add new category</option>";	
							}							
					?>
			
						</select></td></tr>
						
						<tr><td>Comments: </td><td><?php echo $row['prod_det']; ?></td><td><textarea id="pro_text" name="upprod_det"><?php echo $row['prod_det']; ?></textarea></td></tr>
						<tr><td colspan="2" align="left"><input name="delete_prod" type="submit" value="Delete" id="delete" onclick="return confirm('Are you sure you want to delete this item?');"></td><td align="left">
							<input name="update_prod" type="submit" value="Update" id="update" onclick="return confirm('Do you want to update this item?');"></td></tr>
						</table>
						</form>           
						</li>																
                <?php } ?>
                
                </ol><br>
                
         		<!-- Paging Products -->
					<h4>	
						<?php
				        if ( $rec_count > $rec_limit )
        				{        
						if( $pages > 0 && $left_rec > $rec_limit)
						{
						$last = $pages - 2;
						echo "<a href=\".?page=view_products&pages=$last\">Previous</a> | ";
						echo "<a href=\".?page=view_products&pages=$pages\">Next</a>";
						}
						else if( $pages == 0 )
						{
						echo "<a href=\".?page=view_products&pages=$pages\">Next</a>";
						}
						else if( $left_rec < $rec_limit )
						{
						$last = $pages - 2;
						echo "<a href=\".?page=view_products&pages=$last\">Previous</a>";
						}
						}						
						?>  
				   </h4>
			  <!-- /Paging Products -->
         		
         		<?php
					
				}else{
				
					echo "<p> There are no products. </p>";
					
				}?>
				
			</div>
				