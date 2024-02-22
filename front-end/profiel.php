<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html'); // Redirect to the login page if not logged in
    exit();
}


$query = "SELECT voornaam, achternaam FROM user WHERE id = ?"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profiel.css">
    <title>Profiel</title>
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
        <div id="container">
            <div class="profile-picture">
                <input type="file" accept="image/*" onchange="previewImage(event)" id="file-input" style="display: none;">
                <label for="file-input">
                    <img src="../img/blank-profile-picture-973460_640.webp" alt="Profielfoto" id="profile-img">
                </label>
            </div>
            <div id="textProfielFoto"><h3>Brian Arrammach</h3></div>
        </div>

        <div id="formBox">
            <form>
                <label for="fname">Voornaam:</label><br>
                <div id="voornaam">test<br><br></div>
                <label for="lname">Achternaam:</label><br>
                <input type="text" id="lname" name="lname"><br><br>
                <label for="lname">E-Mail:</label><br>
                <input type="text" id="lname" name="lname"><br><br>
                <label for="lname">WKBM-Bankrekeningnummer:</label><br>
                <input type="text" id="lname" name="lname"><br><br><br>
                <input type="submit" value="Opslaan">
            </form>
        </div>
    </section>
    <footer>
        ©2024 WKBM Finance. Alle rechten voorbehouden.
    </footer>
</body>
</html>

