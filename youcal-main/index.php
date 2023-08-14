<?php

session_start();

$query = $_SERVER['QUERY_STRING'];
if($query == "logout") {
    session_destroy();
    header('location:index.php', true, 301);
    exit();
}

if(isset($_SESSION["uname"])) {
    header('location:home.php');
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>YouCal</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
      .form-container {
        margin-top: 5rem;
      }
      .signup-link {
        color: #0057a0;
        text-decoration: none;
        font-weight: 600;
      }
      .signup-link:hover {
        text-decoration: underline;
        color: #377bb3;
      }
      .bg-background{
        background-image: url(6.jpg);
      }
    </style>
  </head>
  <body>
    <header>
      <h1>YouCal</h1>
      <nav style="margin-top: 0.5rem;">
        <ul>
          <li>Keep calories on the low, and your health on the high</li>
          <span id="calories on the low, and your health on the high"></span>

<!-- Load library from the CDN -->
<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

<!-- Setup and start animation! -->
<script>
  var typed = new Typed('Keep', {
    strings: ['<i>First</i> sentence.', '&amp; .calories on the low, and your health on the high'],
    typeSpeed: 100
    
    ,
  });
</script>
</body>
        </ul>
      </nav>
    </header>
    <div class="bg-background">
    <main>
      <h2>Welcome to My Fitness Website</h2>
      <p>
        Here you can find various tools and resources to help you achieve your
        fitness goals!
      </p>


    <div class="form-container">
        <h2>Login Here</h2>
        <br>
        <form class="form" method="post">
          <input type="text" name="username" id="username" placeholder="Username" required autocomplete="off">
          <input type="password" name="password" id="password" placeholder="Password" required autocomplete="off">

          <input type="submit" value="Login" name="Login" class="submit-button" style="width: 20rem;">
          <p>Don't have an account? <a href="signup.php" class="signup-link">Click Here</a></p>
		    </form>
    </div>

    <?php
     if(isset($_POST['Login'])){ //check if form was submitted

      $servername = "localhost:3306";
      $username = "group1user";
      $password = "Th#7W3#tXz";
      $dbname = "group1db";


      // Create connection
      $conn = mysqli_connect ($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $uname = $_POST['username'];
      $password = $_POST['password'];
  
      $sql = "SELECT * FROM Users WHERE username = '$uname' AND password = '$password'";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $_SESSION["uname"] = $row["username"];
          $_SESSION["fname"] = $row["full_name"];
          echo "<script>alert('Login Successfully!')</script>";
          header('location:home.php');
      } else {
          echo "<script>alert('Error. Invalid Credentials!')</script>";
      }
  
      $conn->close();
  
  
    }  
    
    ?>


    </main>
    </div>
    <footer>
      <p>&copy; YouCal 2023.</p>
    </footer>
  </body>
</html>
