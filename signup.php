<html>
<head>
<title>Sign Up</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
File:
<input type="text" name="username">
<input type="text" name="password">
<input type="submit" id= "signup" name= "signup" value="Sign up">
</form>
</body>
</html>

<?php
// connect to database
//include"config.php";
$hostname = "localhost";
$username = "root";
$password = "1234";
$db = "photos";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);
// $db_handle = $dbconnect->select_db($db);
if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}
else{echo "Connected successfully";}
 if(isset($_POST['signup'])) {
// $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
// $image_name = addslashes($FILES['image']['name']);
// $image_size = getimagesize($_FILES['image']['tmp_name']);
$username1 = $_POST['username'];
$password1 = $_POST['password'];
echo $username1;
echo $password1;
$username1 = mysql_real_escape_string($username1);
$password1 = mysql_real_escape_string($password1);
// if ($image_size==FALSE)
// echo "That isn't a image.";
// else
// {


$insert = "INSERT INTO usernames(username,password) VALUES ('$username1','$password1')";
mysql_query($query) or trigger_error(mysql_error()." in ".$query);

//$insert = "INSERT INTO user_photo (user_name,img) VALUES  ('Bushra','$image')";
// if ($insert === TRUE) {
//     echo "New record created successfully";
// } else {
// 	printf("Error: %s\n", mysqli_error($dbconnect));
//    // echo "Error: " . $insert . "<br>" . $dbconnect->error;
// }

mysqli_close($dbconnect);
//another choice: !mysqli_query($dbconnect, $query)

}
?>