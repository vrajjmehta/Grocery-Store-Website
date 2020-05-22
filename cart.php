<html>
<head>
    <title> Grocery Store</title>
    <link rel="stylesheet" href="CSS/cart.css" type="text/css">
    <script src="JS/display.js"></script>
    <script src="JS/jquery.min.js"></script>
    <base target="bottom-frame">
</head>

<body>
    <div id="title">
        <!-- Form if the user clicks clear button -->
        <form action="clear.php" method="post">
            <input type="submit" id="clear" value="Clear"/>
        </form>
        <!-- Form if user clicks checkout button -->
        <form action="checkout.php" method="post">
            <input type="submit" id="checkout" value="Checkout" onclick="return display_cart()"/>
        </form>
        <h3>Cart List</h3>
    </div>
    <hr/>
    <div>
<?php

session_start();
	print "<table id = 'list'> <tr> <th> Product ID</th> <th> Product Name </th> <th>Unit Quantity</th> <th> Unit Price ($)</th> <th> Units </th> <th> Value ($) </th> ";

// Display products added to cart using SESSION variables
if(isset($_SESSION['products']))
{
	$cartPrice = 0;
	for ($i=0;$i<sizeof($_SESSION['products']);$i++)    //loop to display for 'n' number of products in the cart
	{
		print "<tr> <td align = 'center'>". $_SESSION['id'][$i]. "</td>";
		print "<td align = 'center'>". $_SESSION['products'][$i]."</td> ";
		print "<td align = 'center'>". $_SESSION['quant'][$i]."</td>";
		print "<td align = 'center'>". $_SESSION['price'][$i] ."</td>";
		print "<td align = 'center'>". $_SESSION['quantity'][$i]."</td>";
		$tmp = $_SESSION['price'][$i]*$_SESSION['quantity'][$i];
		print "<td align = 'center'> ".number_format($tmp,2) ."</td></tr>";
		$cartPrice += $tmp;     // Append the Total Cart Amount
	}
        print "</table>";
        print "<br>";
        print "<table id='total'>";
        echo "<tr> <td>Total price for ".sizeof($_SESSION['products']). " product(s): </td> <td align = 'center'> ".number_format($cartPrice,2)."</td></tr></table></div>";
}
else
{
	echo "<h1> Shopping cart is empty. Please pick a product.</h1>";
}

?>

</body>
</html>