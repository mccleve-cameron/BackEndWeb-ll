<?php

$userId = htmlspecialchars($_POST['userId']);
$newTask = htmlspecialchars($_POST['goalContent']);
$addDate = $_POST['date'];

require "../dbConnect.php";
$db = getDb();

echo $userId;
echo $newTask;
echo $addDate;

$stmt = $db->prepare('INSERT INTO goals VALUES (DEFAULT, :newTask, FALSE, '2020-06-02', :userId);');
$stmt->bindValue(':newTask', $newTask, PDO::PARAM_STR);
$stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
$stmt->execute();

// $new_page = "goal.php?id=$userId";

// header("Location: $new_page");
// die();

?>