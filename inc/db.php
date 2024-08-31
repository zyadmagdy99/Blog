<?php
session_start();
$ServerN = "localhost";
$username = "root";
$pass = "";
$dbname = "blog";

$connection = mysqli_connect($ServerN,$username,$pass,$dbname);


