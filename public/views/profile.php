<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/menu.css">
    <title>Register</title>
</head>

<body>
<?php include "menu.php"; ?>

<div class="container">
    <div class="icon">
        <img src="public/img/icon.svg">
    </div>

    <div class="formContainer">
        Current user: <div class="messages">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
    </div>

    <script type="text/javascript" src="./public/js/profile.js"></script>
</body>