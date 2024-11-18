<?php 
require_once('../processor/function.php');
require_once('../path.php');

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

       // Validate the form inputs
       if (empty($email) || empty($password)) {
        setAlert('Fields are required', 'danger');
        redirect(ROOT. 'login.php');
    }

    //checking if the email exit
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        print_r($user_data);
      
        // verifying the password
        if (password_verify($password, $user_data['password'])) {
            $_SESSION['active_user'] = $user_data['user_id'];
            redirect(ROOT . 'task.php');
        } else {
            setAlert('Incorrect Password', 'danger');
            redirect(ROOT . 'login.php');
        }
    } else {
        setAlert('Invalid credentials', 'danger');
        redirect(ROOT . 'login.php');
    }

}

?>