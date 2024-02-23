<?php
session_start();
require_once("../back-end/conn.php");

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html'); // Redirect to the login page if not logged in
    exit();
}


$gebruiker = "SELECT voornaam, achternaam FROM user where id = ?";
$stmtGebruiker = $con->prepare($gebruiker);
$userID = (int)$_SESSION["id"];

$stmtGebruiker->bind_param("i", $userID);

$stmtGebruiker->execute();
$stmtGebruiker->bind_result($voornaam, $achternaam);
$stmtGebruiker->fetch();
$stmtGebruiker->close();


$query = "SELECT balance FROM user_balance WHERE id = ?";
$stmt = $con->prepare($query);



$stmt->bind_param("i", $userID);

$stmt->execute();
$stmt->bind_result($balance);
$stmt->fetch();
$stmt->close();




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
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>
            <?php require_once("../mainmenu.php"); ?>
        </div>

        <div class="header">WKBM FINANCE</div>

        <div class="gebruiker"> Welkom <?php echo $voornaam . ' ' . $achternaam ?></div>

            <div class="balance">Balans €<?php echo $balance  ?> </div>

        <div id="overzicht">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Naam</th>
                        <th>Uitgaven</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="active-row">
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
                    <tr>
                        <td>14 feb</td>
                        <td>MyTicket</td>
                        <td>-555,67</td>
                    </tr>
                    <tr>
                        <td>14 feb</td>
                        <td>MyTicket</td>
                        <td>-555,67</td>
                    </tr>
                    
                   
                    <!-- Additional rows can be added here -->
                </tbody>
            </table>
        </div>

        <div id="popup">
            <div id="bedrag"> Bedrag</div>
            <input id="bedragInput" type="number">

            <div id="rekeningNummer" >Rekening nummer</div>
            <input id="rekeningNummerInput" type="number">
            <button id="verzendKnop">Verzenden</button>
        </div>
        <button type="button" id="openPopup">Overboeken</button>



    </section>

<footer>
    ©2024 WKBM Finance. Alle rechten voorbehouden.
</footer>
<script src="home.js"></script>

</body>
</html>
