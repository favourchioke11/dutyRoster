<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'todolist';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "Error connecting to server" . $conn->connect_error;
    die;
}

return $conn;


?>