
<?php 
include("connection.php");
?>

<?php

if(isset($_GET['page'])){
	
	$search=$_GET['page'];
	$searchterm = $_GET['searchterm'];

	if(isset($_GET['check'])){
	
		$check=$_GET['check'];
		
	if ($check=='customer'){
	
		//Paging
		$rec_limit = 5;

		$sql = "SELECT COUNT(customerid) FROM customers".
		" WHERE customers.lastname LIKE '%$searchterm%' OR customers.afm LIKE '%$searchterm%' ";
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
	
	$query = "SELECT * FROM customers WHERE customers.lastname LIKE '%$searchterm%'".
	" OR customers.afm LIKE '%$searchterm%'ORDER BY customerid DESC LIMIT $offset, $rec_limit";
	$results = mysqli_query($link, $query); ?>
	
		<div id="customers">

            	<h3>Customers</h3>
            	
                <!-- Paging Customers -->
                  <h4>	
					<?php
			        if ( $rec_count > $rec_limit )
        			{
					if( $pages > 0 && $left_rec > $rec_limit)
					{
					$last = $pages - 2;
					echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$last'>Previous</a> | ";  
					echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$pages'>Next</a>";
					}
					else if( $pages == 0 )
					{
					echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$pages'>Next</a>";
					}
					else if( $left_rec < $rec_limit )
					{
					$last = $pages - 2;
					echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$last'>Previous</a>";
					}
					}
					?>  			 
				</h4>				
			  <!-- /Paging Customers -->
                
					<ol id="customers_list"> 
					 
					<?php
					    if(mysqli_num_rows($results)>0)
                		{		       
							while($row = mysqli_fetch_array($results)){
					?>
					<li>
					<form method="post" action="update_delete.php">
					<table id="cus" class="column"><input type="hidden" name="cus_id" value="<?php echo $row['customerid'];?>">
					<tr><td>Name: </td><td><?php echo $row['name']; ?></td><td><input name="upname" value="<?php echo $row['name']; ?>"/></td></tr>
					<tr><td>Lastname: </td><td><?php echo $row['lastname']; ?></td><td><input name="uplastname" value="<?php echo $row['lastname']; ?>"/></td></tr>
					<tr><td>Address: </td><td><?php echo $row['address']; ?></td><td><input name="upaddress" value="<?php echo $row['address']; ?>"/></td></tr>
					<tr><td>AFM: </td><td><?php echo $row['afm']; ?></td><td><input name="upafm" value="<?php echo $row['afm']; ?>"/></td></tr>
					<tr><td colspan="2" align="left"><input name="delete_cus" type="submit" value="Delete" id="delete"></td><td align="left">
						<input name="update_cus" type="submit" value="Update" id="update"></td></tr>
					</table>
					</form>           
					</li>																				
                <?php } ?>
                </ol><br>
                
                <!-- Paging Customers -->
                  <h4>	
					<?php
			        if ( $rec_count > $rec_limit )
        			{
					if( $pages > 0 && $left_rec > $rec_limit)
					{
					$last = $pages - 2;
					echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$last'>Previous</a> | ";  
					echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$pages'>Next</a>";
					}
					else if( $pages == 0 )
					{
					echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$pages'>Next</a>";
					}
					else if( $left_rec < $rec_limit )
					{
					$last = $pages - 2;
					echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$last'>Previous</a>";
					}
					}
					?>  			 
				</h4>				
			  <!-- /Paging Customers -->
                
         		<?php
         		 
				} else {
				
					echo "<p> There are no customers. </p>";
					
				}?>
				
			</div>

   <?php		
		
	} elseif($check=='product') {
	
		//Paging
		$rec_limit = 5;

		$sql = "SELECT COUNT(prod_id) FROM products, categories".
		" WHERE products.prod_name LIKE '%$searchterm%'".
		" AND products.prod_cat=categories.cat_id OR categories.cat_name LIKE '%$searchterm%' AND products.prod_cat=categories.cat_id ";
		
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
		
		$query="SELECT prod_id,prod_cat,prod_name,prod_det,cat_id,cat_name FROM products,categories".
		" WHERE prod_name LIKE '%$searchterm%' AND products.prod_cat=categories.cat_id OR cat_name LIKE '%$searchterm%'".
		" AND products.prod_cat=categories.cat_id  ORDER BY products.prod_id DESC LIMIT $offset, $rec_limit ";
		    
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
						echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$last'>Previous</a> | ";  
						echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$pages'>Next</a>";
						}
						else if( $pages == 0 )
						{
						echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$pages'>Next</a>";
						}
						else if( $left_rec < $rec_limit )
						{
						$last = $pages - 2;
						echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$last'>Previous</a>";
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
						 $select=$row['cat_name'];
						 
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
								
								echo '<option  value="'. $row2['cat_name'].'">'. $row2['cat_name'].'</option>';
																	
								}
								
								}else {
									echo "<option>Add new category</option>";	
							}							
					?>
			
						</select></td></tr>
						
						<tr><td>Comments: </td><td><?php echo $row['prod_det']; ?></td><td><textarea id="pro_text" name="upprod_det"><?php echo $row['prod_det']; ?></textarea></td></tr>
						<tr><td colspan="2" align="left"><input name="delete_prod" type="submit" value="Delete" id="delete"></td><td align="left">
							<input name="update_prod" type="submit" value="Update" id="update"></td></tr>
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
						echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$last'>Previous</a> | ";
						echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$pages'>Next</a>";
						}
						else if( $pages == 0 )
						{
						echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$pages'>Next</a>";
						}
						else if( $left_rec < $rec_limit )
						{
						$last = $pages - 2;
						echo "<a href='.?page=$search&check=$check&searchterm=$searchterm&pages=$last'>Previous</a>";
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

		
<?php
		
		}
	
	}
	
	else echo "<h4>Make a selection</h4>";	
	
}
?>
