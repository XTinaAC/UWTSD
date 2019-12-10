<?php
session_start();
?>
    <html>
    <head>
        <title>Dark Little Secret</title>
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
        Welcome <span id="username"></span>! CONFIDENTIAL
    </h1><br/>
    <h2>
        For logged in users only.
    </h2>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
    </body>
    </html>

<?php
$username = $_SESSION['session_uname'];
if ($username != "") {
    echo "<script> document.getElementById('username').innerHTML='" . $username . "';</script>";
} else {
    echo "<script> location.href='week8_1.php';</script>";
}
?>