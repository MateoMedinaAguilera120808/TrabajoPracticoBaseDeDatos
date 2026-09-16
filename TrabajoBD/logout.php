PHP
<?php
session_start();
session_unset();
session_destroy();

// Redirige al login dentro de la carpeta visual
header("Location: visual/login.php");
exit();
?>