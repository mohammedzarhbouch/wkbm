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
    <link rel="stylesheet" href="../css/profiel.css">
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

    <div id="formBox">

        <form>
            <label for="fname">Voornaam:</label><br>
            <input type="text" id="fname" name="fname"><br><br>
            <label for="lname">Achternaam:</label><br>
            <input type="text" id="lname" name="lname"><br><br>
            <label for="lname">E-Mail:</label><br>
            <input type="text" id="lname" name="lname"><br><br>
            <label for="lname">WKBM-Bankrekeningnummer:</label><br>
            <input type="text" id="lname" name="lname"><br><br><br>
            <input type="submit" value="Opslaan ">
        </form>

    </div>
        
    </section>

</body>
</html>
