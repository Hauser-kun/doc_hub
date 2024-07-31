<?php
session_start();
require 'includes/dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">

        <?php include('message.php') ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Users</h4>
                        <a href="studenttable.php" class="btn btn-danger float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $teacher_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM teacher WHERE id='$teacher_id'";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $teacher = mysqli_fetch_array($query_run);
                                // print_r($teacher);
                        ?>
                                <form action="includes/code.php" method="POST">
                                    <input type="hidden" name="teacher_id" value="<?= $teacher_id ?>">
                                    <div class="mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="<?=$teacher['name']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="text" name="email" value="<?=$teacher['email']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Phone</label>
                                        <input type="text" name="phone" value="<?=$teacher['phone']; ?>" class="form-control">
                                    </div>

                                    
                                    <div class="mb-3">
                                        <button type="submit" name="edit_teacher"  class=" btn btn-primary">Save Edit</button>
                                    </div>
                                </form>


                        <?php

                            } else {
                                echo "NO Data Found";
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>