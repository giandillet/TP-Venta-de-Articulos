<?php
    session_start();
    session_destroy();
    header("location: ../TPIntegrador/inicio.php");
    exit();
?>