<?php
session_start();
require_once __DIR__ . '/chat.php';

    $chat = new chat();
    $chat->send($_POST["ID"], $_POST["message"]);
