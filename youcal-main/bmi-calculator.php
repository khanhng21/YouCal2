<!DOCTYPE html>
<html>
<head>
	<title>BMI Calculator</title>
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
				<li><a href="food.php">Food</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<h2>BMI Calculator</h2>
		<form class="form" method="post">
		<input type="number" name="height_ft" id="height_ft" placeholder="Height (ft)" min="0" max="12" required>
            <input type="number" name="height_in" id="height_in" placeholder="Height (in)" min="0" max="11" required>
            <input type="number" name="weight" id="weight" placeholder="Weight (lbs)" min="0" required>

            <input type="submit" value="Calculate BMI" class="submit-button">
		</form>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Get user inputs
			$height_ft = $_POST['height_ft'];
			$height_in = $_POST['height_in'];
			$weight = $_POST['weight'];

			// Convert height to inches
			$height = ($height_ft * 12) + $height_in;

			// Calculate BMI using the formula BMI = (weight / (height * height)) * 703
			$bmi = ($weight / ($height * $height)) * 703;

			// Display the result
			echo '<br><br>';
			echo '<h2>Your BMI is: <span style="font-size: 25px;"> <strong>' . round($bmi, 1) . '</strong></span></h2>';
			echo '<br>';

			// Display the BMI status
			if ($bmi < 18.5) {
				echo '<h3>Your BMI status: Underweight</h3>';
			} elseif ($bmi >= 18.5 && $bmi < 25) {
				echo '<h3>Your BMI status: Normal weight</h3>';
			} elseif ($bmi >= 25 && $bmi < 30) {
				echo '<h3>Your BMI status: Overweight</h3>';
			} else {
				echo '<h3>Your BMI status: Obesity</h3>';
			}
		}
		?>
	</main>
	<footer>
		<p>&copy; YouCal 2023.</p>
	</footer>
</body>
</html>
