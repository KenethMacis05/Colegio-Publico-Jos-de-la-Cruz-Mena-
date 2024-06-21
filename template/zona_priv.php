<?php
    session_start();
    
    if (!isset($_SESSION['usuarioautenticado'])) {
        header("Location: ../index.php");
    }
?>