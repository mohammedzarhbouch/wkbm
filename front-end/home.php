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
$stmt->bind_result($balans);
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

            <div class="balance">Balans €<?php echo $balans  ?> </div>

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
                    <?php
                    include("../back-end/geschiedenis.php");
                    ?>
                </tbody>
            </table>
        </div>

        <div id="popup">
        <form action="../back-end/overboeken.php" method="post">
            <div id="bedrag"> Bedrag</div>
            <input id="bedragInput" name="bedrag" type="number">

            <div id="rekeningNummer" >Rekening nummer</div>
            <input id="rekeningNummerInput" name="rekeningnummer" type="number">

            <button type="submit" value="submit" id="verzendKnop">Verzenden</button>
        </form>
        </div>
     
        <button  type="button" id="openPopup">Overboeken</button>



    </section>

<footer>
    ©2024 WKBM Finance. Alle rechten voorbehouden.
</footer>
<script src="home.js"></script>

</body>
</html>
