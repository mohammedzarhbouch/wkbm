<?php
// Include the database connection and any necessary setup

// Fetch and display transaction history
$transactionQuery = "SELECT date, sender_name, amount FROM transactions WHERE user_id = ?";
$transactionStmt = $con->prepare($transactionQuery);

if (!$transactionStmt) {
    die('Error in query preparation: ' . $con->error);
}

$transactionStmt->bind_param("i", $userID);
$transactionStmt->execute();

if (!$transactionStmt) {
    die('Error in query execution: ' . $con->error);
}

$transactionStmt->bind_result($transactionDate, $transactionName, $transactionAmount);

while ($transactionStmt->fetch()) {
    echo '<tr class="active-row">';
    echo '<td>' . $transactionDate . '</td>';
    echo '<td>' . $transactionName . '</td>';
    echo '<td>' . $transactionAmount . '</td>';
    echo '</tr>';
}

$transactionStmt->close();
?>
