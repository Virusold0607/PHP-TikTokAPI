<?php
    $servername = "89.116.53.97";
    $username = "u458176536_turki";
    $password = "TikTok123";
    $dbname = "u458176536_tiktok";
  
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
  
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
  // Get the data sent in the Ajax request
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $followers = intval($_POST['followers']);
  $likes = intval($_POST['likes']);
  $sales = intval($_POST['sales']);
  // Insert the data into the database
  $sql = "INSERT INTO tiktok_data (username, follower_num, like_num, sales) VALUES ('$username', $followers, $likes, $sales)";
  $result = mysqli_query($conn, $sql);

  // Check for query errors
  if (!$result) {
      die("Query failed: " . mysqli_error($conn));
  }

  // Close the database connection
  mysqli_close($conn);

  // Return a success message to the client
  echo "Data saved successfully!";


?>