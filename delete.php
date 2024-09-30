<?php
session_start();
if (isset($_GET['id']) && isset($_SESSION['task'][$_GET['id']])) {
    $delete_id = $_GET['id'];
    unset($_SESSION['task'][$delete_id]);
}

$_SESSION['message'] = 'Task Has Been Successfully Deleted';
$_SESSION['type'] = 'success';


header("Location: listTask.php");
exit();
?>