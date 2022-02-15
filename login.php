<?php
session_start();
$_SESSION["ID"] = str_replace("]", "", $_POST["ID"]);