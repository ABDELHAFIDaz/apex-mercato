<?php
session_start();

switch ($_SESSION["role"]) {
    case 'admin':
        header("location: ");
        exit;
    case 'journalist':
        header("location: ");
        exit;
    case 'visitor':
        header("location: ");
        exit;
    default:
        header("location: sign_up.php");
        exit;
}