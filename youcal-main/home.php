YPE html>
<html>
  <head>
    <title>YouCal</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
        .logout {
            color: yellow;
        }
        .logout:hover {
            color: #f5f57a;
        }
    </style>
  </head>
  <body>
    <header>
      <h1>YouCal</h1>
      <?php
        session_start();
        $name = $_SESSION["fname"];
        echo "<h4 style='text-align: center;'>Welcome <span style='color: yellow;'>Mr. " . $name . "</span></h4>"
      ?>
      <nav style="margin-top: 0.5rem;">
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="calorie-calculator.php">Calorie Calculator</a></li>
          <li><a href="bmi-calculator.php">BMI Calculator</a></li>
          <li><a href="exercises.php">Exercises</a></li>
          <li><a href="food.php">Food</a></li>
          <li><a href="index.php?logout" class="logout"><b>Logout</b></a></li>
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
    </main>
    </div>
    <footer>
      <p>&copy; YouCal 2023.</p>
    </footer>
  </body>
</html>
