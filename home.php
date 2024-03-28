
        
<?php
include_once 'admin-header.php';

 $id = isset($_SESSION['userId']) ? escape($_SESSION['userId']) : "";
    if($id == ""){
         header('Location: index.php');
    }
    
    $photo =isset($_SESSION['photo']) ? escape($_SESSION['photo']) : "";
    $users = getUsers();
?>

   <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 100px auto;
            text-align: center;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
/*        input[type="file"] {
            display: none;
        }*/
        .upload-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .upload-btn:hover {
            background-color: #0056b3;
        }
        #profile-container {
    width: 150px;
    height: 150px;
    overflow: hidden;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 50%;
}
    </style>
   

   

<div class="container">
        <h1>Welcome to Our Website <?php echo escape($_SESSION["username"])?></h1>
        <p>We're glad to have you here!</p>
         
           <form action="upload.php" class="was-validated" id="registerform" method="post" enctype="multipart/form-data">
                        <div class="p-3">
                            
        <div class=" mb-3 w-50 p-3 ">
                                <span class="input-group-text bg-primary"><i
                                        class="bi bi-person-plus-fill text-white"> </i></span>
            <?php if($photo == ""){?>
                 <label for="fileSelect">Upload Profile Picture:</label>
          <?php   }else { ?>
                          <div id="profile-container">
   <image id="profileImage" src="uploads/<?php echo trim($photo);?>"/>
</div>             
                                  
        <label for="fileSelect">Edit Profile Picture:</label>
          <?php } ?>   

        <input type="file" name="photo" id="fileSelect">
       
        <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
                                 
              <input type="submit" name ="submit" class="btn btn-primary" value="Update" />                       
                             </div>
                        </div></form>
    </div>
    
    
<footer class="container-fluid">
    <p>Prabitha Vaikath</p>
</footer>
<script>


</script>
</body>
</html>
