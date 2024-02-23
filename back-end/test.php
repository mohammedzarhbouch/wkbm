<?php


session_start();

require_once("conn.php");

$query = "UPDATE user_balance SET balance = balance + 20 WHERE id = ?";
$stmt = $con->prepare($query);

$userID = (int)$_SESSION["id"];

$stmt->bind_param("i", $userID);


$stmt->execute();


$stmt->close();
$con->close();

header("location: ../front-end/home.php");