<?php
session_start();
$_SESSION["signup_email"] = "";
header('Location: ../maneger.php');