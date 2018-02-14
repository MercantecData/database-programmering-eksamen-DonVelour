<?php
	$conn = mysqli_connect("localhost", "root", "", "databaseexam");
	$sql = "SELECT `id`, `name` FROM `users` WHERE 1";
	$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>User List</title>

</head>
<body>
	<h1>Users:</h1>
	<?php 
	while($row = $result->fetch_assoc()){
		echo "<form action='userlist.php' method='POST'>";
		$name = $row["name"];
		echo $name;
		echo "   <a href='d.php' name='delete' >delete</a>";
		echo "<br>";
		echo "</form>";
	}
	?>
</body>
</html>