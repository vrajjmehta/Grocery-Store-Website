<html>
  <head>
  <base target="bottom-frame">
</head>
<body>
<?php
session_start();
error_reporting(0);
$name = $_REQUEST['custName'];
$address = $_REQUEST['address'];
$suburb = $_REQUEST['suburb'];
$state= $_REQUEST['state'];
$country = $_REQUEST['country'];
$email = $_REQUEST['email'];
$subject = "Details of order placed.";
$message = "Dear $name \n Thank you for placing an online order with us. Here are the items that you ordered: \n
        <tr> <td>Total price for ".sizeof($_SESSION['products']). " product(s) </td> <td align = 'center'> ".number_format($cartPrice,2)."</td></tr></table></div>
        <hr/>
        <br/>";
$headers = "vrajmehta832@gmail.com";

mail($email, $subject, $message, $headers);
echo "Dear $name <br> Thank you for placing an online order with us.<br>";
print "Your mail has been sent. Your order will be delivered soon.";
?>

</body>