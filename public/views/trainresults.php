<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/trainResults.css">
    <title>Register</title>
</head>

<body>
<?php include "menu.php"; ?>

<div class="container">
    <div class="icon">
        <img src="public/img/icon.svg">
    </div>

    <div class="formContainer">
        <div class="headerText">
            Train Lookup
        </div>

            <?php
            if(isset($results)){
                print($_GET['train']);

                echo("<div class='listBox'>");
                echo("<table>");
                echo("<tr><th class='headerStation'>STACJA</th><th class='headerTime'>GODZINA ODJAZDU</th></tr>");
                foreach ($results[0] as $current) {
                    echo("<tr>");
                    echo("<td class='station'>".$current->getStation()."</td><td class='time'>".$current->getTime()."</td>");
                    echo("</tr>");
                }
                echo("</table>");
                echo("</div>");
            }
            ?>
    </div>
</body>