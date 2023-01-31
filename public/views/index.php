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

            <form class="search">
                <input name="from" type="text" placeholder="From: Kraków Główny">
                <input name="to" type="text" placeholder="To: Warszawa Centralna">
                <input name="date" type="date" value="05.12.2022" onfocus="(this.type='date')" onblur="(this.type='text')">
                <input name="time" type="time" value="12:12">

                <button>submit</button>
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
</body>