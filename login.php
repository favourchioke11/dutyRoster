<?php
require_once('processor/function.php');
require_once('path.php');
require_once('includes/head.php');

?>

<body>
    <section class="login">

        <form class="login" autocomplete="off" action="processor/login.php" method="POST">
            <h3>Login here...</h3>
            <?= showAlert() ?>
            <div>
                <label for="">Email</label>
                <input type="email" name="email" placeholder="Your valid Email">
            </div>
            <div>
            <a href="#" class="forgot-password">Forgot Password?</a>
                <label for="">Password</label>
                <input type="password" name="password" id="" placeholder="Your Password">

            </div>
            <button class="button" type="submit"
                name="login">Submit</button>
        
            <p>You don't have an account? <a href="register.php" class="forgot-password">Register here...</a></p>
            
        </form>
    </section>
</body>

</html>