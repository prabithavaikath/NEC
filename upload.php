<?php

require_once 'core/init.php';
// Check if form is submitted
// Check if file uploads are enabled

if (isset($_POST['submit'])) {
    // Check if file is selected
    if (isset($_FILES['photo'])) {
        $file = $_FILES['photo'];

        // File properties
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        // Check if file has no errors
        if ($fileError === 0) {
            // Check file size (optional)
            if ($fileSize <= 5242880) { // 5 MB (in bytes)
                // Generate a unique filename to prevent overwriting existing files
                $fileNewName = uniqid('', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

                // Specify the directory where you want to save uploaded files
                $uploadPath = 'uploads/' . $fileNewName;
                echo "File uploaded successssfully.";
                // Move the uploaded file to the specified directory
                if (move_uploaded_file($fileTmpName, $uploadPath)) {
                    $date = date("Y-m-d");
                    $id = isset($_SESSION['userId']) ? $_SESSION['userId'] : "";
                    $conn = connection();
                    $sql = "UPDATE users SET image='" . $fileNewName . "' , updated_at = '" . $date . "'  WHERE id='" . $id . "'";

                    if ($conn->query($sql) === TRUE) {
                        echo "Record updated successfully";
                        $sql = "SELECT * FROM users WHERE id='" . $id . "'";
                        $users = $conn->query($sql);
                        $row = $users->fetch_assoc();
                        $_SESSION["photo"] = $row['image'];
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }

                    $conn->close();
                    header('Location: home.php');
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "File size exceeds the maximum limit (5 MB).";
            }
        } else {
            echo "Error occurred while uploading the file.";
        }
    }
}
?>
