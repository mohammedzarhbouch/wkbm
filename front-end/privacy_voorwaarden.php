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
    <link rel="stylesheet" href="../css/privacy_voorwaarden.css">
    <title>Privacybeleid</title>
</head>
<body>

<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
        <span></span>
    </label>
    <?php require_once("../mainmenu.php"); ?>
</div>

<div class="header">WKBM FINANCE</div>

<section>
    <h2>Privacybeleid</h2>
    <p>
        Wij respecteren jouw privacy. Verzamelde gegevens worden veilig bewaard, 
        niet gedeeld zonder toestemming, en dienen alleen voor de verbetering van onze diensten.
        <br><br> Algemene Voorwaarden: Door onze site te gebruiken, ga je akkoord met de voorwaarden. 
        Houd je accountgegevens veilig, gebruik de site verantwoord, en respecteer ons auteursrecht.
        Wijzigingen kunnen plaatsvinden, dus blijf op de hoogte.
    </p>
</section>

<footer>
    ©2024 WKBM Finance. Alle rechten voorbehouden.
</footer>

</body>
</html>