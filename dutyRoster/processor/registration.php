<?php
require_once('../processor/function.php');
require_once('../path.php');


if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    //validate the form inputs

    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        setAlert('Fields are required', 'danger');
        redirect(ROOT. 'register.php');

    }

    //filter validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setAlert('Invalid email format', 'danger');
        redirect(ROOT . 'register.php');
    }

     //password validation
     if (strlen($password) < 6) {
        setAlert('Password must be at least 6 characters long', 'danger');
        redirect(ROOT . 'register.php');

    }

    //password and comfirmpassword
    if ($password != $confirmPassword) {
        setAlert('Password and confirm password do not match', 'danger');
        redirect(ROOT . 'register.php');

    }

    
    $date = date('D d : M : Y');

    $secure_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        setAlert('Email already exists', 'danger');
        redirect(ROOT . 'register.php');
    }

      //save into the database
      $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$secure_password', 'user')";
  
      if ($conn->query($sql) === TRUE) {
          setAlert('Registration successful', 'success');
          redirect(ROOT . 'login.php');
      } else {
          setAlert('Registration failed', 'danger');
          redirect(ROOT . 'register.php');
      }


}


?>