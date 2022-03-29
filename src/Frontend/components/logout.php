<?php

if (isset($_SESSION['user'])) {
    session_destroy();
    header("Location: http://$_SERVER[HTTP_HOST]");
}
else header("Location: http://$_SERVER[HTTP_HOST]"); 
?>
