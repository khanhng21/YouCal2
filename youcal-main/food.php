<!DOCTYPE html>
<html>
<head>
    <title>Exercise Calories Calculator</title>
    <style>
        body {
	margin: 0;
	font-family: Arial, sans-serif;
	}
        h1,
        h2,
        h3 {
            margin: 0;
            text-align: center;
        }
        header {
            background-color: #0057a0;
            color: #fff;
            padding: 20px;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        nav li {
            display: inline-block;
            margin: 0 10px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
        }
        nav a:hover {
            text-decoration: underline;
        }
        form {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 250px;
            margin: 0 auto;
        }   
        input[type="submit"] {
            padding: 15px 30px;
            font-size: 16px;
            background-color: #0057a0;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
	select[name='food_items[]'] {
            font-size: 20px;
            height: 150px; 
        }
    </style>
</head>
<body>
<header>
		<h1>My Fitness Website</h1>
		<nav>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="calorie-calculator.php">Calorie Calculator</a></li>
				<li><a href="bmi-calculator.php">BMI Calculator</a></li>
                <li><a href="exercises.php">Exercises</a></li>
                <li><a href="food.php">Food</a></li>
			</ul>
		</nav>
</header>
<?php
// connect to database
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "CalorieCalculator";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) 
 die("Connection failed: " . mysqli_connect_error());


// calculate calories burned for each exercise
$sql = "SELECT * FROM foods";
$result = mysqli_query($conn, $sql);

// Display list of foods
echo "<h1><br>Choose your foods:</h1><br>";
echo "<form method='post'>";
while ($row = $result->fetch_assoc()) {
    echo "<select name='food_items[]' multiple required>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id'] . "'>" . $row['name'] . " (" . $row['calories'] . " cal)</option>";
    }
    echo "</select>";
    echo "<br><br>";
    echo "<strong><span style='font-size: 20px;'>Serving</strong>: <input type='number' name='servings' min='1' max='20' required ><br>";
}
echo "<br><input type='submit' value='Calculate calories'>";
echo "</form>";

// Calculate total calories burned
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $food_items = $_POST['food_items'];
    $servings = $_POST['servings'];
    $total_calories = 0;

    for ($i = 0; $i < count($food_items); $i++) {
        $food_id = $food_items[$i];
        $serving = $servings[$i];

        // Retrieve the calories for the selected food item from the database
        $sql = "SELECT calories FROM foods WHERE id = $food_id";
        $food_result = mysqli_query($conn, $sql);
        $food_row = $food_result->fetch_assoc();
        $food_calories = $food_row['calories'];

        // Calculate total calories for this food item
        $food_total_calories = $food_calories * $serving;

        // Add to the total calories
        $total_calories += $food_total_calories;
    }

    // Display the total calories consumed
    echo "<h2><br>You would consume " . $total_calories . " calories.</h2>";
    unset($_POST);
}
// close connection
mysqli_close($conn);

?>
</body>
</html>
