<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Education Management System</title>
	</head>
	<body>
		<section>
			<center><h2>Education Management System</h2></center>
			<form method="post" action="loginFunction.php">
				<table align="center">
					<tr>
						<td><img src="captcha.php" alt="CAPTCHA"></td>
					</tr>
					<tr>
						<td>Enter Username:</td>
						<td> <input type="text" name="username" size="48" required> </td>
					</tr>
					<tr>
						<td>Enter Password:</td>
						<td> <input type="password" name="password" size="48" required> </td>
					</tr>
					<tr>
						<td>Enter Role:</td>
						<td> 
							<select name="role" required>
								<option value="S">Student</option>
								<option value="F">Faculty</option>
								<option value="A">Admin</option>
							</selected><br>
						</td>
					</tr>
					<tr>
						<td>Enter What Is Said On Captcha:</td>
						<td><input type="text" id="captcha" name="captcha" required> </td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="SUBMIT">
						</td>
					</tr>
				</table>
			</form>
		</section>		
	</body>
</html>

