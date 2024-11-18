<?php
require_once('../processor/function.php');
require_once('../path.php');

//MAKE A USER A MANAGER

if (isset($_POST['make_manager'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];

    $sql = "UPDATE users SET role = 'manager' WHERE user_id = '$user_id'";
    $result = $conn->query($sql);
    if ($result) {
        setAlert($name . ' is already Manager', 'success');
        redirect(ROOT . 'users.php?user=' . $name);
    }
}

//MAKE MANAGER A USER

if (isset($_POST['make_user'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];

    $sql = "UPDATE users SET role = 'user' WHERE user_id = '$user_id'";
    $result = $conn->query($sql);
    if ($result) {
        setAlert($name . ' is already User', 'success');
        redirect(ROOT . 'users.php?user=' . $name);
    }
}

?>