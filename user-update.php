<?php

//require 'database.php';
require_once 'core/init.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//        $conn = new database();
//        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
$conn = connection();
$name = isset($_POST['name']) ? escape($_POST['name']) : "";
$email = isset($_POST['email']) ? escape($_POST['email']) : "";
$password = isset($_POST['password']) ? escape($_POST['password']) : "";
$id = isset($_POST['id']) ? escape($_POST['id']) : "";
$date = date("Y-m-d");

$sql = "UPDATE users SET name='" . $name . "' , email = '" . $email . "', password= '" . $password . "' ,updated_at = '" . $date . "'  WHERE id='" . $id . "'";

$sql = "SELECT * FROM users WHERE email='" . $email . "'";
$result1 = array();
if ($conn->query($sql) == TRUE) {
    $users = $conn->query($sql);
    $row = $users->fetch_assoc();

    $_SESSION["photo"] = $row['image'];
    $_SESSION["username"] = $row['name'];

    $_SESSION["email"] = $email;
}

//  echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

if ($_SESSION['type'] == 1) {
    header('Location: users.php');
} else {
    header('Location: user-edit.php');
}
    