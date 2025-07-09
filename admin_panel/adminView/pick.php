<div id="ordersBtn">
    <h2>Pick Up Details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nameofcustomer</th>
                <th>email</th>
                <th>phone</th>
                <th>pickuploc</th>
                <th>dropoffloc</th>
                <th>pickupdate</th>
                <th>dropoffdate</th>
                <th>pickuptime</th>
                <th>dropofftime</th>
                <th>notes</th>
                
            </tr>
        </thead>
        <?php
        $con = mysqli_connect("localhost", "root", "", "drizzleresort");
        $sql = "SELECT * FROM pickupanddrop";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?= $row["Nameofcustomer"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["phone"] ?></td>
                    <td><?= $row["pickuploc"] ?></td>
                    <td><?= $row["dropoffloc"] ?></td>
                    <td><?= $row["pickupdate"] ?></td>
                    <td><?= $row["dropoffdate"] ?></td>
                    <td><?= $row["pickuptime"] ?></td>
                    <td><?= $row["dropofftime"] ?></td>
                    <td><?= $row["notes"] ?></td>
                    
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
    //for view order modal  
    $(document).ready(function () {
        $('.openPopup').on('click', function () {
            var dataURL = $(this).attr('data-href');
            $('.order-view-modal').load(dataURL, function () {
                $('#viewModal').modal('show');
            });
        });
    });
</script>
