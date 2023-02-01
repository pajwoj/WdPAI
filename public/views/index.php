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
            <div class="headerText">
                Train Lookup
            </div>

            <form action="results" class="search" autocomplete="off" method="get">
                <input id="from" name="searchQuery" type="text" placeholder="From: Kraków Główny">
                <input id="to" name="searchQuery" type="text" placeholder="To: Warszawa Centralna">
                <input id="date" name="date" type="date" value="05.12.2022" onfocus="(this.type='date')" onblur="(this.type='text')">
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