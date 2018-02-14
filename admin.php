<title>Admin Page</title><?php

if(isset($_POST["submit"])) {
	$conn = mysqli_connect("localhost", "root", "", "databaseexam");
	$username = $_POST["username"];
	$password = $_POST["password"];
	$hash = PASSWORD_HASH($password, PASSWORD_DEFAULT);
	$sql = "SELECT * FROM `adminusers` WHERE username = '".$username."' ";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$hashed_password = $row["password"];
	if(password_verify($password, $hashed_password))
	{
		if($result->num_rows > 0) 
		{
			header("Location: userlist.php");
			exit;
		} else 
		{
			echo "<p style='color:red'>Wrong Username/Password</p>";
		}

	}
	
}
?>

<form action="admin.php" method="POST">
	username:<input type="text" name="username">
	password:<input type="password" name="password">
	<input type="hidden" name="strongkey" value="Lzk34yR71?hrIP">
	<input type="submit" name="submit" value="login">
	<a href="" name=""></a>
</form>