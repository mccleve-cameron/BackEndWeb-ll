<?php
require "dbConnect.php";
$db = get_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stretch #2</title>
    <link rel="stylesheet" href="team5.css">
</head>
<header><h1>Stretch Challenge #2</h1></header>
<body>
    <?php
    $statement = $db->prepare("SELECT book, chapter, verse, content FROM team5.scriptures");
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $book = $row['book'];
        $chapter = $row['chapter'];
        $verse = $row['verse'];
        $content = $row['content'];

        echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
    }
    ?>
</body>
</html>