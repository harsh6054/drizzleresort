
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
      width: calc(205%);
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
        <h1>Pick-Up and Drop Form</h1>
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
            <label for="eaddress">Email Address<span>*</span></label>
            <input id="eaddress" type="text"   name="email" />
          </div>
          <div class="item">
            <label for="phone">Phone<span>*</span></label>
            <input id="phone" type="tel"   name="phone" />
          </div>
      </fieldset>
      <br/>
      <fieldset>
      <legend>Pick-up and Drop Details</Details></legend>
      <div class="columns">
      <div class="item">
            <label for="pickuploc">Pick-up Location<span>*</span></label>
            <input id="pickuploc" type="text" name="pickuploc" />
          </div>
          <div class="item">
            <label for="dropoffloc">Drop-Off Location<span>*</span></label>
            <input id="dropoffloc" type="text" name="dropoffloc" />
          </div>
      <div class="item">
      <label for="pickupdate">Pick-up Date <span>*</span></label>
      <input id="pickupdate" type="date" name="pickupdate" />
      <i class="fas fa-calendar-alt"></i>
      </div>
      <div class="item">
      <label for="pickuptime">Pick-up Time <span>*</span></label>
      <input id="pickuptime" type="time" name="pickuptime" />
      <i class="fa fa-clock-o"></i>
      </div>
      <div class="item">
      <label for="dropoffdate">Drop-Off Date <span>*</span></label>
      <input id="dropoffdate" type="date" name="dropoffdate" />
      <i class="fas fa-calendar-alt"></i>
      </div>
      <div class="item">
      <label for="dropofftime">Drop-Off Time <span>*</span></label>
      <input id="dropofftime" type="time" name="dropofftime" />
      <i class="fa fa-clock-o"></i>
      </div>
      <div class="item">
      <label for="instruction">Special Instructions</label>
      <textarea id="instruction" name="notes"rows="3"></textarea>
      </div>
      </fieldset>
      <div class="btn-block">
      <button type="submit" name="submit">Submit</button>
      </div>
    </form>
    </div>
  </body>
</html>
<?php
  $con = mysqli_connect("localhost","root","","drizzleresort");
    
  if($con)
  {
if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pickuploc = $_POST['pickuploc'];
    $dropoffloc = $_POST['dropoffloc'];
    $pickupdate = $_POST['pickupdate'];
    $pickuptime = $_POST['pickuptime'];
    $dropoffdate = $_POST['dropoffdate'];
    $dropofftime = $_POST['dropofftime'];
    $notes = $_POST['notes'];

   
    $sql = "INSERT INTO pickupanddrop( Nameofcustomer, email, phone, pickuploc, dropoffloc, pickupdate,dropoffdate ,pickuptime , dropofftime, notes) 
            VALUES ('$name', '$email', '$phone', '$pickuploc', '$dropoffloc', '$pickupdate','$dropoffdate' ,'$pickuptime' , '$dropofftime', '$notes')";

    if (mysqli_query($con, $sql)) {
        echo "Bike Will Come Soon...";
    } 
  }else {
        echo "Error: "  . mysqli_error($con);
    }

   
  }  
    mysqli_close($con);

?>
 