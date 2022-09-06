<?php
$user='root';
$pass='';
try {
    $db = new PDO('mysql:host=localhost;dbname=karma;charset=utf8', $user, $pass);
} catch (PDOException $e) {
    print "Hata!: " . $e->getMessage() . "<br/>";
    die();
}

$base=$_SERVER["DOCUMENT_ROOT"];
$url='http://localhost';

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(1);
?>