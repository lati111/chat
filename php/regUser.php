<?php
session_start();
require_once "PDO.php";

$database = new database("chat");
$db = $database->getConn();

$key = 'UkXp2s5v8y/B?E(H+MbQeThVmYq3t6w9z$C&F)J@NcRfUjXnZr4u7x!A%D*G-KaP';
$sql = "INSERT INTO users VALUES (DEFAULT, :username, AES_ENCRYPT(:password, :key))";

$stmt = $db->prepare($sql);
$stmt->bindParam(":username", $_POST["username"]);
$stmt->bindParam(":password", $_POST["password"]);
$stmt->bindParam(":key", $key);
$stmt->execute();

$ID = $db->lastInsertId();
$_SESSION["ID"] = $ID;
$_SESSION["username"] = $_POST["username"];
echo $ID;