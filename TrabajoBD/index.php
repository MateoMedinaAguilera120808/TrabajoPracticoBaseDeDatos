<?php
session_start();

if (isset($_SESSION['idCliente'])) {
    header("Location: visual/index.php");
} else {
    header("Location: visual/logIn.php");
}
exit();
