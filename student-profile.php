<?php
session_start();
require 'includes/dbcon.php';
if (isset($_SESSION['student_login']) && $_SESSION['student_login'] == true) {
} else {
    echo "Not logged in";
}

if (isset($_POST['upload_file'])) {
    $originalName = $_FILES['file']['name'];
    $uniqueName = uniqid() . '-' . basename($originalName);
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . $uniqueName;

    // Ensure the uploads directory exists
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        $stmt = $conn->prepare("INSERT INTO documents (name, path, student_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $originalName, $uniqueName, $_SESSION['id']);

        if ($stmt->execute()) {
            echo "";
            $_SESSION['message'] = "File successfully uploaded and information saved to the database.";
            header("location:   frontend/index.php");
            exit(0);
        } else {
            echo "Error submit to the database: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "File upload failed.";
    }
}
require 'includes/dbcon.php';
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
        <div class="row col-12 m-0 p-0 mt-5">
            <div class="col-6">

            </div>
            <div class="col-12 d-flex justify-content-between">
                <h2 style="text-transform: uppercase; color:red"> <span style="color:black">Hello!! </span><?php echo $_SESSION['name']; ?></h2>
                <a href="logout.php" class="btn btn-primary d-flex justify-content-center mb-2">Logout</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Uplaod Files
                        </h4>

                    </div>
                    <div class="card-body border">
                        <?php include('message.php') ?>
                        <form action="student-profile.php" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <input type="file" class="form-control" name="file">
                            </div>
                            <div class="col-12">
                                <input type="submit" class="btn btn-primary mt-3" name="upload_file">
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

        
    </div>

</body>

</html>