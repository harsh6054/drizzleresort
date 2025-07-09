<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="./assets/images/logo.png" width="100" height="100" alt="Swiss Collection" style="margin-left:40px;"> 
    <h5 style="margin-top:10px;">Hello, Admin</h5>
</div>
<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#category"   onclick="showCategory()" ><i class="fa fa-handshake-o"></i> Services</a>
    <a href="#products"   onclick="showProductItems()" ><i class="fa fa-bed"></i> Rooms</a>
    <a href="#rooms" onclick="showCustomers()"><i class="fa fa-fax"></i>Room Orders</a>
    <a href="#sizes"   onclick="showSizes()" ><i class="fa fa-comments"></i>Blog Comments</a> 
    <a href="#orders" onclick="showOrders()"><i class="fa fa-cutlery"></i>Food Orders</a>
    <a href="#car" onclick="showCarRental()"><i class="fa fa-car"></i>Car Rental</a>
    <a href="#pick" onclick="showPickup()"><i class="fa fa-taxi"></i>Pick Up Orders</a>
  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>

<script>
    // No function call here
function showCarRental(){
    $.ajax({
        url:"./adminView/carRental.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showPickup(){
    $.ajax({
        url:"./adminView/pick.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

</script>

