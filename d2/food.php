<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php

session_start();

// Check if user is logged in
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // User is logged in, display the form
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Online Food Delivery Form </title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" type="text/css">
    <link href="food.css" rel="stylesheet" type="text/css">

    <script>
        function ok_result(){
            document.getElementById("okResult").style.display="block";
            document.getElementById("okResult").style.backgroundColor="#DCE775";
            document.getElementById("input_box").style.display="none";
        }
    </script>

</head>
<body>
<div class="online_food_delivery_box animated bounceInDown" id="input_box">
    <h3> Online Food Delivery Form </h3><br>
    <form id="food_delivery_form" action="<?php $_PHP_SELF ?>" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" required>
        </div>
        <div class="form-group">
            <input type="tel" class="form-control" id="contact_no" name="contact_no" placeholder="Contact No" required>
        </div>
        <div class="form-group">
    <select class="form-control" id="food_type" name="food_type">
        <option value="">Select Food Type</option>
        <option value="Lunch">Lunch</option>
        <option value="Dinner">Dinner</option>
        <option value="Others">Others</option>
    </select>
</div>

<div class="form-group" id="food_items_container" style="display: none;">
    <select class="form-control" id="food_item" name="food_item" required>
        <option value="">Food Item</option>
        <!-- Food items will be dynamically populated here -->
    </select>
</div>

<script>
    document.getElementById('food_type').addEventListener('change', function() {
        var foodType = this.value;
        var foodItemsContainer = document.getElementById('food_items_container');
        var foodItemsSelect = document.getElementById('food_item');

        // Clear previous options
        foodItemsSelect.innerHTML = '<option value="">Food Item</option>';

        if (foodType === 'Lunch') {
            // Populate lunch related food items
            var lunchItems = ['Sandwich', 'Salad', 'Soup'];
            lunchItems.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item;
                option.textContent = item;
                foodItemsSelect.appendChild(option);
            });
        } else if (foodType === 'Dinner') {
            // Populate dinner related food items
            var dinnerItems = ['Steak', 'Pasta', 'Pizza'];
            dinnerItems.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item;
                option.textContent = item;
                foodItemsSelect.appendChild(option);
            });
        } else if (foodType === 'Others') {
            // Populate other related food items
            var otherItems = ['Snacks', 'Dessert', 'Beverages'];
            otherItems.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item;
                option.textContent = item;
                foodItemsSelect.appendChild(option);
            });
        }

        // Show food items container
        if (foodType !== '') {
            foodItemsContainer.style.display = 'block';
        } else {
            foodItemsContainer.style.display = 'none';
        }
    });
</script>
<script>
    // Food prices
    var foodPrices = {
        'Sandwich': 25,
        'Salad': 30,
        'Soup': 20,
        'Steak': 15,
        'Pasta': 69,
        'Pizza': 99,
        'Snacks': 120,
        'Dessert': 120,
        'Beverages': 100
    };

    // Function to calculate total cost
    function calculateTotalCost() {
        var foodItemsSelect = document.getElementById('food_item');
        var selectedOptions = foodItemsSelect.selectedOptions;
        var totalCost = 0;

        for (var i = 0; i < selectedOptions.length; i++) {
            var foodItem = selectedOptions[i].value;
            totalCost += foodPrices[foodItem] || 0;
        }

        // Update total cost element
        document.getElementById('result').textContent = totalCost;
    }

    // Event listener for food item selection
    document.getElementById('food_item').addEventListener('change', function() {
        calculateTotalCost();
    });

    // Event listener for food type selection
    document.getElementById('food_type').addEventListener('change', function() {
        var foodType = this.value;
        var foodItemsContainer = document.getElementById('food_items_container');
        var foodItemsSelect = document.getElementById('food_item');

        // Clear previous options
        foodItemsSelect.innerHTML = '<option value="">Food Item</option>';

        if (foodType === 'Lunch') {
            // Populate lunch related food items
            var lunchItems = ['Sandwich', 'Salad', 'Soup'];
            lunchItems.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item;
                option.textContent = item;
                foodItemsSelect.appendChild(option);
            });
        } else if (foodType === 'Dinner') {
            // Populate dinner related food items
            var dinnerItems = ['Steak', 'Pasta', 'Pizza'];
            dinnerItems.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item;
                option.textContent = item;
                foodItemsSelect.appendChild(option);
            });
        } else if (foodType === 'Others') {
            // Populate other related food items
            var otherItems = ['Snacks', 'Dessert', 'Beverages'];
            otherItems.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item;
                option.textContent = item;
                foodItemsSelect.appendChild(option);
            });
        }

        // Show food items container
        if (foodType !== '') {
            foodItemsContainer.style.display = 'block';
        } else {
            foodItemsContainer.style.display = 'none';
        }

        // Calculate total cost when food type changes
        calculateTotalCost();
    });
</script>


        <div class="form-group">
            <input type="text" class="form-control" id="room_no" name="room_no" placeholder="Room No" required>
        </div><br>
        <div class="form-group">
            <label>Total Cost ($) : </label>
            <span id="result" name="cost" style="background-color: #8c7269;color: #fff;padding: 6px 70px;font-weight: 600;font-size: 18px; margin-left: 10px;border-radius: 5px;">0</span>
            <input type="submit" value="SUBMIT" name="submit"class="btn btn-primary" style="float: right">
        </div>
    </form>
</div>


      <div class="result_box animated zoomIn" style="display: none;" id="okResult">
          <h3 class="result_box_text" id="ok_text"> Your order is successfully submitted. Please keep patience, we will come to you soon.<br><br><span> <a href="http://localhost/DrizzleResort/index.php">  -- Thank You  -- </a></span></h3><br>
      </div>
?>
</body>
</html>
<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "drizzleresort"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn){
    if(isset($_POST['submit'])){

    $full_name = $_POST['full_name'];
    $contact_no = $_POST['contact_no'];
    $food_type = $_POST['food_type'];
    $food_item = $_POST['food_item'];
    $room = $_POST['room_no'];

    $sql = "INSERT INTO food (`Name`, `Phone`, `food_type`, `food_item`, `Room_No`)
            VALUES ('$full_name', '$contact_no', '$food_type', '$food_item', '$room')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Food Order')</script>";
    } 
    
    }
    
}


$conn->close();
?>
<?php
} else {
    // User is not logged in, display a message or redirect to login page
    echo "<p>Please log in to access this page.</p>";
}
?>