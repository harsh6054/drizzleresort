<div>
  <h3>Category Items</h3>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Service title</th>
        <th class="text-center">Service subtitle</th>
        <th class="text-center">Service description</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "drizzleresort");

      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $comments = $_POST['comments'];

        $sql = "INSERT INTO service1 (title, subtitle, comments) VALUES ('$title', '$subtitle', '$comments')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
          echo "<script>window.location.href='http://localhost/DrizzleResort/admin_panel/index.php';</script>";
        } else {
          echo "Error: ";
        }
      }
      if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM service1 WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
          echo "<script>alert('Data deleted successfully.'); window.location.href='http://localhost/DrizzleResort/admin_panel/index.php';</script>";

        } else {
          echo "Error deleting record: " ;
        }
      }
      
     

      $sql = "SELECT * FROM service1";
      $result = mysqli_query($conn, $sql);
      $count = 1;

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <tr>
            <td><?=$count?></td>
            <td><?= $row["title"] ?></td>
            <td><?= $row["subtitle"] ?></td>
            <td><?= $row["comments"] ?></td>
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
      mysqli_close($conn);
      ?>
    </tbody>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Services
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Service </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
              <label for="subtitle">Subtitle:</label>
              <input type="text" class="form-control" name="subtitle" required>
            </div>
            <div class="form-group">
              <label for="comments">Comments:</label>
              <textarea class="form-control" name="comments" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="submit" style="height:40px">Add Service</button>
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