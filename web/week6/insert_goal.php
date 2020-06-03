<?php

$userId = htmlspecialchars($_POST['userId']);
$newTask = htmlspecialchars($_POST['goalContent']);
$addDate = $_POST['date'];

echo $userId;
echo $newTask;
echo $addDate;

session_start();
require "../dbConnect.php";
$db = getDb();

$stmt = $db->prepare("INSERT INTO goals VALUES (DEFAULT, :newTask, FALSE, $addDate, :userId);");
$stmt->bindValue(':newTask', $newTask. PDO::PARAM_STR);
$stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
$stmt->execute();

$new_page = "goal.php?id=$userId";

header("Location: $newTask");
die();

?>