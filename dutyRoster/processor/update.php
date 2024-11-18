<?php
require_once('../processor/function.php');
require_once('../path.php');

// UPDATING A TASK
if (isset($_POST['update_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['dueDate'];
    $priority = $_POST['priority'];
    $created_by = $_POST['created_by'];
    $assigned_to = $_POST['assigned_to'];
    $task_id = $_POST['update_task'];

    $sql = "UPDATE task SET title = '$title', description = '$description', deadline = '$deadline', 
    priority = '$priority', created_by = '$created_by', assigned_to = '$$assigned_to'  WHERE task_id  = '$task_id'";

    if ($conn->query($sql) === TRUE) {
        setAlert('Task Updated Successful', 'success');
        redirect(ROOT . "task?to_do=$task_id");
    } else {
        echo mysqli_error($conn);
        setAlert('Sorry, Error in updating task, Please try again', 'danger');
        redirect(ROOT . "task?to_do=$task_id");
    }


}

//DELETING A TASK
if (isset($_POST['delete_task'])) {
    $task_id = $_POST['delete_task'];
    // print_r($task_id);

    $sql = "DELETE FROM task WHERE task_id = '$task_id'";
    $result = $conn->query($sql);
    if ($result) {
        setAlert('Deleted', 'danger');
        redirect(ROOT . 'task.php');
    }
}

// USER UPDATING A STATUS
if (isset($_POST['update_status'])) {
    $status = $_POST['status'];
    $task_id = $_POST['update_status'];
    
    $sql = "UPDATE task SET status = '$status' WHERE task_id = '$task_id'";
    if ($conn->query($sql) === TRUE) {
        setAlert('Status Updated', 'success');
        redirect(ROOT . "task.php?msg=Task completed!");
    } else {
        echo "Error updating status: ". $conn->error;
    }
    
}



?>