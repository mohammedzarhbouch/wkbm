<?php
session_start();
require_once("../back-end/conn.php");

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html'); // Redirect naar de inlogpagina als de gebruiker niet is ingelogd
    exit();
}

// Haal gebruikersinformatie op uit de database
$query = "SELECT voornaam, achternaam, email, id, profile_picture FROM user WHERE id = ?";
$stmt = $con->prepare($query);
$userID = (int)$_SESSION["id"];
$stmt->bind_param("i", $userID);
$stmt->bind_result($voornaam, $achternaam, $email, $id, $profilePicture);
$stmt->execute();
$stmt->fetch();
$stmt->close();

// Update de profielfoto als er een bestand is geüpload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profilePicture"])) {
    $targetDir = "../img/";
    $targetFile = $targetDir . basename($_FILES["profilePicture"]["name"]);
    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
        // Update de database met de nieuwe profielfoto
        $query = "UPDATE user SET profile_picture = ? WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("si", $targetFile, $userID);
        $stmt->execute();
        $stmt->close();
        // Redirect om de wijzigingen te laten zien
        header('Location: profiel.php');
        exit();
    } else {
        echo "Er is een probleem opgetreden bij het uploaden van de afbeelding.";
    }
}
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
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="profilePicture" accept="image/*" onchange="this.form.submit()" id="file-input" style="display: none;">
                <label for="file-input">
                    <img src="<?php echo $profilePicture ?? '../img/default-profile-picture.jpg'; ?>" alt="Profielfoto" id="profile-img">
                </label>
            </form>
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
        </form>
    </div>
</section>
<footer>
    ©2024 WKBM Finance. Alle rechten voorbehouden.
</footer>
</body>
</html>
