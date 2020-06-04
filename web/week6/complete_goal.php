<?php

$username = htmlspecialchars($_GET['username']);
$taskId = htmlspecialchars($_GET['taskId']);
$complete = htmlspecialchars($_GET['complete']);

// echo $taskId;
// echo $username;
// echo $complete;

require "../dbConnect.php";
$db = getDb();

$complete = !$complete;

$stmt = $db->prepare("UPDATE goals SET is_complete=:complete WHERE id = :taskId;");
$stmt->bindValue(':complete', $complete, PDO::PARAM_BOOL);
$stmt->bindValue(':taskId', $taskId, PDO::PARAM_BOOL);

$stmt->execute();

$new_page = "goal.php?username=$username";

header("Location: $new_page");
die();

?>