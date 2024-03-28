<?php

require_once 'core/init.php';

   $id = isset($_SESSION['userId']) ? escape($_SESSION['userId']) : "";
    if($id == ""){
         header('Location: index.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap.min.js"></script>

        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
            .row.content {
                height: 1500px
            }

            /* Set gray background color and 100% height */
            .sidenav {
                background-color: #f1f1f1;
                height: 100%;
            }

            /* Set black background color, white text and some padding */
            footer {
                background-color: #555;
                color: white;
                padding: 15px;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {
                    height: auto;
                }
            }
        </style>
    </head>
    <body>
        <?php
        
        
        //$conn = new mysqli(Config::get('mysql/host'), Config::get('mysql/username'), Config::get('mysql/password'), Config::get('mysql/db'));
        $conn = connection();
        ?>
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 sidenav">
                    <h4></h4>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="home.php">Home</a></li>
                       <?php  if(escape($_SESSION['type']) == 1){?> <li><a href="users.php">Users</a></li><?php } ?>
                       
                       <?php  if(escape($_SESSION['type'])== 2){?> <li><a href="user-edit.php">Profile</a></li><?php } ?>
                        <li><a href="logout.php">Logout</a></li>
                    </ul><br>


                </div>

