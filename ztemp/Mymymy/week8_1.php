<?php
session_start();
?>
    <html>
    <head>
        <title>Visitor Mode</title>
        <style>
            h1 {
                text-decoration: underline;
                letter-spacing: 2px;
            }

            h2 {
                color: red;
            }
        </style>
    </head>
    <body>
    <h1>
        Welcome, <span id="username"></span>!
    </h1>
    <form action="login.php" method="post" id="login">
        <h2 id="visitor">
            You are right now in visitors' mode.
        </h2>
        Username: <input type="text" name="username" placeholder="Please input your username"><br/>
        Password: <input type="password" name="password" placeholder="Please input your password">
        <input type="submit" value="Login">
    </form>
    <form action="logout.php" method="post" id="logout">
        <h2 id="visitor">
            You are right now in subscribers' mode.
        </h2>
        <input type="submit" value="Logout">
    </form>
    </body>
    </html>

<?php
$username = $_SESSION['session_uname'];
if ($username != "") {
    echo "<script> document.getElementById('username').innerHTML='$username'; document.getElementById('login').style.display='none'; document.getElementById('logout').style.display='block';</script>";
} else {
    echo "<script> document.getElementById('username').innerHTML='Guests';document.getElementById('logout').style.display='none'; document.getElementById('login').style.display='block';</script>";
}
?>