<html>
    <head>
        <title> Grocery Store</title>
        <link rel="stylesheet" href="CSS/cart.css" type="text/css">
        <script src="JS/jquery.min.js"></script>
        <script src="JS/display.js"></script>
        <base target="bottom-frame">
    </head>
    <body onload="return clear()">
        <div id="title">
            <?php
            session_start();
            session_destroy();
            ?>
        </div>
        <a href="cart.php">Go back to cart</a>
    </body>
</html>
