<?php
session_start();

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="cart.js" ></script>
    <link rel="stylesheet" href="cart.css">
</head>

<header>Browse Page</header>
    
<body>

    <form name="valid_form" action="cart.php" method="post">

        <table style="margin: 10px;">
            <tr>
                <td>Go-Cart</td>
                <td class="price">$300.00</td>
                <td><input value="ADD"> </td>
            </tr>
            
            <tr>
                <td>Pony</td>
                <td class="price">$1000.00</td>
                <td><input name="cart[]" type="checkbox" id="pony" onclick="checkPony()" value='{"item":"Pony","price":"1000"}'></td>
            </tr>
            
            <tr>
                <td>Infinity Stone</td>
                <td class="price">$1,000,000</td>
                <td><input name="cart[]" type="checkbox" id="infinity" onclick="checkInfinity()" value='{"item":"Infinity Stone","price":"1000000"}'></td>
            </tr>
            
            <tr>
                <td>Guitar</td>
                <td class="price">$150.00</td>
                <td><input name="cart[]" type="checkbox" id="guitar" onclick="checkGuitar()" value='{"item":"Guitar","price":"150"}'></td>
            </tr>
            
            <tr>
                <td>Bucket Hat</td>
                <td class="price">$10.99</td>
                <td><input name="cart[]" type="checkbox" id="hat" onclick="checkHat()" value='{"item":"Bucket Hat","price":"10.99"}'></td>
            </tr>
        </table>

        <div><input type="submit" onsubmit="validate()" value="Submit"> </div>
        <div><input type="reset" value="Reset"></div>
    </form>


    <footer>END</footer>

</body>
