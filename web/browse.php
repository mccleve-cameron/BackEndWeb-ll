<?php
session_start();

if (empty($_SESSION['cart'])) {
    //$_SESSION['cart'] = array();
}

if (isset($_POST['hat'])) {$_SESSION['hat'] = "Hat";}
if (isset($_POST['shirt'])) {$_SESSION['shirt'] = "Shirt";}
if (isset($_POST['shoes'])) {$_SESSION['shoes'] = "Shoes";}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="cart.js"></script>
    <link rel="stylesheet" href="practice.css">
    <title>Browse</title>
</head>

<header class="softRed">Browse Page</header>

<body>

    <main>
        <section>
            <div>Hat</div>
            <div>
                <form method="POST" action="">
                    <button type="submit" name="hat" value="hat">Add to Cart</button>
                </form>
            </div>
        </section>
        <section>
            <div>Shirt</div>
            <div>
                <form method="POST" action="">
                    <button type="submit" name="shirt" value="shirt">Add to Cart</button>
                </form>
            </div>
        </section>
        <section>
            <div>Shoes</div>
            <div>
                <form method="POST" action="">
                    <button type="submit" name="shoes" value="shoes">Add to Cart</button>
                </form>
            </div>
        </section>

        <button><a href="cart.php">View Cart</a></button>
    </main>


    <footer class="softRed">
        &copy; 2020 | Cameron McCleve | CSE 341
    </footer>

</body>