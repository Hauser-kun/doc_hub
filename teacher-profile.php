<?php

require 'includes/dbcon.php';
if (isset($_SESSION['teacher_login']) && $_SESSION['teacher_login'] == true) {
} else {
    echo "Not logged in";
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
 



    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Users details
                            <a href="student-create.php" class="btn btn-success float-end mx-3">Add User</a>
                            
                        </h4>
                    </div>

                    <div class="card-body">
                    <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody>
                                <?php
                                $query = "SELECT * FROM student";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                ?>
                                        <tr>
                                            <td><?= $student['id']; ?> </td>
                                            <td><?= $student['name']; ?> </td>
                                            <td><?= $student['email']; ?> </td>
                                            <td><?= $student['phone']; ?> </td>
                                            <td><?= $student['course']; ?> </td>
                                            <td>
                                                <a href="view.php?id=<?= $student['id']; ?>" class="btn btn-dark">View</a>
                                                <a href="edit.php?id=<?= $student['id']; ?>" class="btn btn-primary">Edit</a>
                                                <form action="includes/code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete" value="<?= $student['id'] ?>" class="btn btn-danger">Delete</button>

                                                </form>
                                            </td>
                                        </tr>

                                <?php


                                    }
                                } else {
                                    echo "NO DATA FOUND";
                                }


                                ?>

                            </tbody>
                        </table>
            </div>
                    </div>
                </div>

            </div>
        </div>

</body>

</html>