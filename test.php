<html>
<head>
<title>Upload an image</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
File:
<input type="file" name="image"> <input type="submit" name= "upload" value="Upload">
</form>
<img src="images/gallery/<?php echo $image; ?>.jpg">
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
 if(isset($_POST['upload'])) {
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name = addslashes($FILES['image']['name']);
$image_size = getimagesize($_FILES['image']['tmp_name']);
//echo  '<img src="images/gallery/'.$result.'.jpg">'

if ($image_size==FALSE){
echo "That isn't a image.";}
else
{
$insert = mysqli_query($dbconnect,"INSERT INTO user_photo(user_name,img) VALUES  ('Bushra','$image')");
//$insert = "INSERT INTO user_photo (user_name,img) VALUES  ('Bushra','$image')";
if ($insert === TRUE) {
    echo "New record created successfully";
} else {
	printf("Error: %s\n", mysqli_error($dbconnect));
   echo "Error: " . $dbconnect->error;
}

mysqli_close($dbconnect);
//another choice: !mysqli_query($dbconnect, $query)
}
}
?>
<!-- 
<?php
// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// // // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
// ?>
// <?php
// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
// // Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
// }
// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }
?> -->