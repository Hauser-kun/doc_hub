<?php

session_start();
require 'dbcon.php';

if(isset($_POST['delete'])){
    $student_id=mysqli_real_escape_string($conn, $_POST['delete']);
    $query="DELETE FROM student WHERE id='$student_id'";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['message']="Data Deleted sucessfully";
        header("location: ../studenttable.php");
        exit(0);
        
    }
    else{
        $_SESSION['message']="NO Data Deleted ";
        header("location: ../studenttable.php");
        exit(0);

    }
}
if(isset($_POST['delete_teacher'])){
    $teacher_id=mysqli_real_escape_string($conn, $_POST['delete_teacher']);
    $query="DELETE FROM teacher WHERE id='$teacher_id'";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['message']="Data Deleted sucessfully";
        header("location: ../teachertable.php");
        exit(0);
        
    }
    else{
        $_SESSION['message']="NO Data Deleted ";
        header("location: ../teachertable.php");
        exit(0);

    }
}

if(isset($_POST['delete_doc'])){
    $student_id=mysqli_real_escape_string($conn, $_POST['delete_doc']);
    $query="DELETE FROM documents WHERE id='$student_id'";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['message']="Data Deleted sucessfully";
        header("location: teacher-profile.php");
        exit(0);
        
    }
    else{
        $_SESSION['message']="NO Data Deleted ";
        header("location: teacher-profile.php");
        exit(0);

    }
}

if(isset($_POST['delete_file'])){
    $student_id=mysqli_real_escape_string($conn, $_POST['delete_file']);
    $query="DELETE FROM documents WHERE id='$student_id'";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        $_SESSION['message']="Data Deleted sucessfully";
        header("location: teacher-profile.php");
        exit(0);
        
    }
    else{
        $_SESSION['message']="NO Data Deleted ";
        header("location: teacher-profile.php");
        exit(0);

    }
}






if(isset($_POST['edit_student'])){

    $name=mysqli_escape_string($conn,$_POST['name']);
    $email=mysqli_escape_string($conn,$_POST['email']);
    $phone=mysqli_escape_string($conn,$_POST['phone']);
    $role=mysqli_escape_string($conn,$_POST['course']);
    $student_id=mysqli_escape_string($conn,$_POST['student_id']);

    $query="UPDATE student SET  name='$name',email='$email',phone='$phone',course='$role' WHERE id='$student_id'";
    $query_run=mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['message']="Data Updated sucessfully";
        header("location: ../studenttable.php");
        exit(0);

    }
    else{
        $_SESSION['message']="Data Not Updated ";
        header("location: index.php");
        exit(0);

    }
}
if(isset($_POST['edit_teacher'])){

    $name=mysqli_escape_string($conn,$_POST['name']);
    $email=mysqli_escape_string($conn,$_POST['email']);
    $phone=mysqli_escape_string($conn,$_POST['phone']);
    
    $teacher_id=mysqli_escape_string($conn,$_POST['teacher_id']);

    $query="UPDATE teacher SET  name='$name',email='$email',phone='$phone' WHERE id=$teacher_id";
    $query_run=mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['message']="Data Updated sucessfully";
        header("location: ../teachertable.php");
        exit(0);

    }
    else{
        $_SESSION['message']="Data Not Updated ";
        header("location: index.php");
        exit(0);

    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //String Validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = input_data($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only alphabets and white space are allowed";
        }
    }

    //Email Validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = input_data($_POST["email"]);
        // check that the e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    //Number Validation
    if (empty($_POST["phone"])) {
        $mobilenoErr = "Mobile no is required";
    } else {
        $mobileno = input_data($_POST["phone"]);
        // check if mobile no is well-formed
        if (!preg_match("/^[0-9]*$/", $mobileno)) {
            $mobilenoErr = "Only numeric value is allowed.";
        }
        //check mobile no length should not be less and greator than 10
        if (strlen($mobileno) != 10) {
            $mobilenoErr = "Mobile no must contain 10 digits.";
        }
    }
}

function input_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}





if(isset($_POST['save_student'])){
    $name=mysqli_escape_string($conn,$_POST['name']);
    $email=mysqli_escape_string($conn,$_POST['email']);
    $phone=mysqli_escape_string($conn,$_POST['phone']);
    $role=mysqli_escape_string($conn,$_POST['course']);
    $password=mysqli_escape_string($conn,$_POST['password']);

    $query="INSERT INTO student (name,email,phone,course, password) VALUES ('$name','$email','$phone','$role', '$password')";

    $query_run=mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['message']="Data Inserted sucessfully";
        header("location: ../createstudent.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Data Not Inserted ";
        header("location: index.php");
        exit(0);

    }



}

if(isset($_POST['save_teacher'])){
    $name=mysqli_escape_string($conn,$_POST['name']);
    $email=mysqli_escape_string($conn,$_POST['email']);
    
    
    $password=mysqli_escape_string($conn,$_POST['password']);

    $query="INSERT INTO teacher (name,email, password,phone) VALUES ('$name','$email', '$password','$phone')";

    $query_run=mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['message']="Data Inserted sucessfully";
        header("location: ../createteacher.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Data Not Inserted ";
        header("location: index.php");
        exit(0);

    }



}







