<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Register</title>
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

            <form class="search">
                <input name="from" type="text" placeholder="From: Kraków Główny">
                <input name="to" type="text" placeholder="To: Warszawa Centralna">
                <input name="date" type="date" value="05.12.2022" onfocus="(this.type='date')" onblur="(this.type='text')">
                <input name="time" type="time" value="12:12">

                <button>submit</button>
            </form>
            <a href="register">Don't have an account? Register!</a>
        </div>
</body>