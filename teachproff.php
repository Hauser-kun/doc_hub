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
                                    
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody>
                                <?php
                                $query = "SELECT * FROM teacher";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $teacher) {
                                ?>
                                        <tr>
                                            <td><?= $teacher['id']; ?> </td>
                                            <td><?= $teacher['name']; ?> </td>
                                            <td><?= $teacher['email']; ?> </td>
                                            <td><?= $teacher['phone']; ?> </td>
                                            
                                            <td>
                                                <a href="viewteach.php?id=<?= $teacher['id']; ?>" class="btn btn-dark">View</a>
                                                <a href="teacher-edit.php?id=<?= $teacher['id']; ?>" class="btn btn-primary">Edit</a>
                                                <form action="includes/code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_teacher" value="<?= $teacher['id'] ?>" class="btn btn-danger">Delete</button>

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