<?php

require_once('./path.php');

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    session_destroy();
    redirect($url);
}else{
    session_destroy();
    redirect(ROOT.'login.php');
}

?>