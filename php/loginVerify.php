<?php
session_start();
require_once "PDO.php";

$database = new database("chat");
$db = $database->getConn();

$key = 'UkXp2s5v8y/B?E(H+MbQeThVmYq3t6w9z$C&F)J@NcRfUjXnZr4u7x!A%D*G-KaP';
$sql = "SELECT ID FROM users WHERE username = :username AND AES_DECRYPT(password, :key) = :password";

$stmt = $db->prepare($sql);
$stmt->bindParam(":username", $_POST["username"]);
$stmt->bindParam(":password", $_POST["password"]);
$stmt->bindParam(":key", $key);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    $ID = $stmt->fetch(PDO::FETCH_ASSOC)["ID"];
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["ID"] = $ID;
    echo $ID;
} else {
    echo 0;
}
