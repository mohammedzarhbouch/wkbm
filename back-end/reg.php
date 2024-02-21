<?php
session_start();
include_once("conn.php");

$voornaam = $_POST['voornaam'];   
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

// Insert into 'user' table
$stmt = $con->prepare("INSERT INTO user (voornaam, achternaam, email, wachtwoord) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $voornaam, $achternaam, $email, $wachtwoord);

if ($stmt->execute()) {
    // Get the last inserted ID from the 'user' table
    $user_id = $con->insert_id;

    // Insert into 'user_balance' table using the user ID
    $balanceStmt = $con->prepare("INSERT INTO user_balance (user_id, balance) VALUES (?, 0)");
    $balanceStmt->bind_param("i", $user_id);
    
    if ($balanceStmt->execute()) {
        header("Location: ../front-end/index.html");
        exit;
    } else {
        echo "Error: Failed to create account. Please try again.";
    }

    $balanceStmt->close();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();


