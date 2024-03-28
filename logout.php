<?php
require_once 'core/init.php';


Cookie::delete('username');
// Finally, destroy the session.
session_destroy();
 header('Location: index.php');