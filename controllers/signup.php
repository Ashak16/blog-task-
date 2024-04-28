

    <!-- -----connectdb and insert data into table---------- -->
 <?php

$servername = 'localhost';
$username = 'dckap';
$password = 'Dckap2023Ecommerce';
$dbname = 'MyTaskdb';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $firstname = $_POST['username'];
    $emailid = $_POST['mail'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['confirm'];

    $sql = "INSERT INTO userdata (username, email, userpassword, userconfirmpasswprd) 
            VALUES ('$firstname', '$emailid', '$password', '$confirm_password')";
    if ($conn->query($sql) === TRUE) {
    
        header("Location:/partials/login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>
