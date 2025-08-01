<?php

session_start();

// Check if user is logged in
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // User is logged in, display the form
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Car Rental Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 36px;
      color: #fff;
      z-index: 2;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 20px 0 #333; 
      }
      .banner {
      position: relative;
      height: 210px;
      background-image: url("assets/images/rental.jpg");      
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.4); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, textarea, select {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color: #333;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #333;
      color: #333;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a9a9a9;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 0;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      input[type="time"]::-webkit-inner-spin-button {
      margin: 2px 22px 0 0;
      }
      input[type=radio], input.other {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 10px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      label.radio:before {
      content: "";
      position: absolute;
      top: 2px;
      left: 0;
      width: 15px;
      height: 15px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      #radio_5:checked ~ input.other {
      display: block;
      }
      input[type=radio]:checked + label.radio:before {
      border: 2px solid #444;
      background: #444;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 7px;
      left: 5px;
      width: 7px;
      height: 4px;
      border: 3px solid #fff;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #444;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #666;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .city-item input {
      width: calc(50% - 20px);
      }
      .city-item select {
      width: calc(50% - 8px);
      }
      }
    </style>
  </head>
  <body>
<?php
   

   $con = mysqli_connect("localhost","root","","drizzleresort");
   
   if($con)
   {
       if (isset($_POST['submit'])) {
         // Retrieve form data
         $name = $_POST['name'];
         $email = $_POST['email'];
         $phone = $_POST['phone'];
         $cs_address1 = $_POST['cs_address1'];
         $cs_address2 = $_POST['cs_address2'];
         $c_city = $_POST['city'];
         $c_zip_code = $_POST['zip_code'];
         $cln = $_POST['cln'];
         $pcn = $_POST['pcn'];
         $acn = $_POST['acn'];
         $dsa = $_POST['dsa'];
         $dsa2 = $_POST['dsa2'];
         $dcity = $_POST['dcity'];
         $dzip = $_POST['dzip'];
         $notes = $_POST['notes'];
     
        
         $q = "INSERT INTO carbooking(`name`, `email`, `phone`, `contact_address1`, `contact_address2`, `c_city`, `c_zip_code`, `car_license_no`, `pancardno`, `adharcard_no`, `dstreet_address1`, `dstreet_address2`, `dcity`, `dzip`, `notes`)
                                VALUES ('$name', '$email', '$phone', '$cs_address1', '$cs_address2', '$c_city', '$c_zip_code', '$cln', '$pcn', '$acn', '$dsa', '$dsa2', '$dcity', '$dzip', '$notes');";
         if (mysqli_query($con, $q)) {
             echo "<script>alert('Car Booked')</script>";
         } 
         else 
         {
               echo "Error: " . mysqli_error($con);
           }
         
       }
   }
     
    
  
      mysqli_close($con);

   ?>

    <div class="testbox">
      <form action="<?php $_PHP_SELF ?>" method="post">
        <div class="banner">
          <h1>Car Booking Form</h1>
        </div>
        <div class="item">
          <p>Name</p>
          
            <input type="text" name="name" placeholder="Enter your Full Name" />
          </div>
        
        <div class="item">
          <p>Email</p>
          <input type="text" name="email" placeholder="Enter your Email-Id"/>
        </div>
        <div class="item">
          <p>Phone</p>
          <input type="text" name="phone" placeholder="Enter your Phone Number"/>
        </div>
       
        <div class="item">
          <p>Contact Address</p>
          <input type="text" name="cs_address1" placeholder="Street address" />
          <input type="text" name="cs_address2" placeholder="Street address line 2" />
          <div class="city-item">
            <input type="text" name="city" placeholder="City" />
            
            <input type="text" name="zip_code" placeholder="Postal / Zip code" />
           
          </div>
        </div>
        <div class="item">
          <p>Car Details</p>
          <input type="number" name="cln" placeholder="Car License No" />
          <div class="city-item">
            <input type="number" name="pcn" placeholder="PanCard No" />  
            <input type="number" name="acn" placeholder="Aadhar Card No" />
           
          </div>
        </div>
        
        <div class="item">
          <p>Destination</p>
          <input type="text" name="dsa" placeholder="Street address" />
          <input type="text" name="dsa2" placeholder="Street address line 2" />
          <div class="city-item">
            <input type="text" name="dcity" placeholder="City" />
            <input type="text" name="dzip" placeholder="Postal / Zip code" />
          </div>
        </div>
        <div class="item">
          <p>Notes</p>
          <textarea rows="3" name="notes"></textarea>
        </div>
        <div class="btn-block">
          <button type="submit" href="#"name ="submit">SEND</button>
        </div>
      </form>
    </div>
    <?php
} else {
    // User is not logged in, display a message or redirect to login page
    echo "<p>Please log in to access this page.</p>";
}
?>
  </body>
</html>