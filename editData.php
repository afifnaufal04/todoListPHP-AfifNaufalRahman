<?php
session_start(); 

if(isset($_GET['id']) && isset($_SESSION['task'][$_GET['id']])){
    $list = $_SESSION['task'][$_GET['id']];
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_GET['id'];

    $_SESSION['task'][$id] = [
        'name' => $_POST['name'],
        'deadline' => $_POST['deadline'],
        'priority'=> $_POST['priority']
    ];

    $_SESSION['message'] = 'Task Has Been Successfully Edited';
    $_SESSION['type'] = 'success';
    header('Location: listTask.php');
    exit();
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;800&display=swap');
    </style>
</head>
<body>
<div class="container mt-5 w-50">
        <div class="card">
            <div class="card-header text-center">
                <h3>Edit Task List</h3>
            </div>
            <div class="card-body">
                <form method="POST">
                    <label for="name" class="form-label">Task Name :</label><br>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $list['name']?>"><br>

                    <label for="deadline" class="form-label">Deadline</label><br>
                    <input type="date" name="deadline" id="deadline" class="form-control" value="<?= $list['deadline']?>" required><br>

                    <label for="priority" class="form-label">Priority :</label><br>
                    <select id="priority" name="priority" class="form-select" required>
                        <option value="low" <?= $list['priority']== 'low'? 'selected':''?> >Low</option>
                        <option value="medium" <?= $list['priority']== 'medium'? 'selected':''?>>Medium</option>
                        <option value="high" <?= $list['priority']== 'high'? 'selected':''?>>High</option>
                    </select><br>

                    <button type="submit" class="btn btn-primary w-100">Update</button><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
