
<div>
  <h2>Product Items</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Room No.</th>
        <th class="text-center">Room Image</th>
        <th class="text-center">Room Type</th>
        <th class="text-center">Room Description</th>
        <th class="text-center">Room Price</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "drizzleresort");
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      if (isset($_POST['submitup'])) {
        // Handle the form submission for updating the data
        $room_number = $_POST['room_number'];
        $room_type = $_POST['room_type'];
        $room_description = $_POST['room_description'];
        $room_price = $_POST['room_price'];
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
    
        // Move uploaded file to desired directory
        move_uploaded_file($file_tmp, "uploads/" . $file_name);
    
        $sql = "UPDATE kate_point 
                SET room_type = '$room_type', room_description = '$room_description', room_price = '$room_price', room_image = '$file_name'
                WHERE room_number = '$room_number'";
    
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data updated successfully.'); window.location.href='http://localhost/DrizzleResort/admin_panel/index.php';</script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
    

      if (isset($_POST['submit'])) {
          $room_number = $_POST['room_number'];
          $room_type = $_POST['room_type'];
          $room_description = $_POST['room_description'];
          $room_price = $_POST['room_price'];
          $file_name = $_FILES['image']['name'];
          $file_tmp = $_FILES['image']['tmp_name'];

          // Move uploaded file to desired directory
          move_uploaded_file($file_tmp, "uploads/" . $file_name);

          $sql = "INSERT INTO admin_room (Room_No, Room_Type, Room_Des, Room_Price, Room_Image)
                  VALUES ('$room_number', '$room_type', '$room_description', '$room_price', '$file_name')";
          if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data inserted successfully.'); window.location.href='http://localhost/DrizzleResort/admin_panel/index.php';</script>";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
      }
      if (isset($_POST['delete'])) {
        $room_no = $_POST['room_no']; // Get room number from the form
        
        // Delete the row with the specified room number
        $sql = "DELETE FROM admin_room WHERE Room_No = '$room_no'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Data deleted successfully.'); window.location.href='http://localhost/DrizzleResort/admin_panel/index.php';</script>";
        } else {
            echo "Error deleting record: ";
        }
    }

      $sql = "SELECT * FROM admin_room";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <td><?= $row["Room_No"] ?></td>
                <td><img height='100px' src='uploads/<?= $row["Room_Image"] ?>'></td>
                <td><?= $row["Room_Type"] ?></td>
                <td><?= $row["Room_Des"] ?></td>
                <td><?= $row["Room_Price"] ?></td>
                <td>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="room_number" value="<?= $row['Room_No'] ?>">
                    <button type="submit" class="btn btn-primary" style="height:40px"  name ="edit">Edit</button>
                </form>
            </td>
                <td>
                  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    <input type="hidden" name="room_no" value="<?= $row['Room_No'] ?>">
                    <button type="submit" class="btn btn-danger" style="height:40px" name="delete">Delete</button>
                  </form>
                </td>
              </tr>
              <?php
          }
      }
      mysqli_close($conn);
      ?>
    </tbody>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Rooms
  </button>
 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Room Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
              <label for="room_number">Room Number:</label>
              <input type="text" class="form-control" id="room_number" name="room_number" required>
            </div>
            <div class="form-group">
              <label for="room_type">Room Type:</label>
              <input type="text" class="form-control" id="room_type" name="room_type" required>
            </div>
            <div class="form-group">
              <label for="room_description">Room Description:</label>
              <input type="text" class="form-control" id="room_description" name="room_description" required>
            </div>
            <div class="form-group">
              <label for="image">Choose Image:</label>
              <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="form-group">
              <label for="room_price">Room Price:</label>
              <input type="number" class="form-control" id="room_price" name="room_price" required>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px" name="submit">Add Room</button>
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
