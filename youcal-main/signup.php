
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
    </style>
  </head>
  <body>
    <header>
      <h1>YouCal</h1>
      <nav style="margin-top: 0.5rem;">
        <ul>
          <li>Keep calories on the low, and your health on the high</li>
        </ul>
      </nav>
    </header>
    <main>
      <h2>Welcome to My Fitness Website</h2>
      <p>
        Here you can find various tools and resources to help you achieve your
        fitness goals!
      </p>


    <div class="form-container">
        <h2>Signup Here</h2>
        <br>
        <form class="form" method="post">
          <input type="text" name="fullname" id="fullname" placeholder="Full Name" required autocomplete="off">
          <input type="text" name="email" id="email" placeholder="Email" required autocomplete="off">
          <input type="text" name="username" id="username" placeholder="Username" required autocomplete="off">
          <input type="text" name="password" id="password" placeholder="Password" required autocomplete="off">

          <input type="submit" value="Sign Up" name="Signup" class="submit-button" style="width: 20rem;">
          <p>Already have an account? <a href="index.php" class="signup-link">Click Here</a></p>
		    </form>
    </div>

    <?php
    
        if(isset($_POST['Signup'])) {
            
            $servername = "localhost:3306";
            $username = "group1user";
            $password = "Th#7W3#tXz";
            $dbname = "group1db";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
      }
            
            $query="select * from group1db.signup";

           /*$stmt = mysqli_connect ($conn,$query);
            while($row=mysqli_fetch_array($stmt,MYSQLI_ASSOC)){
              echo $row['group1db_name'].'</br>';
            }
            */
            

            $fullname = $_POST['fullname'];
            $uname = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "INSERT INTO Users (username, fullname, email, password )
            VALUES ('$uname', '$fullname', '$email', '$password')";

           try {
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('User is Registered Successfully!')</script>";
                } else {
                    echo "<script>alert('Error. This Username is Already Registered!')</script>";
                }
           }
           catch(Exception $e) {
            echo "<script>alert('Error. This Username is Already Registered!')</script>";
           }

            $conn->close();

        }
    ?>


    </main>
    <footer>
      <p>&copy; YouCal 2023.</p>
    </footer>
  </body>
</html>
