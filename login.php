<?php

require_once 'core/init.php';

//$conn = new mysqli(Config::get('mysql/host'), Config::get('mysql/username'), Config::get('mysql/password'), Config::get('mysql/db'));
$conn = connection();
$email = isset($_POST['email']) ? escape($_POST['email']) : "";
$password = isset($_POST['password']) ? escape($_POST['password']) : "";
$remember = isset($_POST['remember']) ? escape($_POST['remember']) : "";

$sql = "SELECT * FROM users WHERE email='" . $email . "'";
$result1 = array();
if ($conn->query($sql) == TRUE) {
    $users = $conn->query($sql);
    $row = $users->fetch_assoc();

    $userPassword = $row['password'];
    if (password_verify($password, $userPassword)) {
        $_SESSION["username"] = $row['name'];
        $_SESSION["userId"] = $row['id'];
        $_SESSION["email"] = $email;
        $_SESSION["type"] = $row['type'];
        $_SESSION["photo"] = $row['image'];
        $result1['message'] = "User Exists.";
        $result1['success'] = TRUE;

        if ($remember == "on") {
            //setcookie("username", $row['email'], time() + (86400 * 30), "/");
            setcookie('username', $row['email'], time() + 3600, '/');
            setcookie("password", $row['password'], time() + 3600, "/");
        }
    }
} else {
    $result1['err_message'] = "User doesn't exist. ";
    $result1['success'] = FALSE;
}
$conn->close();
echo json_encode($result1);
