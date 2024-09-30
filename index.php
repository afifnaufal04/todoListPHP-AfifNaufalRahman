<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;800&display=swap');
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center">
                <h3>To Do List Priority</h3>
            </div>
            <div class="card-body">
                <form action="addData.php" method="POST">
                    <label for="name" class="form-label">Task Name :</label><br>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Input Task Name" required><br>

                    <label for="deadline" class="form-label">Deadline</label><br>
                    <input type="date" name="deadline" id="deadline" class="form-control" required><br>

                    <label for="priority" class="form-label">Priority :</label><br>
                    <select id="priority" name="priority" class="form-select" required>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select><br>

                    <!--Menampilkan alert -->
                    <div class="mt-3">
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

                    <button type="submit" class="btn btn-primary w-100">Create Task</button><br>
                    <a href="listTask.php" class="btn btn-secondary mt-3 w-25">To Do List</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>