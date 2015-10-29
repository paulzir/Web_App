<!--
<a href=".?page=insert_customer"><input class="in" type="submit" name="submit" value="Insert New Customer" ></a><br><br>
<a href=".?page=insert_product"><input class="in" type="submit" name="submit" value="Insert New Product" ></a><br><br>
<a href=".?page=insert_order"><input class="in" type="submit" name="submit" value="Insert New Order" ></a><br><br>
-->
<div id="insert" align="center">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
<input class="in" type="submit" name="page" value="Insert New Customer" ><br><br>
<input class="in" type="submit" name="page" value="Insert New Product"><br><br>
<input class="in" type="submit" name="page" value="Insert New Order">
</form><br><br>
</div>

<div id="searching1" align="center">
<form name="search1" action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
<table>
<tr align="left"><td>Search for :</td></tr>

<tr><td><input type="radio" id="radio_cus" name="check" value="customer" onclick="disable()"/>&nbsp;Customers by</td></tr>

<tr><td>&nbsp;&nbsp;&nbsp;<input type="checkbox" id="cus" name="check_cus" value="lastname" onclick="checkOnly(this);enable();"/>&nbsp;Name</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;<input type="checkbox" id="afm" name="check_cus" value="afm" onclick="checkOnly(this);enable();" />&nbsp;AFM</td></tr>

<tr><td><input type="radio" id="radio_pro" name="check" value="product" onclick="disable()" />&nbsp;Products by</td></tr>

<tr><td>&nbsp;&nbsp;&nbsp;<input type="checkbox" id="p_name" name="check_pro" value="prod_name" onclick="checkOnly(this);enable();"/>&nbsp;Product Name</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;<input type="checkbox" id="p_cat" name="check_pro" value="prod_cat" onclick="checkOnly(this);enable();"/>&nbsp;Category</td></tr>
<tr align="center"><td><input class="inwidth" type="text" name="searchterm"/></td></tr>

<tr align="center"><td><input type="submit" name="page" value="Search"/></td></tr>
</table>
</form>

<script language="javascript">

function checkOnly(stayChecked)
  {
  with(document.search1)
    {
    for(i = 0; i < elements.length; i++)
      {
      
      if(elements[i].checked == true && elements[i].id != stayChecked.id && elements[i].type == 'checkbox')
        {
        elements[i].checked = false;
        }
        
      }
    }
  }
  
function disable()
	{ 	if (document.getElementById("radio_cus").checked) {
		document.getElementById("p_name").checked=false;
		document.getElementById("p_cat").checked=false;
		//document.getElementById("p_name").disabled=true;
		//document.getElementById("p_cat").disabled=true;
		document.getElementById("cus").disabled=false;
		document.getElementById("afm").disabled=false;}
	
	 	else if (document.getElementById("radio_pro").checked) {
		document.getElementById("cus").checked=false;
		document.getElementById("afm").checked=false;
		//document.getElementById("cus").disabled=true;
		//document.getElementById("afm").disabled=true;
		document.getElementById("p_name").disabled=false;
		document.getElementById("p_cat").disabled=false;}	
	}

function enable ()
	{	if(document.getElementById("cus").checked || document.getElementById("afm").checked ){
	
		document.getElementById("radio_cus").checked=true;
		//document.getElementById("p_name").disabled=true;
		//document.getElementById("p_cat").disabled=true;
		}
		
		else if (document.getElementById("p_name").checked || document.getElementById("p_cat").checked ){
		
		document.getElementById("radio_pro").checked=true;
		//document.getElementById("cus").disabled=true;
		//document.getElementById("afm").disabled=true;
		}

	}
	
</script>

</div>
