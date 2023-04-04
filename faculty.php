<?php
	session_start();
	
	require("db_connection.php");
	
	$result = mysqli_query($connect, "SELECT * FROM faculty_tab");
	$row = mysqli_fetch_assoc($result);
	$name = $row['faculty_name'];
	$startDate = $row['faculty_doj'];
	$department = $row['department'];
	
	$result = mysqli_query($connect, "SELECT student_name FROM student_tab");
	$student = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$student[] = $row['student_name'];
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
		<h1>WELCOME TO FACULTY PAGE</h1>
		<p>Name: <?php echo $name; ?></p>
		<p>Department: <?php echo $department; ?></p>
		<p>Date of Joining: <?php echo $startDate; ?></p>
		<h2>Student(s) Being Taught By Self</h2>
		<ul>
		<?php foreach ($student as $s): ?>
			<li><?php echo $s; ?></li>
		<?php endforeach; ?>
		</ul>
		<h2>Courses Teach By Self</h2>
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