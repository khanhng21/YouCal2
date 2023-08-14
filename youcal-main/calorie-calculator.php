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
                <li><a href="BMI-calculator.php">BMI Calculator</a></li>
				<li><a href="exercises.php">Exercises</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<h2>Calorie Calculator</h2>
		<form class="form" method="post" action="process-calories.php">
			<h3>Personal Information</h3>
			<select name="gender" id="gender" required>
			<option value="">--Select Gender--</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
			</select>

			<input type="number" name="age" id="age" placeholder="Age" required>

			<input type="number" name="height_feet" id="height_feet" placeholder="Height (ft)" required>
			<input type="number" name="height_inches" id="height_inches" placeholder="Height (in)" required>

			<input type="number" name="weight" id="weight" placeholder="Weight (lbs)" required>

			
			<h3>Goals</h3>
			<select name="goal" id="goal" required>
				<option value="">--Select Goal--</option>
				<option value="lose_weight">Lose Weight</option>
				<option value="maintain_weight">Maintain Weight</option>
				<option value="gain_weight">Gain Weight</option>
			</select>
			
			<h3>Activity Level</h3>
			<select name="activity_level" id="activity_level" required>
				<option value="">--Select Activity Level--</option>
				<option value="sedentary">Sedentary</option>
				<option value="lightly_active">Lightly Active</option>
				<option value="moderately_active">Moderately Active</option>
				<option value="very_active">Very Active</option>
				<option value="extra_active">Extra Active</option>
			</select>

			<input type="submit" value="Calculate Calories" class="submit-button">
