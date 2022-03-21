<?php
session_start();
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
<div id="loginForm">
    <div id="error"></div>
    <h1>maak account aan</h1>
    <table>
        <tr>
            <td><span class="prepend"><b>gebruikersnaam</b></span></td>
            <td><label><input id="usernameField" type="text" name="username"></label></td>
        </tr>
        <tr>
            <td><span class="prepend"><b>wachtwoord</b></span></td>
            <td><label><input id="passwordField" type="text" name="password"></label></td>
        </tr>
    </table>
    <button id="loginButton" onclick="register()">registreer</button>
    <span><a href="login.php">of log in</a></span>

    <script src="../js/login.js"></script>
</div>
</body>
</html>