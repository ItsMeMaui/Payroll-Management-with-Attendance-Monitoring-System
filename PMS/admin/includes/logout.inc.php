<?php

if (isset($_POST['logoutBtn'])) {

        session_start();
        session_unset();
        session_destroy();
        header("location: ../index.php?error=logout");
    
}