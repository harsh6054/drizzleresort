<div >
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
      <th class="text-center">Customer Id</th>
        <th class="text-center">Customer Name</th>
        <th class="text-center">Phone Number</th>
        <th class="text-center">RoomType</th>
        <th class="text-center">CheckInDate</th>
        <th class="text-center">CheckOutDate</th>
        <th class="text-center">NumberofGuest</th>
        <th class="text-center">Address</th>
      </tr>
    </thead>
    <?php
      $conn = mysqli_connect("localhost", "root", "", "drizzleresort");

      $sql="SELECT * from room_booking ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
          $totalno = 0;
        $child = intval($row["children"]); // Convert children to integer
        $adults = intval($row["adults"]); // Convert adults to integer
        $totalno = $child + $adults; 
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["c_name"]?></td>
      <td><?=$row["phone"]?></td>
      <td><?=$row["roomtype"]?></td>
      <td><?=$row["checkindate"]?></td>
      <td><?=$row["checkoutdate"]?></td>
      <td><?=$totalno?></td>
      <td><?=$row["c_address"]?></td>
     
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>