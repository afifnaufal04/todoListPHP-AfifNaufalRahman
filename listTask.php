<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;800&display=swap');
    </style>
</head>
<body>
    <div class="container w-50 mt-4">
        <div class="card">
            <div class="card-header text-center">
                <h3>Task List</h3>
            </div>
            <!--Menampilkan alert -->
            <div class="mt-3 mx-3">
                    <?php
                        if (isset($_SESSION['message'])) {
                            echo '<div class="alert alert-' . $_SESSION["type"] . ' alert-dismissible fade show" role="alert">';
                            echo $_SESSION['message'];
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                            unset($_SESSION['message']);
                            unset($_SESSION['type']);
                        }
                    ?>
                    </div>
            <div class="card-body">
                <?php
                    if(isset($_SESSION['task']) && !empty($_SESSION['task'])){
                        echo '<table class="table">';
                        echo '<thead class="text-center"><tr>
                        <th>Task Name</th>
                        <th>Deadline</th>
                        <th>Priority</th>
                        <th>Action</th>
                        </tr></thead>';
                        echo '<tbody class="text-center">';
                        foreach ($_SESSION['task'] as $id =>$task){
                            echo '<tr>';
                            echo '<td>' . $task['name'] . '</td>';
                            echo '<td>' . $task['deadline'] . '</td>';
                            echo '<td>' . $task['priority'] . '</td>';
                            echo '<td>';
                                echo '<a href="editData.php?id=' . $id . '" class="btn btn-sm btn-info mx-2 w-25">Edit</a>';
                                echo '<a href="delete.php?id=' . $id . '" class="btn btn-sm btn-danger w-25">Remove</a>';
                                echo '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody></table>';
                    }else{
                        echo '<div class="alert alert-danger">Data is Empty</div>';
                    }

                ?>
                <a href="index.php" class="btn btn-primary w-100">Add New Task</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>