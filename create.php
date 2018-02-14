<form method="POST" >
	Fulde navn <input type="text" name="name">
	Brugernavn <input type="text" name="username">
	Password<input type="text" name="password">
	Password<input type="password" name="password_confirm">
	<input type="submit" name="submit" value="opret">
</form>

<?php  
	$conn = mysqli_connect("localhost", "root", "", "databaseexam");
	
	if(isset($_POST['submit']))
	{
		if($_POST['password'] === $_POST['password_confirm'])
		{
			$name = $_POST['name'];
			$uname = $_POST['username'];
			// $psw = $_POST['password'];

			$psw = PASSWORD_HASH($_POST['password'], PASSWORD_DEFAULT);

			echo $psw;

			$sql = " INSERT INTO `users`(`username`, `password`, `name`) VALUES ('".$uname."','".$psw."','".$name."') ";

			$result = $conn->query($sql);

			echo "Success";
			header("Location: index.php");
		}
		else
		{
			echo "passwords did not match";
		}
	}
?>