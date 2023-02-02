<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/results.css">
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

        RESULTS PAGE abcd

        <div class="messages">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
    </div>
</body>