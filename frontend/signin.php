<?php
session_start();
require '../includes/dbcon.php';

if (isset($_POST['teacher_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // echo $email;
    // echo $password;
    
    $res = $conn->query("SELECT * FROM teacher WHERE email = '$email' AND password = '$password'");
    if (mysqli_num_rows($res) > 0) {
        // echo mysqli_fetch_assoc($res)['email'];
        $data = mysqli_fetch_assoc($res);
        $_SESSION['teacher_login'] = true;
        $_SESSION['name'] = $data['name'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['id'] = $data['id'];
        header('location: dashboard.php');
        $_SESSION['message'] = "Login Sucessfully";
       
        exit(0);
        // echo ;
    } else {
        
        $_SESSION['error'] = "login failed";
        header("location: signin.php");
        exit(0);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/login.css">
</head>

<body>

  <div class="container">

    <div class="login-box">
      <h2> Teacher Login</h2>
      <form action="#" method="POST">
        <div class="input-box">
          <input type="email" name="email" required>
          <label>Email</label>
        </div>
        <div class="input-box">
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="forgot-pass">
          <a href="#">Already having an account?</a>
        </div>
        <button type="submit" name="teacher_login"  class="btn ">Login</button>
        <div class="signup-link">
          <a href="login.php"> Student Login</a>
        </div>
      </form>
    </div>
    <span style="--i:0;"></span>
    <span style="--i:1;"></span>
    <span style="--i:2;"></span>
    <span style="--i:3;"></span>
    <span style="--i:4;"></span>
    <span style="--i:5;"></span>
    <span style="--i:6;"></span>
    <span style="--i:7;"></span>
    <span style="--i:8;"></span>
    <span style="--i:9;"></span>
    <span style="--i:10;"></span>
    <span style="--i:11;"></span>
    <span style="--i:12;"></span>
    <span style="--i:13;"></span>
    <span style="--i:14;"></span>
    <span style="--i:15;"></span>
    <span style="--i:16;"></span>
    <span style="--i:17;"></span>
    <span style="--i:18;"></span>
    <span style="--i:19;"></span>
    <span style="--i:20;"></span>
    <span style="--i:21;"></span>
    <span style="--i:22;"></span>
    <span style="--i:23;"></span>
    <span style="--i:24;"></span>
    <span style="--i:25;"></span>
    <span style="--i:26;"></span>
    <span style="--i:27;"></span>
    <span style="--i:28;"></span>
    <span style="--i:29;"></span>
    <span style="--i:30;"></span>
    <span style="--i:31;"></span>
    <span style="--i:32;"></span>
    <span style="--i:33;"></span>
    <span style="--i:34;"></span>
    <span style="--i:35;"></span>
    <span style="--i:36;"></span>
    <span style="--i:37;"></span>
    <span style="--i:38;"></span>
    <span style="--i:39;"></span>
    <span style="--i:40;"></span>
    <span style="--i:41;"></span>
    <span style="--i:42;"></span>
    <span style="--i:43;"></span>
    <span style="--i:44;"></span>
    <span style="--i:45;"></span>
    <span style="--i:46;"></span>
    <span style="--i:47;"></span>
    <span style="--i:48;"></span>
    <span style="--i:49;"></span>
  </div>
</body>

</html>