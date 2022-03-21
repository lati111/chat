<?php
session_start();
require_once "chat.php";

$chat = new chat();
echo json_encode($chat->getChats(), JSON_THROW_ON_ERROR);