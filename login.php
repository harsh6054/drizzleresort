
<?php
// Start the session
session_start();

// Establish database connection
$con = mysqli_connect("localhost", "root", "", "drizzleresort");

// Check if the form is submitted
if (isset($_POST["b1"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the provided email and password match the admin credentials
    if ($email == "drizzleresort@gmail.com" && $password == "pass") {
        // Set session variables for admin
        $_SESSION['user_email'] = $email;
        $_SESSION['is_admin'] = true;
        
        // Redirect to admin panel
        header("Location: admin_panel/index.php");
        exit();
    } else {
        // Prepare and execute the query with a placeholder
        $query = "SELECT * FROM registration WHERE email = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if ($password == $row['pass']) {
                    // Set session variables for regular user
                    $_SESSION['user_email'] = $email;
                    $_SESSION['is_admin'] = false;

                    // Redirect to home page or user dashboard
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<script>alert('Invalid email or password');</script>";
                }
            } else {
                // User with this email does not exist
                echo "<script>alert('User with this email does not exist');</script>";
            }
        } else {
            // Error in executing query
            echo "Error: " . mysqli_error($con);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}

// Close database connection
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
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
                    <h2 class="fw-semibold">Welcome To Resort</h2>
                    <p class="fw-light">Welcome! Please login to your account</p>
                    <form method="post" class="form">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="" class="mb-1 fw-medium">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                            </div>
                            <div class="col-12">
                                <label for="" class="mb-1 fw-medium">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                            </div>
                            <div class="col-12 d-flex justify-content-between mt-3 checkbox">
                                
                                <a href="http://localhost/DrizzleResort/register.php" class="fw-semibold text-decoration-none">Forgot password</a>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn mt-4 w-100" name="b1" style="color: #fff;">Sign in</button>
                    </form>
                    <p class="text-center signup mt-4">Don't have an account? <a href="http://localhost/DrizzleResort/register.php"
                            class="text-decoration-none fw-semibold">Register now</a></p>
                    <p class="text-center signup mt-4"> <a href="http://localhost/DrizzleResort/d2/"
                            class="text-decoration-none fw-semibold">WithOut Login</a></p>
                </div>
            </div>
            <div class="col-lg-5 col-12 p-0">
                <img src="assets/images/g2.JPG"
                    alt="" class="img-fluid w-100">
            </div>
        </div>
    </div>

</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap');
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

</html>