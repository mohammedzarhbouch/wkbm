<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html'); // Redirect to the login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Rekeningoverzicht</title>
</head>
<body>
    <section>
        <div class="header">WKBM FINANCE</div>

        <table class="content-table">
            <thead>
                <tr>
                    <th>Datum</th>
                    <th>Locatie</th>
                    <th>Uitgaven</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1 feb</td>
                    <td>Jumbo</td>
                    <td>-9,05</td>
                </tr>
                <tr class="active-row">
                    <td>5 feb</td>
                    <td>AliBaba</td>
                    <td>+230,99</td>
                </tr>
                <tr>
                    <td>14 feb</td>
                    <td>MyTicket</td>
                    <td>-555,67</td>
                </tr>
            </tbody>
        </table>
    </section>

</body>
</html>
