<?php

session_start();
require_once("conn.php");

$userID = (int)$_SESSION["id"];

$bedrag = $_POST["bedrag"];
$rekeningnummer = $_POST["rekeningnummer"];

// Retrieve the sender's information
$senderQuery = "SELECT voornaam, achternaam FROM user WHERE id = ?";
$senderStmt = $con->prepare($senderQuery);
$senderStmt->bind_param("i", $userID);
$senderStmt->execute();
$senderStmt->bind_result($voornaam, $achternaam);
$senderStmt->fetch();
$senderStmt->close();

// Retrieve the sender's balance
$query = "SELECT balance FROM user_balance WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $userID);
$stmt->execute();
$stmt->bind_result($balans);
$stmt->fetch();
$stmt->close();

if ($balans >= $bedrag) {
    // Deduct the amount from the sender's balance
    $newBalance = $balans - $bedrag;
    $updateSql = "UPDATE user_balance SET balance = ? WHERE id = ?";
    $updateStmt = $con->prepare($updateSql);
    $updateStmt->bind_param("di", $newBalance, $userID);
    $updateStmt->execute();
    $updateStmt->close();

    // Retrieve the recipient's balance based on rekeningnummer (assuming it's an ID)
    $recipientQuery = "SELECT balance FROM user_balance WHERE id = ?";
    $recipientStmt = $con->prepare($recipientQuery);
    $recipientStmt->bind_param("i", $rekeningnummer);
    $recipientStmt->execute();
    $recipientStmt->bind_result($recipientBalance);
    $recipientStmt->fetch(); // Fetch the result
    $recipientStmt->close(); // Close the statement

    if ($recipientBalance !== null) {
        // Update the recipient's balance
        $newRecipientBalance = $recipientBalance + $bedrag;
        $updateRecipientSql = "UPDATE user_balance SET balance = ? WHERE id = ?";
        $updateRecipientStmt = $con->prepare($updateRecipientSql);
        $updateRecipientStmt->bind_param("di", $newRecipientBalance, $rekeningnummer);
        $updateRecipientStmt->execute();
        $updateRecipientStmt->close();

        // Insert the transaction with sender's information
        $insertTransactionSql = "INSERT INTO transactions (user_id, sender_name, date, amount) VALUES (?, CONCAT(?, ' ', ?), CURDATE(), ?)";
        $insertTransactionStmt = $con->prepare($insertTransactionSql);
        $insertTransactionStmt->bind_param("issd", $rekeningnummer, $voornaam, $achternaam, $bedrag);
        $insertTransactionStmt->execute();
        $insertTransactionStmt->close();

        echo header("location:../front-end/home.php");
    } else {
        echo "Recipient not found";
    }
} else {
    echo "Insufficient funds";
}
