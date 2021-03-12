<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "Archive";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_error());
} 
else{
  // echo "Connected successfully";
  // $sql = "SELECT GameTitle, image from Awards";
  $query = "SELECT GameTitle from Awards";
  // $result = mysqli_query($link, $query) or die(mysqli_error($link));
  // $array = mysql_fetch_row($result);                   
  // echo json_encode($array);
  echo 'hey im work';
  mysqli_close($conn);
}
?>