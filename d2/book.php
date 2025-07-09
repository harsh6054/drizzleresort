
<?php

session_start();

// Check if user is logged in
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // User is logged in, display the form
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Hotel Reservation Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, label { 
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
      font-size: 50px;
      color: #fff;
      z-index: 2;
      line-height: 83px;
      }
      legend {
      padding: 10px;      
      font-family: Roboto, Arial, sans-serif;
      font-size: 18px;
      color: #fff;
      background-color: #006622;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
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
      box-shadow: 0 0 8px #006622; 
      }
      .banner {
      position: relative;
      height: 250px;
      background-image: url("assets/images/bookbg.jpeg");  
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
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color:  #006622;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 3px 0  #006622;
      color: #006622;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item span {
      color: red;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #00b33c;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      .week {
      display:flex;
      justify-content:space-between;
      }
      .type{
        width: calc(100% - 10px);
        padding: 5px;
      }
      .columns {
      display:flex;
      justify-content:space-between;
      flex-direction:row;
      flex-wrap:wrap;
      }
      .columns div {
      width:48%;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      input[type=radio], input[type=checkbox]  {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 15px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      .question-answer label {
      display: block;
      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      input[type=radio]:checked + label:before, label.radio:hover:before {
      border: 2px solid  #006622;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 6px;
      left: 5px;
      width: 8px;
      height: 4px;
      border: 3px solid  #006622;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .flax {
      display:flex;
      justify-content:space-around;
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
      background:  #006622;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background:  #00b33c;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .name-item div {
      width: calc(50% - 20px);
      }
      .name-item div input {
      width:97%;}
      .name-item div label {
      display:block;
      padding-bottom:5px;
      }
      }
    </style>
  </head>
  <body>
    <div class="testbox">
    <form method="post" action="<?php $_PHP_SELF ?>">
      <div class="banner">
        <h1>Room Booking Form</h1>
      </div>
      <br/>
      <fieldset>
        <legend>Personal Details</legend>
        <div class="columns">
          <div class="item">
            <label for="fname">First Name<span>*</span></label>
            <input id="fname" type="text" name="name" />
          </div>
          <div class="item">
            <label for="zip">Zip Code<span>*</span></label>
            <input id="zip" type="text"   name="zip" required/>
          </div>
          <div class="item">
            <label for="email">Email Address<span>*</span></label>
            <input id="email" type="text"   name="email" />
          </div>
          <div class="item">
            <label for="address">Address<span>*</span></label>
            <input id="address" type="text"   name="address" />
          </div>
          <div class="item">
            <label for="phone">Phone<span>*</span></label>
            <input id="phone" type="tel"   name="phone" />
          </div> 
          <div class="item">
            <label for="city">City<span>*</span></label>
            <input id="city" type="text"   name="city" />
          </div>
          <div class="item">
            <label for="state">State<span>*</span></label>
            <input id="state" type="text"   name="state" />
          </div>
          
      </fieldset>
      <br/>
      <fieldset>
      <legend>Rooms Details</Details></legend>
      <div class="columns">
      <div class="item">
      <label for="checkindate">Check-in Date <span>*</span></label>
      <input id="checkindate" type="date" name="checkindate" />
      <i class="fas fa-calendar-alt"></i>
      </div>
      <div class="item">
      <label for="checkoutdate">Check-out Date <span>*</span></label>
      <input id="checkoutdate" type="date" name="checkoutdate" />
      <i class="fas fa-calendar-alt"></i>
      </div>
      <div class="item">
      <p>Check-in Time </p>
      <select name="checkintime">
      <option value="" selected>Select time</option>
      <option value="Morning" >Morning</option>
      <option value="Afternoon">Afternoon</option>
      <option value="Evening">Evening</option>
      </select>
      </div>
      <div class="item">
      <p>Check-out Time </p>
      <select  name="checkouttime">
      <option  value="" selected>Select time</option>
      <option value="Morning" >Morning</option>
      <option value="Afternoon">Afternoon</option>
      <option value="Evening">Evening</option>
      </select>
      </div>    
      <div class="item">
      <p>How many adults are coming?</p>
      <select name="adults">
      <option value=""  selected>Number of adults</option>
      <option value="1" >1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      </select>
      </div>    
      <div class="item">
      <p>How many children are coming?</p>
      <select name="children">
      <option value=""  selected>Number of children</option>
      <option value="0" >0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      </select>
      </div>   
      <div class="item" style=width:100%>
      <label for="room">Room Type</label>

      <select class="type" name="roomtype">

      <option value="Standard Room" selected>Standard Room</option>
      <option value="Single OR Couple Room">Single OR Couple Room</option>
      <option value="Guest Room">Guest Room</option>
      <option value="Family Rooms">Family Rooms</option>
      <option value="Rest Rooms">Rest Rooms</option>
      <option value="Luxurious Rooms">Luxurious Rooms</option>
      </select>
      </div>
      </div>
      <div class="item">
      <label for="instruction">Special Instructions</label>
      <textarea id="instruction" name="notes" rows="3"></textarea>
      </div>
      </fieldset>
      <div class="btn-block">
      <button type="submit" name="submit" href="/">Submit</button>
      </div>
    </form>
    </div>
  </body>
</html>
<?php
 $con = mysqli_connect("localhost", "root", "", "drizzleresort");


 if (mysqli_connect_errno()) {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     exit();
 }
if ($con){}

  if (isset($_POST['submit'])) {
 
    $name = $_POST['name'];
    $zip = $_POST['zip'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $checkindate = $_POST['checkindate'];
    $checkoutdate = $_POST['checkoutdate'];
   
    $checkintime1= $_POST['checkintime'];
    $checkouttime1= $_POST['checkouttime'];
    $adults1 = $_POST['adults'];
    $children1 = $_POST['children'];
    $roomtype1= $_POST['roomtype'];
  
    $notes = $_POST['notes'];

    
    $sql = "INSERT INTO room_booking (c_name, zip, email, c_address, phone, city, c_state, checkindate, checkoutdate, checkintime, checkouttime, adults, children, roomtype, notes) 
            VALUES ('$name', '$zip', '$email', '$address', '$phone', '$city', '$state', '$checkindate', '$checkoutdate', '$checkintime1', '$checkouttime1', '$adults1', '$children1', '$roomtype1', '$notes')";

    
    if (mysqli_query($con, $sql)) {
      echo "<script>alert('Room Booked');</script>";
    } 
 }

else {
        echo "Error: " . mysqli_error($con);
    }
  
    
    mysqli_close($con);

?>
 <?php
} else {
    // User is not logged in, display a message or redirect to login page
    echo "<p>Please log in to access this page.</p>";
}
?>