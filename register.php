<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        * {
            font-family: 'Poppins', sans-serif !important;
        }

        :root {
            --btn-size: .8rem;
            --small-size: .75rem;
        }

        body {
            background-color: #E4E8EB;
        }

        .bg {
            background-color: #E4E8EB;
        }

        .login-card {
            width: calc(100% - 13rem);
        }

        .login-card h1 {
            color: #111727;
        }

        .login-card p {
            /* color: #b0b4b6; */
            color: #313131;
            font-size: var(--small-size);
        }

        .form-control:focus {
            outline: none;
            box-shadow: none;
            border: var(--bs-border-width) solid var(--bs-border-color);
        }

        .login-card label {
            font-size: var(--small-size);
        }

        form.form input {
            font-size: var(--small-size);
        }

        form.form input::placeholder {
            font-size: var(--small-size);
        }

        form.form button:nth-of-type(1) {
            color: #fff;
            background-color: #111727;
            font-size: var(--btn-size);
        }

        form.form button:nth-last-child(1) {
            color: #111727;
            border: 1px solid #111727;
            font-size: var(--btn-size);
        }

        form.form button:nth-last-child(2) {
            color: #111727;
            border: 1px solid #111727;
            font-size: var(--btn-size);
        }

        .checkbox label {
            font-size: var(--small-size);
        }

        .checkbox a {
            font-size: var(--small-size);
            color: #111727;
        }

        .signup {
            font-size: var(--small-size);
        }

        .signup a {
            color: #111727;
        }

        @media (max-width: 480px) {
            .login-card {
                width: calc(100% - 2rem);
            }
        }
    </style>
</head>

<body>

    <div class="container py-5 px-5 bg">
        <div class="row justify-content-between bg-white rounded-start-4">
            <div class="col-lg-7 d-flex justify-content-center align-items-center">
                <div class="login-card py-lg-0 py-5">
                    <h2 class="fw-semibold">Register Your Account</h2>
                    <p class="fw-light">Welcome ! Please Enter Vaild Details</p>
                    <form method="post" class="form" action="<?php $_PHP_SELF ?>">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="" class="mb-1 fw-medium">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name" required>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="" class="mb-1 fw-medium">Phone No</label>
                                <input type="number" class="form-control" placeholder="Enter Phone No" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="" class="mb-1 fw-medium">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required>
                            </div>
                            <div class="col-12">
                                <label for="" class="mb-1 fw-medium">Password</label>
                                <input type="password" class="form-control" placeholder="Enter Password" id="pass" name="pass" required>
                            </div>
                        
                        </div>
                        <button type="submit" name="submit" class="btn mt-4 w-100" style="color: #fff;">Register</button>
                       
                    </form>
                    <p class="text-center signup mt-4">Do you have an account? <a href="http://localhost/DrizzleResort/login.php"
                            class="text-decoration-none fw-semibold">Sign up Now</a></p>
                </div>
            </div>
            <div class="col-lg-5 col-12 p-0">
                <img src="assets/images/g2.JPG"
                    alt="" class="img-fluid w-100">
            </div>
        </div>
    </div>
    <?php
   

    $con = mysqli_connect("localhost","root","","drizzleresort");
    
    if($con)
    {
        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $q="INSERT INTO `registration`(`name`, `phone`, `email`, `pass`) VALUES ('$name','$phone','$email','$pass');";
            mysqli_query($con,$q);
            echo "<script>alert('Data Inserted')</script>";
        }
    
    }
   else{
    echo"connection failed";
   }
       mysqli_close($con);

    ?>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap');
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

</html>