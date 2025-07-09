<div>
    <h3>Available Blogs</h3>
    <table class="table">
    <thead>
        <tr>
            <th class="text-center">S.N.</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Subject</th>
            <th class="text-center">Message</th>
            <th class="text-center">Image</th>
            <th class="text-center" colspan="2">Action</th>
        </tr>
    </thead>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "drizzleresort");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['id']; // Get the id from the form

        // Delete the row with the specified id
        $sql = "DELETE FROM kate_point WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Data deleted successfully.'); window.location.href='http://localhost/DrizzleResort/admin_panel/index.php';</script>";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    $sql = "SELECT * FROM kate_point";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $count ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["subject"] ?></td>
                <td><?= $row["massage"] ?></td>
                <td><img src="uploads/<?= $row['image'] ?>" alt="Image" style="max-width: 150px;"></td>
                <td>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn btn-danger" style="height:40px" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
            <?php
            $count = $count + 1;
        }
    }
    ?>
</table>


    <!-- Trigger the modal with a button -->
    <!-- <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
        Add Size
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Size Record</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="size">Size Number:</label>
                            <input type="text" class="form-control" name="size" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Size</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
