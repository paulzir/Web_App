<?php
session_start();
if (array_key_exists('page', $_GET))
	$_SESSION['page']=$_GET["page"];
else
	$_SESSION['page']="home";
?>

<!DOCTYPE html>
<html>

<head>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GreenSystems</title>
<link rel="stylesheet" type="text/css" href="css\style_main.css">
<link rel="stylesheet" type="text/css" href="css\style_secondary.css"> 
<link rel="shortcut icon" href="favicon.ico.gif">

</head>

<body>

<div id="main">

<div id="header">
<?php include("header.php");?>
</div>

<div id="container">

<div id="mainbody" align="center">

<?php
if (array_key_exists('page', $_SESSION))
   if ($_SESSION['page']=="home") include("home.php"); 
   elseif ($_SESSION['page']=="view_orders") include("orders.php");
   elseif ($_SESSION['page']=="view_customers") include("customers.php");
   elseif ($_SESSION['page']=="view_products") include("products.php");
   elseif ($_SESSION['page']=="about") include("about.php");
   elseif ($_SESSION['page']=="Insert New Customer") include("insert_customer.php");
   elseif ($_SESSION['page']=="Insert New Product") include("insert_product.php");
   elseif ($_SESSION['page']=="Insert New Order") include("insert_order.php");
   elseif ($_SESSION['page']=="Search") include("left_search.php");
   elseif ($_SESSION['page']=="Submit") include("right_search.php");
	
   else include("home.php");
   
else include("home.php");
?>
</div>

<div id="leftbar">
<?php include("leftbar.php");?>
</div>

</div>


<div id="rightbar">
<?php include("rightbar.php");?>
</div>

<div id="footer">
<?php include_once("footer.php");?>	
</div>

</div>

 <script type="text/javascript">
    function updateTextInput(val) {
      document.getElementById('textInput').value=val; 
    }
	
	function updateRangeInput(val) {
      document.getElementById('rangeInput').value=val; 
    }	
 </script>

</body>

</html>
