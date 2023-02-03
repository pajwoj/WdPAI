<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/trains.css">
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

        <form action="trainresults" class="listBox" autocomplete="off" method="get">
            <input id="train" name="train" type="text" placeholder="IC 3560 WITKACY">

            <button id="submit">submit</button>
        </form>

        <div class="messages">
            <?php
            if (isset($messages)) {
                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>

        <a href="register">Don't have an account? Register!</a>
    </div>

    <script type="text/javascript" src="./public/js/trains.js"></script>
</body>