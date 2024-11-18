<?php

require_once('../processor/function.php');
require_once('../path.php');

if (isset($_POST['addtask'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['dueDate'];
    $priority = $_POST['priority'];
    $created_by = $_POST['created_by'];
    $assigned_to = $_POST['assigned_to'];
    // dnd($created_by);

    // dnd($assigned_to);

    // check if all fills are filled

    if (empty($title) || empty($description) || empty($deadline) || empty($priority) || empty($assigned_to)) {
        setAlert('All Fields are required', 'danger');
        redirect(ROOT . 'add-task.php');
    }

    $sql = "INSERT INTO task (title, description, deadline, priority, created_by, assigned_to) 
        VALUES ('$title', '$description', '$deadline', '$priority', '$created_by', '$assigned_to')";
        dnd($sql);

    if ($conn->query($sql) === TRUE) {
        setAlert('Task added successfully', 'success');
        redirect(ROOT . 'task.php');
    } else {
        setAlert('Error while adding task', 'danger');
        redirect(ROOT . 'task.php');
    }

}

?>