<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <title>Login</title>
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

            <form class="login" action="login" method="post">
                <input name="email" type="text" placeholder="john@doe.com">
                <input name="password" type="password" placeholder="password">
                <button>login</button>
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
    </div>
</body>