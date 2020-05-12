<html>
    <head>
        <title> Grocery Store</title>
        <link rel="stylesheet" href="CSS/index3.css" type="text/css">
        <script src="JS/display.js"></script>
        <script src="JS/jquery.min.js"></script>
        <base target="bottom-frame">
    </head>

    <body>
        <div id="title">
            <form action="clear.php" method="post">
                <input type="submit" id="clear" value="Clear"/>
            </form>
            <form action="checkout.php" method="post">
                <input type="submit" id="checkout" value="Checkout" onclick="return display()"/>
            </form>
            <h3>Cart List</h3>
        </div>
        <hr/>
        <div>
        <?php

session_start();
	print "<table id = 'list'> <tr> <th> Product ID</th> <th> Product Name </th> <th>Unit Quantity</th> <th> Unit Price ($)</th> <th> Units </th> <th> Value ($) </th> ";
	
if(isset($_SESSION['products']))
{
	$cartPrice = 0;
	for ($i=0;$i<sizeof($_SESSION['products']);$i++)
	{
		print "<tr> <td align = 'center'>".$_SESSION['id'][$i]. "</td>";
		print "<td align = 'center'>". $_SESSION['products'][$i]."</td> ";
		print "<td align = 'center'>".$_SESSION['unitQuant'][$i]."</td>";
		print "<td align = 'center'>". $_SESSION['prodPrice'][$i] ."</td>";
		print "<td align = 'center'>". $_SESSION['quantity'][$i]."</td>";
		$tmp = $_SESSION['prodPrice'][$i]*$_SESSION['quantity'][$i];
		print "<td align = 'center'> ".number_format($tmp,2) ."</td></tr>";
		$cartPrice += $tmp;
	}
        print "</table>";
        print "<br>";
        print "<table id='total'>";
	echo "<tr> <td>Total price for ".sizeof($_SESSION['products']). " product(s): </td> <td align = 'center'> ".number_format($cartPrice,2)."</td></tr></table></div>";
}
else
{
	echo "<h1> Shopping cart is currenty empty. Please pick a product...</h1>";
}

?>
    </body>
</html>
