<?php
session_start();
require_once "PDO.php";

$database = new database("chat");
$db = $database->getConn();
$sql = "SELECT ID, username FROM users WHERE username LIKE :searchTerm AND NOT ID = :ID";

$search = "%" . $_POST["searchTerm"] . "%";
$stmt = $db->prepare($sql);
$stmt->bindParam(":searchTerm", $search);
$stmt->bindParam(":ID", $_SESSION["ID"]);
$stmt->execute();

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC), JSON_THROW_ON_ERROR);