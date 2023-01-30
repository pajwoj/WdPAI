<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="menu">
        <div class="menuSection"><a class="fill" href="index">search</a></div>
        <div class="menuSection"><a class="fill" href="register">register</a></div>
        <div class="menuSection"><a class="fill" href="profile">profile</a></div>
        <div class="menuSection"><a class="fill" href="login">login / logout</a></div>
    </div>

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