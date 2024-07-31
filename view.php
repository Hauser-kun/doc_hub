<?php

require 'includes/dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Students Details

                            <a href="studenttable.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM student WHERE id='$student_id'";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                                // print_r($student);
                        ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?= $student_id ?>">
                                    <div class="mb-3">
                                        <label for="">Name</label>

                                        <p class="form-control"><?= $student['name']; ?> </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <p class="form-control"><?= $student['email']; ?> </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Phone</label>
                                        <p class="form-control"><?= $student['phone']; ?> </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Course</label>
                                        <p class="form-control"><?= $student['course']; ?> </p>
                                    </div>

                                </form>


                        <?php

                            } else {
                                echo "NO Data Found";
                            }
                        }
                        ?>

                        <div class="col-12">
                            <table  class="table">
                                <thead>
                                <tr>
                                    <td scope="col">SN</td>
                                    <td scope="col">File Name</td>
                                    <td scope="col">File Path</td>
                                    <td scope="col">File Status</td>
                                    <td scope="col">Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM documents WHERE student_id='$student_id'";
                                $query_run = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($query_run)) {
                                    echo "<tr>
                                    <td>" .$row['id']."</td>
                                    <td>" . $row['name'] . "</td>
                                    <td>" . $row['path'] . "</td>
                                    
                                    <td><a target='_blank' href='http://localhost/ILOVECODE/uploads/" . $row['path'] . "' class='btn btn-primary'>View</a></td>
                                    <td><a  class='btn btn-dark'>Delete</a></td>
                                </tr>";
                                    // echo $row['path'];
                                    
                                }


                                ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>