
<?php
session_start();
if (isset($_SESSION['username'])) {
    session_unset();
    session_destroy();

    header("Location: /partials/login.html");
    exit(); 
} else {
    echo "<button class='sign_btn' onclick='signup()'>Signup</button>";
}
?>
