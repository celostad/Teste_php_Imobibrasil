<?php

$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "sistimob";

// $mysqli_connection = new MySQLi('mysql-server', 'root', 'secret', 'sistimob');
$mysqli_connection = mysqli_connect("$servername", "$username", "$password", "$dbname") or die("Could not connect to the database");

if ($mysqli_connection->connect_error) {
    echo "Desconectado! Erro: " . $mysqli_connection->connect_error;
} else {
    return true;
}
