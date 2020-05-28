<?php
    session_start();
    $_SESSION['username'] = $_GET['uInput'].value;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
    <script>
        console.log($_SESSION['username']);
    </script>
</body>
</html>
