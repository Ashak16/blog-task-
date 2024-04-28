
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Webpage</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<style>
    /* Basic styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #062242;
    padding: 20px 0;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    text-align: left;
}

nav ul li {
    display: inline;
    margin-right: 40px;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

nav ul li a:hover {
    color: #ddd;
}

.content {
    padding:20px;
    border: 1px solid rgb(207, 207, 207);
}
nav ul li.profile {
    float: right;
    border-radius: 50%; 
    overflow: hidden; 
}

nav ul li.profile a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    border-radius: 50%; /* Make the link round */
}
.button{
    border: none;
    /* padding: 4px; */
    background-color: #062242;
    color: white;
    font-family: Arial, sans-serif;
    font-weight: bold;
    font-size: 15px;
}    
.grid-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
      padding: 20px;
    }
    .grid-item {
      border: 2px solid #ddd;
      padding: 12px;
    }
    .sign_btn,.logout_btn{
        float: right;
        padding: 6px;
        margin-right: 1bpx;
        font-family: Arial, sans-serif;
        border: none;
        border-radius: 8px;
        background-color:white;
        color: black;
        font-weight: bold;
        
    }
</style>
<!-- --------------------navbar-------------- -->
<body>
    <header>
        <nav>
            <ul> 
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li><a href="#Terms">Terms and Conditions</a></li>
                <button class="button" id='btn2' onclick="gridView()">Blog</button>
                <button class="sign_btn" id='btn3' onclick=" signup()">Signup</button>

           </ul>
        </nav>
    </header>
    <div class="content">
        <h1>Hello!</h1>
    </div>
    
  </body>
  </html>
    
    <!-- -------------signup button-------------- -->
    <script>
       function signup()
       {
         location.href="/partials/signup.html";
       }
    </script>
<!-- ------------retrieve_data_from_database to display in blog----- -->
    <?php
        function retrieve_data_from_database() {
            $conn=new mysqli('localhost','dckap','Dckap2023Ecommerce','MyTaskdb');
            $query = "SELECT * FROM posts WHERE status = 'published'"; 
            $result = $conn->query($query);
            $data = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            $conn->close();
            return $data;
          }
          $data = retrieve_data_from_database();
    ?>

<!-- ------------gridview--------- -->
<div class="grid-container" id="grid-view" style="display: none;">
    <?php foreach ($data as $row): ?>
      <div class="grid-item">
        <p><strong>Id:</strong> <?php echo $row['id']; ?></p>
        <p><strong>Title:</strong> <?php echo $row['Title']; ?></p>
        <p><strong>Status:</strong> <?php echo $row['status']; ?></p>
        <p><strong>Author:</strong> <?php echo $row['author']; ?></p>
        <p><strong>Content:</strong> <?php echo $row['content']; ?></p>
      </div>
    <?php endforeach; ?>
  </div>
<!-- ---------------click event for blog button-------- -->
<script>
        function gridView() {
            // console.log("hi");
            let gridView = document.getElementById("grid-view");
            let content=document.querySelector(".content")
            gridView.style.display = 'block';
            content.innerHTML="blogs"
        }
    </script>

<!-- -----------------logout----------- -->
<?php
session_start(); 

require '../controllers/blog.php';

    if (isset($_SESSION['username'])) {
        echo "<span><button class='logout_btn'><a href='logout.php' class='menu'>Logout</a></button></span>";
    } else {
        echo "<button class='sign_btn' onclick='signup()'>Signup</button>";
    }
    ?>
