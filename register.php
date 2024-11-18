<?php
require_once('processor/function.php');
require_once('path.php');
require_once('includes/head.php');

?>

<body>
    <section class="login shadow">
        

        <form class="login" autocomplete="off" action="processor/registration.php" method="POST">
        <h3>Register Here...</h3>
            <?= showAlert()?>
            <div>
                <label for="">Fullname</label>
                <input type="text" name="name" id="" placeholder="Name">
            </div>
            
            <div>
                <label for="">Email</label>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="password" id="" placeholder="Password">
            </div>

            <div>
                <input type="password" name="confirmPassword" placeholder="Confirm Password">
            </div>

            <!-- <input type="text" name="confirmPassword" placeholder="Confirm Password"> -->

            <button class="button" type="submit"
                name="register">Submit</button>
            <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
        </form>
    </section>
</body>

</html>