<?php
session_start();
require_once("../back-end/conn.php");

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html'); // Redirect to the login page if not logged in
    exit();
}




$query = "SELECT voornaam, achternaam, email, id FROM user WHERE id = ?";
$stmt = $con->prepare($query);

$userID = (int)$_SESSION["id"];

$stmt->bind_param("i", $userID);
$stmt->bind_result($voornaam, $achternaam, $email, $id);
$stmt->execute();
$stmt->fetch();
$stmt->close();

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
            <div id="textProfielFoto"><h3><?php echo $voornaam .' '. $achternaam?></h3></div>
        </div>

        <div id="formBox">
            <form>
                <label for="fname">Voornaam:</label><br>
                <div id="voornaam"><?php echo $voornaam ?><br><br></div>
                <label for="lname">Achternaam:</label><br>
                <div id="voornaam"><?php echo $achternaam ?><br><br></div>
                <label for="lname">E-Mail:</label><br>
                <div id="voornaam"><?php echo $email ?><br><br></div>
                <label for="lname">WKBM-Bankrekeningnummer:</label><br>
                <div id="voornaam"><?php echo $id ?><br><br></div>
                <input type="submit" value="Opslaan">
            </form>
        </div>
    </section>
    <footer>
        ©2024 WKBM Finance. Alle rechten voorbehouden.
    </footer>
</body>
</html>

