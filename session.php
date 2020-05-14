<html>
    <head>
	<base target="bottom-frame">
</head>
<body>
<?php

session_start();

if(!empty($_REQUEST['form_products']))
{	
	// Assign SESSION variables to values received from submitting the form
	if(!isset($_SESSION['products']))
	{	
		$_SESSION['products'][0] = $_REQUEST['form_products'];
		$_SESSION['quantity'][0] = $_REQUEST['quantity'];
		$_SESSION['id'][0] = $_REQUEST['prodId'];
		$_SESSION['unitQuant'][0] = $_REQUEST['unitQuant'];
		$_SESSION['prodPrice'][0] = $_REQUEST['form_prod_price'];
	}
	else
	{
		$newProdID = $_REQUEST['prodId'];
		$match = false;
                for ($i=0; $i < sizeof($_SESSION['products']); $i++)
		{
			if($newProdID == $_SESSION['id'][$i])
			{
				$_SESSION['quantity'][$i]+=$_REQUEST['quantity'];
				$match = true;				
				break;
			}
		}	
		if(!$match)
		{
			$_SESSION['products'][] = $_REQUEST['form_products'];
			$_SESSION['prodPrice'][] = $_REQUEST['form_prod_price']; 
			$_SESSION['id'][] = $newProdID;
			$_SESSION['quantity'][] = $_REQUEST['quantity'];
			$_SESSION['unitQuant'][] = $_REQUEST['unitQuant'];
		}
	}
}
else
{
	print "<h1>No products to add <br> at the moment.</h1> <br>";
}

?>

<form id = "updateCart" action = "cart.php" method = "post"> 
<input type = "hidden" id = "update" name = "update">
<script type = "text/javascript">
    document.getElementById("updateCart").submit();     
</script>
</form>

</body>
</html>