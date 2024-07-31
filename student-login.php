<?php
session_start();
require 'includes/dbcon.php';

if (isset($_POST['student_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // echo $email;
    // echo $password;
    
    $res = $conn->query("SELECT * FROM students WHERE email = '$email' AND password = '$password'");
    if (mysqli_num_rows($res) > 0) {
        // echo mysqli_fetch_assoc($res)['email'];
        $data = mysqli_fetch_assoc($res);
        $_SESSION['student_login'] = true;
        $_SESSION['name'] = $data['name'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['id'] = $data['id'];
        header('location: student-profile.php');
        $_SESSION['message'] = "Login Sucessfully";
        header("location: index.php");
        exit(0);
        // echo ;
    } else {
        
        $_SESSION['message'] = "login failed";
        header("location: index.php");
        exit(0);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12"></div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Students Login
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                            <a href="teacher-login.php" class="btn btn-dark float-end mx-3">Teacher Login</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="" method="post" class="col-12 row m-0 p-0">
                            <div class="col-12">
                                <label for="">Email:</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="">Password:</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <div class="col-12">
                                <input type="submit" name="student_login" value="Login" class="form-control">
                            </div>
                        </form>

                    </div>



                </div>

            </div>
        </div>
    </div>

</body>

</html>