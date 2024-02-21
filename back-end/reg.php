<?php
session_start();
include_once("conn.php");

$voornaam = $_POST['voornaam'];   
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

$stmt = $con->prepare("INSERT INTO user (voornaam, achternaam, email, wachtwoord) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $voornaam, $achternaam, $email, $wachtwoord);

// Set the values of $username and $password here

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        header("Location: ../front-end/index.html");
        exit;
    } else {
        echo "Error: Failed to create account. Please try again.";
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
?>