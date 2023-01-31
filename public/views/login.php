<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Login</title>
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

            <form class="login">
                <input name="email" type="text" placeholder="john@doe.com">
                <input name="password" type="password" placeholder="password">
                <button>login</button>
            </form>

            <a href="register">Don't have an account? Register!</a>
        </div>
    </div>
</body>