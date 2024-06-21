<?php if ($_SESSION['permisos'] == 1) {
    include_once "dashboard.php";
} elseif ($_SESSION['permisos'] == 2) {
    include_once "dashboard.secret.php";
}
