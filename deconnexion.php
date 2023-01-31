<?php
session_start();
session_destroy(); // Destroy the session
header('Location: ./front/employes.php'); // Redirect to the home page
?>