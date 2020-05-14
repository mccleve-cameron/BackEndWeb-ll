<?php
session_start();

if (isset($_POST['address'])) {
    $_SESSION['address'] = $_POST['address'];
}

echo $_SESSION['address'];
?>