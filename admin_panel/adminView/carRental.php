<div id="ordersBtn" >
  <h2>Car Rental Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Contact No</th>
        <th>Address</th>
        <th>License No</th>
        <th>Destination Address</th>
        <th>Status</th>
     </tr>
    </thead>
     <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from carbooking";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["name"]?></td>
          <td><?=$row["email"]?></td>
          <td><?=$row["phone"]?></td>
          <td><?=$row["contact_address1"]?></td>
          <td><?=$row["car_license_no"]?></td>
          <td><?=$row["dstreet_address1"]?></td>
          <td>
                <button class="btn toggle-status-btn" data-order-id="<?=$row['name']?>" data-current-status="0">Pending</button>
            </td>
       </tr>
    <?php
            
        }
      }
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
  <script>
// Assuming you have some way to select all buttons with the 'toggle-status-btn' class
var toggleButtons = document.querySelectorAll('.toggle-status-btn');

toggleButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var orderId = this.getAttribute('data-order-id');
        var currentStatus = parseInt(this.getAttribute('data-current-status'));
        var newStatus = (currentStatus === 0) ? 1 : 0;

        // Update button text and class
        if (newStatus === 0) {
            this.textContent = 'Pending';
            this.classList.remove('btn-success');
            this.classList.add('btn-danger');
        } else {
            this.textContent = 'Delivered';
            this.classList.remove('btn-danger');
            this.classList.add('btn-success');
        }

        // Send AJAX request to update the order status
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_order_status.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (!response.success) {
                        alert('Failed to update order status.');
                    }
                } else {
                    alert('Failed to update order status.');
                }
            }
        };
        xhr.send('orderId=' + orderId + '&newStatus=' + newStatus);

        // Update current status attribute
        button.setAttribute('data-current-status', newStatus);
    });
});
</script>
