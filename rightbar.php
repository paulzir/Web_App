<div id="calculator" align="center">

<table>
<tr><th colspan="2">Discount Calculator</th></tr>
<tr><td>Price (&euro;):</td><td><input type="text" id="price" class="cal"/></td></tr>
<tr><td>Discount (%):</td><td><input type="text" id="discount"class="cal"/></td></tr>
<tr><td>Result (&euro;):</td><td><input type="text" id="result" class="cal"/></td></tr>
<tr><td colspan="2"><input type="submit" value="Calculate" onclick="calculate()"/></td></tr>
</table><br>

<script>
function calculate() {

    var x = document.getElementById("price").value;
        x=x.replace(/[^0-9\.]+/ig,"");
    var y = document.getElementById("discount").value;
        y=y.replace(/[^0-9\.]+/ig,"");     
    var w=x-(x*y)/100;
    
    document.getElementById("result").value = w;
    
}
</script>

</div>

<div id="searching2" align="center">

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
<table>
<tr><td class="cell">Search in orders by:</td></tr>
<tr><td class="cell" >
<select name="searchtype" id="searchtype">
	<option value="lastname">Customer</option>
	<option value="prod_name">Product</option>
	<option value="cat_name">Category</option>
</select>
</td></tr>
<tr><td class="cell"><input type="text" name="searchitem" class="inwidth"/></td></tr>
<tr><td class="cell"><input type="submit" name="page" value="Submit"/></td></tr>
</table>
</form>

</div>


