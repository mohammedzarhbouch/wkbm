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
    <div class="hamburger-menu">

    <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>

        <?php require_once("../mainmenu.php"); ?>
    </div>
    
        <div class="header">WKBM FINANCE</div>

        <div style="max-height: 400px; overflow-y: auto; overflow-x: hidden;">
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
                    <tr class="active-row">
                        <td>22 feb</td>
                        <td>Gymshark</td>
                        <td>-49,95</td>
                    </tr>
                    <tr>
                        <td>22 feb</td>
                        <td>Gymshark</td>
                        <td>-49,95</td>
                    </tr>
                    <tr class="active-row">
                        <td>22 feb</td>
                        <td>Gymshark</td>
                        <td>-49,95</td>
                    </tr>
                    <tr>
                        <td>22 feb</td>
                        <td>Gymshark</td>
                        <td>-49,95</td>
                    </tr>
                    <tr class="active-row">
                        <td>22 feb</td>
                        <td>Gymshark</td>
                        <td>-49,95</td>
                    </tr>
                    <tr>
                        <td>22 feb</td>
                        <td>Gymshark</td>
                        <td>-49,95</td>
                    </tr>
                    <!-- Additional rows can be added here -->
                </tbody>
            </table>
        </div>

        <button type="button">Overboeken</button>
    </section>

</body>
</html>
