<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/menu.css">
    <link rel="stylesheet" type="text/css" href="public/css/register.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
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

            <form class="register" action="register" method="post">
                <input name="email" type="text" placeholder="john@doe.com">
                <input name="password" type="password" placeholder="password">
                <input name="passwordConfirm" type="password" placeholder="confirm password">
                <button>register</button>
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

            <a href="login">Already have an account? Log in!</a>
        </div>
    </div>
</body>