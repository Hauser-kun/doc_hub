<?php

session_start();

unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['student_login']);

header("location: ./login.php");

?>