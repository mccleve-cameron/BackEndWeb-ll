<?php

$username = htmlspecialchars($_GET['username']);
$taskId = htmlspecialchars($_GET['taskId']);

echo $taskId;
echo $username;

require "../dbConnect.php";
$db = getDb();



$stmt = $db->prepare("DELETE FROM goals WHERE id = :taskId;");
$stmt->bindValue(':taskId', $taskId, PDO::PARAM_INT);

$stmt->execute();

$new_page = "goal.php?username=$username";

header("Location: $new_page");
die();

?>