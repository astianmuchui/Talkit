<?php
//    DESTROY SESSION
    session_start();
    session_destroy();
    header("Location: ../index.php");
?>
