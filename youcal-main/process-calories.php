<!DOCTYPE html>
<html>
<head>
	<title>Calorie Calculator</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
			</ul>
		</nav>
	</header>
	<main>
		<h2>Calorie Calculator</h2>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Get user inputs
			$gender = $_POST['gender'];
			$age = $_POST['age'];
			$height_ft = $_POST['height_ft'];
			$height_in = $_POST['height_in'];
			$weight = $_POST['weight'];
			$goal = $_POST['goal'];
			$activity_level = $_POST['activity_level'];

			// Convert height to inches
			$height = ($height_ft * 12) + $height_in;

			// Calculate BMR using the Harris-Benedict equation
			if ($gender == 'male') {
				$bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
			} else {
				$bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
			}

			// Calculate TDEE based on activity level
			if ($activity_level == 'sedentary') {
				$tdee = $bmr * 1.2;
			} elseif ($activity_level == 'lightly_active') {
				$tdee = $bmr * 1.375;
			} elseif ($activity_level == 'moderately_active') {
				$tdee = $bmr * 1.55;
			} elseif ($activity_level == 'very_active') {
				$tdee = $bmr * 1.725;
			} else {
				$tdee = $bmr * 1.9;
			}

			// Calculate daily calorie intake based on goal
			if ($goal == 'lose') {
				$calories = $tdee - 500;
			} elseif ($goal == 'gain') {
				$calories = $tdee + 500;
			} else {
				$calories = $tdee;
			}
			$calories = round($calories);

			// Display the result
			echo 'Your recommended daily calorie intake is: ' . $calories;
		}
		?>
	</main>
	<footer>
		<p>&copy; YouCal 2023.</p>
	</footer>
</body>
</html>
