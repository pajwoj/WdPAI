<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Register</title>
</head>

<body>
<?php include "menu.php"; ?>

<div class="container">
    <div class="icon">
        <img src="public/img/icon.svg">
    </div>

    <div class="loginContainer">
        todo profile

        <form action="search" method="get"><button>AAAAA</button></form>
        <div class="messages">
            <?php
            if(isset($messages)){
                foreach ($messages as $message) {
                    print(current($message));
                    print(', ');
                }
            }
            ?>
        </div>
    </div>
</body>