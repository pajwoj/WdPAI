<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/search.css">
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

            <form action="results" class="search" autocomplete="off" method="get">
                <input id="from" name="start" type="text" placeholder="From: Kraków Główny">
                <input id="to" name="end" type="text" placeholder="To: Warszawa Centralna">
                <input id="time" name="time" type="time" value="12:12">

                <button id="submit">submit</button>
            </form>

            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>

            <a href="register">Don't have an account? Register!</a>
        </div>

        <script type="text/javascript" src="./public/js/search.js"></script>
</body>