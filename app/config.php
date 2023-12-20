<?php

$conn = mysqli_connect('mysql_db','root','root','user_db');
$booksconn = mysqli_connect('mysql_db','root','root','librarysystem');

if ($conn->connect_error || $booksconn->connect_error) {
    die('Database connection error: ' . $conn->connect_error . ' / ' . $booksconn->connect_error);
}
?>