<?php 

    try
    {
        $hostname = "insert values here";
        $username = "insert values here";
        $password = "insert values here";
        $port     = "insert values here";
        $database = "insert values here";

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