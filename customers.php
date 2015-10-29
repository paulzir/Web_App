
<?php 

include("connection.php");

		//Paging
		$rec_limit = 5;

		$sql = "SELECT COUNT(customerid) FROM customers ";
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

<!-- View Customers -->

<?php
		
			if(isset($_POST['search'])){
	
				$searchterm = $_POST['searchterm'];
			
				if(isset($_POST['check']))
				
					$check=$_POST['check'];
					
				if ($check=='customer'){
		
					$query = "SELECT * FROM customers WHERE lastname LIKE '%$searchterm%' OR afm LIKE '%$searchterm%' ORDER BY customerid DESC LIMIT $offset, $rec_limit";
					$results = mysqli_query($link, $query);
				}
		
			} else
		
					$query="SELECT customerid,name,lastname,address,afm FROM customers ORDER BY customerid DESC LIMIT $offset, $rec_limit";    
					$results = mysqli_query($link,$query);
 
?>			
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
					echo "<a href=\".?page=view_customers&pages=$last\">Previous</a> | ";
					echo "<a href=\".?page=view_customers&pages=$pages\">Next</a>";
					}
					else if( $pages == 0 )
					{
					echo "<a href=\".?page=view_customers&pages=$pages\">Next</a>";
					}
					else if( $left_rec < $rec_limit )
					{
					$last = $pages - 2;
					echo "<a href=\".?page=view_customers&pages=$last\">Previous</a>";
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
					<input  type="hidden" name="pag_id" value="<?php echo $pages;?>">
					<input type="hidden" name="cus_id" value="<?php echo $row['customerid'];?>">
					<table id="cus" class="column">
					<tr><td>Name: </td><td><?php echo $row['name']; ?></td><td><input name="upname" value="<?php echo $row['name']; ?>"/></td></tr>
					<tr><td>Lastname: </td><td><?php echo $row['lastname']; ?></td><td><input name="uplastname" value="<?php echo $row['lastname']; ?>"/></td></tr>
					<tr><td>Address: </td><td><?php echo $row['address']; ?></td><td><input name="upaddress" value="<?php echo $row['address']; ?>"/></td></tr>
					<tr><td>AFM: </td><td><?php echo $row['afm']; ?></td><td><input name="upafm" value="<?php echo $row['afm']; ?>"/></td></tr>
					<tr><td colspan="2" align="left"><input name="delete_cus" type="submit" value="Delete" id="delete" onclick="return confirm('Are you sure you want to delete this item?');"></td><td align="left">
						<input name="update_cus" type="submit" value="Update" id="update" onclick="return confirm('Do you want to update this item?');"></td></tr>
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
					echo "<a href=\".?page=view_customers&pages=$last\">Previous</a> | ";
					echo "<a href=\".?page=view_customers&pages=$pages\">Next</a>";
					}
					else if( $pages == 0 )
					{
					echo "<a href=\".?page=view_customers&pages=$pages\">Next</a>";
					}
					else if( $left_rec < $rec_limit )
					{
					$last = $pages - 2;
					echo "<a href=\".?page=view_customers&pages=$last\">Previous</a>";
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
				