<?php
session_start();
require_once "message.php";

$message = new message($_POST["messageID"]);
echo json_encode($message->getMessageDetails(), JSON_THROW_ON_ERROR);

