<?php
session_start();
$usrname = $_POST["username"];
$password = $_POST["password"];

$hash = PASSWORD_HASH($password, PASSWORD_DEFAULT);

$conn = mysqli_connect("localhost", "root", "", "databaseexam");

$sql = "SELECT `id`, `username`, `password`, `name` FROM `users` WHERE `username` = '".$usrname."' ";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$hashed_password = $row["password"];

if(password_verify($password, $hashed_password))
{
	echo $sql . "<br>";

	var_dump($row);
	$id = $row["id"];
	$name = $row["name"];
	$img = $row[""];
	// $_SESSION['image'] = $img;
	$_SESSION['userID'] = $id;
	$_SESSION["userName"] = $name;

	$URL = $_SESSION[$row["imageURL"]];

	header("Location: index.php");//redirects back

}
