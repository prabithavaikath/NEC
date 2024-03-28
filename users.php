<?php
include_once 'admin-header.php';

 $id = isset($_SESSION['userId']) ? escape($_SESSION['userId']) : "";
    if($id == ""){
         header('Location: index.php');
    }

$sql = "select * from users";

$users = $conn->query($sql);
?>

<div class="col-sm-9">
    <h4><small>Audits</small></h4>
    <hr>



    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($users->num_rows > 0) {
                // output data of each row
                while ($row = $users->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["created_at"] ?></td>
                        <td><?php echo $row["updated_at"] ?></td>
                        <td><a href="user-edit.php?id=<?php echo $row["id"] ?>">Edit</a></td>
                    </tr>


                    <?php
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>

            </tr>
        </tfoot>
    </table>


</div>
</div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>
<script>

    new DataTable('#example');
</script>
</body>
</html>
