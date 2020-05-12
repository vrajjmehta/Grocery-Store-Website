<html>
<head>
    <title> Grocery Store </title>
    <link rel="stylesheet" href="CSS/index2.css" type="text/css">
    <script src="JS/jquery.min.js"></script>
    <script src="JS/display1.js"></script>
    <base target="bottom-frame">
</head>

<body>
    <h1>Product Information</h1>   
<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "password";
$dbname = "poti";

// $servername = "rerun.it.uts.edu.au";
// $username = "potiro";
// $password = "pcXZb(kL";
// $dbname = "poti";

if(isset($_GET) && !empty($_GET)){
    // echo "Empty";
} else {
    header("Location: right.php");
}
$var = $_GET['id'];

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

$product_array = "SELECT * FROM products WHERE product_id='$var'";

$result = mysqli_query($conn,$product_array);

if(mysqli_num_rows($result) == 1){
    echo "<div id='pDisplay'>";
    echo    "<form name='prodForm' action='session_php.php' method ='get'>";
    $row = mysqli_fetch_assoc($result);                    
    echo "<table id='prodInfo'>";
    echo "<tr><td><b>Product ID:</b></td><td>" . $row['product_id'] . "</td></tr><tr><td><b> Product Name:</b></td><td>" . $row['product_name'] . "</td></tr><tr><td><b>Price:</b></td><td>". $row['unit_price'] . "</td></tr><tr><td><b>Unit Quanity:</b></td><td>". $row['unit_quantity'] . "</td></tr><tr><td><b>In Stock:</b></td><td>".$row['in_stock']. "</td></tr> ";
    echo"<tr><td>Order # <input type='number' id='quantity' name='quantity' value='1' min='1' max='20'></td><td><input type='submit' value='Add' id= 'add' onclick='return displayCart()'></td></tr> ";
    echo"</table>";
    echo "<input type = 'hidden' id = 'prodId' name = 'prodId' value ='".$row['product_id']."'>";
    echo "<input type = 'hidden' id = 'unitQuant' name = 'unitQuant' value ='".$row['unit_quantity']."'>";
    echo "<input type = 'hidden' id = 'form_products' name = 'form_products' value ='".$row['product_name']."'>";
    echo "<input type ='hidden' id = 'form_prod_price' name = 'form_prod_price' value ='".$row['unit_price']."'>";
    echo "<br>";
echo"</form></div>";
}
else
{
    echo "<h1> No product has been chosen yet. </h1> ";
}
mysqli_close($conn);

?>
</body>
</html>


