
<!-- ----------for login fetching data from table and checking--------- -->
<?php
session_start();
$conn = new mysqli(
    'localhost', 'dckap', 'Dckap2023Ecommerce', 'MyTaskdb'
);

if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
    $name = $_POST['username'];
    $email = $_POST['mail'];
    $passwords = $_POST['passcode'];

    $sql = "SELECT * FROM userdata WHERE username='$name' AND userpassword='$passwords'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['username'] = $row['username'];
    
          header("Location:/controllers/blog.php");
          exit; 
      } else {
          echo "Incorrect password";
      }
      
    } 

$conn->close();
?>
