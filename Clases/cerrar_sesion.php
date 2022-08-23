<?php
 session_start();
 
 session_destroy();
 setcookie ("usu", "", time () - 604800);
header('Location: ../index.php');