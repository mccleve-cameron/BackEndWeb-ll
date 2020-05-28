<?php
    session_start();
    
    $_SESSION['username'] = $_GET['uInput'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoHabit</title>
</head>
<header><h1>GoHabit</h1></header>
<body>
<h3>Search for a Username</h3>
<form method="GET" action="">
<button type="submit" id="search"  name="search">Search</button>
    <input id="uInput" type="search" name="uInput" placeholder="username">
</form>

<script>
    const username = document.querySelector("#search").addEventListener('click', display);

    function display() {
        const username = document.getElementById('uInput').value;

    }


</script>
</body>
</html>