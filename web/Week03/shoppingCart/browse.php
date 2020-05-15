<?php
session_start();

if (empty($_SESSION['cart'])) {
    //$_SESSION['cart'] = array();
}

if (isset($_POST['hat'])) {$_SESSION['hat'] = "Hat";}
if (isset($_POST['shirt'])) {$_SESSION['shirt'] = "Shirt";}
if (isset($_POST['shoes'])) {$_SESSION['shoes'] = "Shoes";}
if (isset($_POST['basketball'])) {$_SESSION['basketball'] = "Basketball";}
if (isset($_POST['diapers'])) {$_SESSION['diapers'] = "Diapers";}
if (isset($_POST['couch'])) {$_SESSION['couch'] = "Couch";}
if (isset($_POST['doll'])) {$_SESSION['doll'] = "Doll";}
if (isset($_POST['tree'])) {$_SESSION['tree'] = "Tree";}
if (isset($_POST['pants'])) {$_SESSION['pants'] = "Pants";}
if (isset($_POST['movie'])) {$_SESSION['movie'] = "Movie";}
if (isset($_POST['xbox'])) {$_SESSION['xbox'] = "Xbox";}
if (isset($_POST['soda'])) {$_SESSION['soda'] = "Soda";}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="cart.js"></script>
    <link rel="stylesheet" href="cart.css">
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
        <section>
            <div>Basketball</div>
            <div>
                <form method="POST" action="">
                    <button type="submit" name="basketball" value="basketball">Add to Cart</button>
                </form>
            </div>
        </section>
        <section>
            <div>Diapers</div>
            <div>
                <form method="POST" action="">
                    <button type="submit" name="diapers" value="diapers">Add to Cart</button>
                </form>
            </div>
        </section>
        <section>
            <div>Couch</div>
            <div>
                <form method="POST" action="">
                    <button type="submit" name="couch" value="couch">Add to Cart</button>
                </form>
            </div>
        </section>
        <section>
            <div>Doll</div>
            <div>
                <form method="POST" action="">
                    <button type="submit" name="doll" value="doll">Add to Cart</button>
                </form>
            </div>
        </section>
        <section>
            <div>Tree</div>
            <div>
                <form method="POST" action="">
                    <button type="submit" name="tree" value="tree">Add to Cart</button>
                </form>
            </div>
        </section>
        <section>
            <div>Pants</div>
            <div>
                <form method="POST" action="">
                    <button type="submit" name="pants" value="pants">Add to Cart</button>
                </form>
            </div>
        </section>
        <section>
            <div>Movie</div>
            <div>
                <form method="POST" action="">
                    <button type="submit" name="movie" value="movie">Add to Cart</button>
                </form>
            </div>
        </section>
        <section>
            <div>Xbox</div>
            <div>
                <form method="POST" action="">
                    <button type="submit" name="xbox" value="xbox">Add to Cart</button>
                </form>
            </div>
        </section>
        <section>
            <div>Soda</div>
            <div>
                <form method="POST" action="">
                    <button type="submit" name="soda" value="soda">Add to Cart</button>
                </form>
            </div>
        </section>

        <button><a href="cart.php">View Cart</a></button>
    </main>


    <footer class="softRed">
        &copy; 2020 | Cameron McCleve | CSE 341
    </footer>

</body>