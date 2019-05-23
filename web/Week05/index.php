<?php 

    try
    {
        $hostname = "ec2-54-227-245-146.compute-1.amazonaws.com";
        $username = "xishlqtlnqqhqr";
        $password = "a5599158f6b6bba85cd781c336281b6ac6e2d64a10097e5cec6281617ab2fc52";
        $port     = "5432";
        $database = "d54ldp8o2hi2p6";

        $db = new PDO("pgsql:host=$hostname;port=$port;dbname=$database", $username, $password);
    }
    catch(PDOException $ex)
    {
        echo "Error: " . $ex . "<br>";
        die();
    }
    echo "<h1>Scripture Resources</h1><br>";
    foreach($db->query("SELECT * FROM teach_05.scriptures") as $row)
    {
        echo "<strong>" . $row["book"] . " " . $row["chapter"] . ":" . $row["verse"] . "</strong> " . $row["content"] . "<br>";
    }



    

?>