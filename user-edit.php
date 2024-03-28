        
<?php
require_once 'core/init.php';
include_once 'admin-header.php';

$type = isset($_SESSION['type']) ? $_SESSION['type'] : "";

if ($type == 2) {
    $id = isset($_SESSION['userId']) ? $_SESSION['userId'] : "";
    if ($id == "") {
        header('Location: index.php');
    }
} else if ($type == 1) {
    $id = $_GET['id'];
}

//$sql = "select * from users where id=".$id;
//
//$users = $conn->query($sql);
$users = getUsers($id);
$row = "";
if ($users->num_rows > 0) {
    // output data of each row
    $row = $users->fetch_assoc();
}
?>

<div class="col-sm-9">
    <h4><small>Profile</small></h4>
    <hr>

    <div class="text-center">
        <h3 class="text-primary">Update Account</h3>



        <form action="user-update.php" class="was-validated" id="registerform" method="post" enctype="multipart/form-data">
            <div class="p-3">



                <div class=" mb-3 w-50 p-3 ">
                    <span class="input-group-text bg-primary"><i
                            class="bi bi-person-plus-fill text-white"> </i></span>
                    <input  type="hidden" value="<?php echo $row['id'] ?>" name="id" class="form-control" >

                    <input  type="text" value="<?php echo $row['name'] ?>" name="name" class="form-control" placeholder="Full Name" required>
                </div>
                <div class=" mb-3">
                    <span class="input-group-text bg-primary"><i
                            class="bi bi-envelope text-white"></i></span>
                    <input type="email" value="<?php echo $row['email'] ?>" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class=" mb-3">
                    <span class="input-group-text bg-primary">
                        <i class="bi bi-lock-fill text-white"></i></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
                </div>
                <div class=" mb-3">
                    <span class="input-group-text bg-primary">
                        <i class="bi bi-unlock-fill text-white"></i>
                    </span>
                    <input type="password" name="rpassword" id="rpassword" class="form-control" placeholder="Confirm Password" required>
                </div>


                <div class="d-grid col-12 mx-auto">

                    <input type="submit" class="btn btn-primary" value="Update" />
                </div>

            </div>
        </form>
    </div>
</div>

