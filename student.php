<?php
	session_start();
	
	if (!isset($_SESSION['username'])) {
		header('Location: login.php');
		exit();
	}
	
	require("db_connection.php");

	
	$result = mysqli_query($connect, "SELECT * FROM student_tab");
	$row = mysqli_fetch_assoc($result);
	$name = $row['student_name'];
	$major = $row['student_major'];
	
	$result = mysqli_query($connect, "SELECT * FROM faculty_tab");
	$row = mysqli_fetch_assoc($result);
	$department = $row['department'];
	
	$result = mysqli_query($connect, "SELECT faculty_name FROM faculty_tab WHERE department = '$department'");
	$faculty = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$faculty[] = $row['faculty_name'];
	}
	
	$result = mysqli_query($connect, "SELECT * FROM courses_tab");
	$row = mysqli_fetch_assoc($result);
	
	mysqli_close($connect);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Student Page</title>
	</head>
	<body>
		<h1>WELCOME TO STUDENT PAGE</h1>
		<p>Name: <?php echo $name; ?></p>
		<p>Major: <?php echo $major; ?></p>
		<h2>Faculty for this Major</h2>
		<ul>
		<?php foreach ($faculty as $f): ?>
			<li><?php echo $f; ?></li>
		<?php endforeach; ?>
		</ul>
		<h2>All Courses Being Taken</h2>
		<table>
			<tr>
				<td>Course ID: <?php echo $row['course_id']; ?></td>
			</tr>
			<tr>
				<td>Name: <?php echo $row['course_name']; ?></td>
			</tr>
			<tr>
				<td>Credits: <?php echo $row['credits']; ?></td>
			</tr>
		</table>
	</body>
</html>