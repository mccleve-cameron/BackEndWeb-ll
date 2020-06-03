<?php
session_start();

$username = htmlspecialchars($_GET['username']);
$userId = htmlspecialchars($_GET['userId']);
$newTask = htmlspecialchars($_GET['goalContent']);
$addDate = $_GET['date'];

$_SESSION['currentId'] = $userId;

require "../dbConnect.php";
$db = getDb();



$stmt = $db->prepare("INSERT INTO goals VALUES (DEFAULT, :newTask, FALSE, :addDate, :userId);");
$stmt->bindValue(':newTask', $newTask, PDO::PARAM_STR);
$stmt->bindValue(':addDate', $addDate, PDO::PARAM_STR);
$stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
$stmt->execute();

$new_page = "goal.php?username=$username";

header("Location: $new_page");
die();

?>