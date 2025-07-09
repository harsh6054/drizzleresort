<!DOCTYPE html>
<html lang="en">
<head>
<title>Single Page</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Crispy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
	
	<!-- css files -->
    <link href="css2/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="css2/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
    <link href="css2/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
    <link rel="stylesheet" href="css2/style-starter.css">
	<!-- //css files -->
	
	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //google fonts -->
	
	<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a connection to your database
    $conn = mysqli_connect("localhost", "root", "", "drizzleresort");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve form data
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $subject = $_POST['Subject'];
    $message = $_POST['message']; // Corrected array key
    
    // File handling
    $file_name = $_FILES['photo']['name'];
    $file_tmp = $_FILES['photo']['tmp_name'];
    $file_destination = "upload/" . $file_name;
    move_uploaded_file($file_tmp, $file_destination);

    // Insert data into the database
    $sql = "INSERT INTO `kate_point`(`name`, `email`, `massage`, `subject`, `image`) 
            VALUES ('$name', '$email', '$message', '$subject', '$file_name')"; // Corrected column name

    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

</head>
    <body>
        <!-- single -->
        <section class="bottom-banner-w3layouts py-5">
	    <div class="container py-md-3">
            <a href="http://localhost/DrizzleResort/blogs/blog.php">
		<h2 class="heading text-center mb-sm-5 mb-4">Blog Explore</h2></a>
		<div class="row inner-sec-w3ls-agileinfo">
			<!--left-->
			<div class="col-lg-8 left-blog-info text-left">
					<div class="card">
						<a href="images/bg2.jpg">
							<img src="images/bg2.jpg" class="card-img-top img-fluid" alt="">
						</a>
						<div class="card-body">
							<ul class="blog-icons my-4">
								<li>
									
										<span class="fa fa-calendar"></span> Mar 16 .2024
								</li>
								<li class="mx-2">
									
										<span class="fa fa-comment"></span> 2
								</li>
								<li>
									
										<span class="fa fa-eye"></span> 100
								</li>

							</ul>
							<h5 class="card-title ">
								<a href="http://localhost/DrizzleResort/blogs/blog.php">Kate Point</a>
							</h5>
							<p class="card-text">Kate’s point is Located on to the side way of Mahabaleshwar. The huge rock overlooking the Krishna valley is often thronged by tourist.Kate’s point is the most picturesque point of Mahabaleshwar and Panchgani and is the often which used as a cover picture by most books and magazines about Mahabaleshwar. Timing – 6 AM – 6 PM</p>
							

						</div>
					</div>
					
					<div class="comment-top">
						<h4>Leave a Comment</h4>
						<div class="comment-bottom">
							<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
								<input class="form-control" type="text" name="Name" placeholder="Name" required="">
								<input class="form-control" type="email" name="Email" placeholder="Email" required="">
								<input class="form-control" type="file" name="photo" required="">
								<input class="form-control" type="text" name="Subject" placeholder="Subject" required="">
								<textarea class="form-control" name="message" placeholder="Message..." required=""></textarea>
								<button type="submit" class="btn btn-primary submit">Submit</button>
							</form>
						</div>
					</div>

			</div>
			<!--//left-->
			<!--right-->
			<aside class="col-lg-4 right-blog-con text-left">
            <div class="comment-top">
						<h4>Comments</h4>
						<div class="media">
							<img src="images/ser1.jpg" alt="" class="img-fluid rounded">
							<div class="media-body">
								<h5 class="mt-sm-0 mt-3">Joseph Goh</h5>
								<p>In Mahabaleshwar, every point is at certain height where you need to climb up or go down. Mahabaleshwar temple, Kate's point, Ganesh temple are at lesser height. If possible those can be visited.</p>

							</div>
						</div>
						<div class="media">
							<img src="images/ser2.jpg" alt="" class="img-fluid rounded">
							<div class="media-body">
								<h5 class="mt-sm-0 mt-3">Richard Spark</h5>
								<p>See Points are open all time but do check the weather because last month.Its a Monsoon season and you won't get the best of Mahabaleshwar in my opinion as per my experience 👍</p>
							</div>
						</div>
					</div>
    </body>
</html>