<?php 
require_once('path.php');

if (isset($_SESSION['active_user'])) {


	$user_id = $_SESSION['active_user'];
	// echo  $user_id;
	

	//fetching the user data
	$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$user_data = $result->fetch_assoc();
		extract($user_data);
		// echo $role;
	}
	
	$is_user_logged = true;


}else{
	$is_user_logged = false;
	// $role = 0;    // false
	// redirect(ROOT.'login.php');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="b4/css/bootstrap.min.css">
</head>