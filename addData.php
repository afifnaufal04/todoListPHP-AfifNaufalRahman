<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $deadline = $_POST['deadline'];
    $priority = $_POST['priority'];

    if(!isset($_SESSION['task'])){
        $_SESSION['task'] = [];
    }
    $task = [
        "name" => $name,
        "deadline" => $deadline,
        "priority" => $priority
    ];
    $_SESSION['task'][] = $task;
    $_SESSION['type'] = "success";
    $_SESSION['message'] = "Task Has Successfully Added";

    header("Location: index.php");
    exit();
}
?>