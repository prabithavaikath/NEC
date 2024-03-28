<?php

// Start the session
require_once 'core/init.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
new register();

// $in ->home();
class register {

    public function __construct() {

        $this->index();
    }

    public function index() {
        $conn = connection();
        $name = isset($_POST['name']) ? escape($_POST['name']) : "";

        $email = isset($_POST['email']) ? escape($_POST['email']) : "";
        $password = isset($_POST['password']) ? escape($_POST['password']) : "";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $date = date("Y-m-d");

        $sql1 = "select * from users where email='" . $email . "'";

        $users = $conn->query($sql1);
        $row = "";
        if ($users->num_rows > 0) {
            // output data of each row
            $row = $users->fetch_assoc();

            $result['message'] = "Email id already Exist";
            $result['success'] = FALSE;
        } else {
            $sql = "INSERT INTO `users`(name,email,password,created_at,updated_at) VALUES ('$name','$email','$hashedPassword','$date','$date')";

            $data = $conn->query($sql);

            if ($data === TRUE) {
                $result['message'] = "New record created successfully";
                $result['success'] = TRUE;
            } else {
                $result['err_message'] = "Error: " . $sql . "<br>" . $conn->error;
                $result['success'] = FALSE;
            }
        }




        $conn->close();
        echo json_encode($result);
    }
}
