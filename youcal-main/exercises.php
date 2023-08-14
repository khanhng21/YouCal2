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
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 250px;
            margin: 0 auto;
        }
        label {
            display: flex;
            align-items: center; 
            margin-bottom: 10px;
            font-size: 18px;
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
        select[name='exercise_items[]'] {
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


// Retrieve exercises from the database
$sql = "SELECT * FROM exercises";
$result = mysqli_query($conn, $sql);
echo "<br><br>";

// Display list of exercises
echo "<h1>Choose your exercises:</h1><br>";
echo "<form method='post'>";
echo "<select name='exercise_items[]' multiple required>";
while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['id'] . "'>" . $row['name'] . " (" . $row['calories_per_hour'] . " cal)</option>";
}
echo "</select>";

echo "<br><br>";
echo "<strong>Duration</strong> (minutes): <input type='number' name='exercise_duration' min='1' max='120' required>";

echo "<br><br><input type='submit' value='Calculate calories'>";
echo "</form>";

// Calculate total calories burned
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $exercise_items = $_POST['exercise_items'];
    $exercise_duration = $_POST['exercise_duration'];
    $total_calories_burned = 0;

    foreach ($exercise_items as $exercise_id) {
        // Retrieve the calories burned for the selected exercise from the database
        $sql = "SELECT calories_per_hour FROM exercises WHERE id = $exercise_id";
        $exercise_result = mysqli_query($conn, $sql);
        $exercise_row = $exercise_result->fetch_assoc();
        $exercise_calories_burned = $exercise_row['calories_per_hour'];

        // Calculate total calories burned for this exercise
        $exercise_total_calories_burned = ($exercise_calories_burned / 60) * $exercise_duration;

        // Add to the total calories burned
        $total_calories_burned += $exercise_total_calories_burned;
    }

    echo "<br><br>";
    // Display the total calories burned
    echo "<h2>You would burn " . round($total_calories_burned) . " calories.</h2>";
}

    // close connection
    mysqli_close($conn);
?>
</body>
</html>
