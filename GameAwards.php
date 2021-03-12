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
  if(isset($_POST['all_value'])){
    $sql= "SELECT GameTitle, Description, Category, Year, image from Awards";
  }
  if(isset($_POST['value'])){
    // echo "hey ";
    // echo $_POST['value'];
    $value = $_POST['value'];
    if ($value=='All'){
      $value = "";
      echo $value;
    }
    $sql= "SELECT GameTitle, Description,  Category, Year, image from Awards where Category LIKE ('%$value%')";
}
  $result = mysqli_query($conn, $sql);
  $id = 0;
  $pos = 0;
  $buttons = array("X", "Y", "A", "B");
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      // echo "Name: " . $row["Name"]. " " . $row["img"]. "<br>";
      $id++;
      // echo $id;
      $hold = $id;
      settype($hold, "string"); 
      // echo $hold;
      echo '&nbsp';
      echo '<div id="'.$hold.'" class="Game-container">';
      echo'<div class="overlay-container">';
        echo '<div class="overlay">'.$buttons[''.$pos.''].'</div>';
        echo '<img class="gameTitles" onmouseover="addDescription('.$hold.')" onmouseout="removeDescription('.$hold.')"src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>';
        // echo '<div class="gameDescription"><div class="about-game"><strong>' . $row['GameTitle']. '</strong><br>' . $row['Category']. ' ' . $row['Year'] . '</div><div class="game-description">'. $row['Description']. ' ' . '</div>';
        echo '<div class="gameDescription"><strong><div class="about-game">' . $row['GameTitle']. '</strong><br>' . $row['Category']. ' ' . $row['Year'] . '</div>'. $row['Description']. '<div class="triangle"></div><div class="triangle2"></div> ' . '</div>';
        echo '</div>';
      echo '</div>';
      $pos++;
      $pos = $pos%4;
    }
  }
  else {
    echo "0 results";
  }
  mysqli_close($conn);
}
?>