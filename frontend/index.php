<?php
session_start();
require '../includes/dbcon.php';
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
            header("location: index.php");
            exit(0);
        } else {
            echo "Error submit to the database: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "File upload failed.";
    }
}
require '../includes/dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>


</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/script/script.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="main">
        <section>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#222">
                <div class="container-fluid">
                    <a class="navbar-brand fw-bold text-white fs-3" href="#">Logo</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-white" aria-current="page" href="#">WINDOWS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="#">ANDROID</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white">TOOLS</a>
                            </li>
                        </ul>
                        <form class="d-flex me-auto">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-info" type="submit">Search</button>
                        </form>
                        <div class="mx-2">
                            <a href="../logout.php" class="btn btn-info m-2">Logout</a>
                        </div>

                        <div class="mx-3">
                            <h2 style="text-transform: uppercase; color:red"> <span style="color:#fff">Hello!! </span><?php echo $_SESSION['name']; ?></h2>
                        </div>
                    </div>
                </div>
            </nav>
        </section>

        <!-- from here the part1 start  -->
        <div class="content">
            <div class="part1">
                <h2>Welcome Students</h2>
                <p class="fs-5">Please fill the details below</p>

            </div>
        </div>

        <!-- from here the part1 ends  -->

        <div class="container mt-5">
            <div class="row col-12 m-0 p-0 mt-5">
                <div class="col-6">

                </div>
                <div class="col-12 d-flex justify-content-between">
                    <h2 style="text-transform: uppercase; color:red"> <span style="color:black">Hello!! </span><?php echo $_SESSION['name']; ?></h2>
                    <a href="../logout.php" class="btn btn-primary d-flex justify-content-center mb-2">Logout</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="card bg-dark">
                        <div class="card-header">
                            <h4 class="text-white">
                                Uplaod Files
                            </h4>

                        </div>
                        <div class="card-body border bg-primary">
                            <?php include('../message.php') ?>
                            <form action="../student-profile.php" method="post" enctype="multipart/form-data">
                                <div class="col-12">
                                    <input type="file" class="form-control" name="file">
                                </div>
                                <div class="col-12">
                                    <input type="submit" class="btn btn-dark mt-3" name="upload_file">
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <table class="table mt-5">
                    <thead>
                        <tr class="col">
                            <td></td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $student_id = $_SESSION['id'];
                        $SQL = "SELECT * FROM documents WHERE student_id = $student_id";
                        $res = $conn->query($SQL);

                        while ($row = mysqli_fetch_array($res)) {
                            echo "<tr class='col'>
                            <td></td>
                            <td>" . $row['name'] . "</td>
                            <td><a target='_blank' href='/uploads/" . $row['path'] . "'>View</a></td>
                        </tr>";
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>





    </div>

</body>

</html>