<?php
session_start();
unset($_SESSION['connected']);
header('Location: bureaux.php');
exit;