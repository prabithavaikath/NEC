<?php

require_once 'core/init.php';

//Fetch Users
function getUsers($id = "") {
   $conn = connection();
   if ($id == "") {
        $sql = "select * from users";
    } else {
        $sql = "select * from users where id=" . $id;
    }


    $users = $conn->query($sql);
    return $users;
}
