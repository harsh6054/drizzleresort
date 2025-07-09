<?php

  $conn== mysqli_connect("localhost", "root", "", "drizzleresort"); 
    $c_id=$_POST['id'];
    $query="DELETE FROM service1 where id='$c_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Category Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>