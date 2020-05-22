<html>
  <head>
  <base target="bottom-frame">
</head>
<body>
<?php
session_start();

error_reporting(0);

// Fetch user details from form name = "check_out" through REQUEST,
$name = $_REQUEST['custName'];
$address = $_REQUEST['address'];
$suburb = $_REQUEST['suburb'];
$state= $_REQUEST['state'];
$country = $_REQUEST['country'];
$email = $_REQUEST['email'];

// PHP MAIL syntax to send an email

$subject = "Grocery Store - Details of order placed.";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$message = "Dear $name \n, Thank you for placing an online order with us. Here are the items that you ordered:\n\n
            <table id = 'list'> 
            <tr> <th> Product ID</th> <th> Product Name </th> <th>Unit Quantity</th> <th> Unit Price ($)</th> <th> Units in cart </th> <th> Value in Cart ($) </th></tr>";
            for ($i=0;$i<sizeof($_SESSION['products']);$i++){
            $message .="<tr>
              <td align = 'center'>". $_SESSION['id'][$i]. "</td>
              <td align = 'center'>". $_SESSION['products'][$i]."</td>
              <td align = 'center'>". $_SESSION['quant'][$i]."</td>
              <td align = 'center'>". $_SESSION['price'][$i] ."</td>
              <td align = 'center'>". $_SESSION['quantity'][$i]."</td>";
            $tmp = $_SESSION['price'][$i]*$_SESSION['quantity'][$i];
            $cartPrice += $tmp;
            $message .= "<td align = 'center'>".number_format($tmp,2) ."</td></tr>";
            }
            $message .="</table>\n";
            $message .="</table><tr> <td>Total price for ".sizeof($_SESSION['products']). " product(s) </td> <td align = 'center'> ".number_format($cartPrice,2)."</td></tr></table>";

mail($email, $subject, $message, $headers);
echo "Dear $name <br> Thank you for placing an online order with us.<br>";
print "Your mail has been sent. Your order will be delivered soon.";
session_destroy();
?>

</body>