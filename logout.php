<?php
require_once "auth-log.php";
registrarLog("Cierre de sesión", "Sesión cerrada");
session_destroy();
session_start();
$_SESSION["usuario"] = "invitado";
header("Location: login.php");
exit;