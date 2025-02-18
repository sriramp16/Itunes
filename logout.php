<?php
session_start();

unset($_SESSION['loggedInUser']);
session_destroy();

header('Location: login.php');
exit();
?>