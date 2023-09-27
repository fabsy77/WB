<?php 

    session_start();

    if ( session_status() === PHP_SESSION_ACTIVE ) {
        $sessionDestroy = session_destroy();
        if ($sessionDestroy) {
            header("Location: index.php");
        }
    }

?>
?>