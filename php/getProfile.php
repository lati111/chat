<?php
session_start();
require_once "PDO.php";

$database = new database("chat");
$db = $database->getConn();

$sql = "SELECT username FROM users WHERE ID = :userID";
$stmt = $db->prepare($sql);
$stmt->bindParam(":userID", $_POST["userID"]);
$stmt->execute();
echo json_encode($stmt->fetch(PDO::FETCH_ASSOC), JSON_THROW_ON_ERROR);