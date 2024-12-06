<?php
$host = 'localhost';
$db = 'db_ponpes_ali';
$user = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
} catch (PDOException $exception) {
    echo $exception->getMessage();
    die();
} finally {
    // $conn = null;
}
