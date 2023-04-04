<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login Result</title>
	</head>
	<body>
		<?php if (isset($error_message)): ?>
			<p><?php echo $error_message; ?></p>
		<?php endif; ?>
	</body>
</html>

<?php 
	session_start();
	
	$text = rand(10000, 99999);
	$_SESSION["vercode"] = $text;
	$height = 25;
	$width = 65;
	
	$image_p = imagecreate($width, $height);
	$black = imagecolorallocate($image_p, 0, 0, 0);
	$white = imagecolorallocate($image_p, 255, 255, 255);
	$font_size = 14;
	
	imagestring($image_p, $font_size, 5, 5, $text, $white);
	imagejpeg($image_p, null, 80);
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		
		require("db_connection.php");
		
		$result = mysqli_query($connect, "SELECT * FROM users_tab WHERE username = '$username'");
		
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['username'] = $username;
			
			if ($role == 'S') {
				header('Location: student/student.php');
			}
			elseif ($role == 'F') {
				header('Location: faculty.php');
			}
			elseif ($role == 'A') {
				header('Location: admin.php');
			}
			exit();
		}
		$error_message = 'Invalid Input!';
	}
?>