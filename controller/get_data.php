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
  // Query the database for data from a table
  $sql = "SELECT * FROM tiktok_data";
  $result = mysqli_query($conn, $sql);

  // Check for query errors
  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }
  
  $tableData = "";
  if(mysqli_num_rows($result) <= 0) {
  $tableData = '<div class="products-row" style="text-align:center">
    <div class="product-cell" style="display: inline-block; font-size: 20px">
      No Data...
    </div>
  </div>';
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $tableData .= "<div class='products-row'>
      <div class='product-cell image'>
        <img src='https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80' alt='product'><span>" . $row["username"] . "</span></div>
      <div class='product-cell category'><span class='cell-label'>Followers:</span>" . $row["follower_num"] . "</div>
      <div class='product-cell sales'><span class='cell-label'>Likes:</span>" . $row["like_num"] . "</div>
      <div class='product-cell stock'><span class='cell-label'>Sales:</span>" . $row["sales"] . "</div></div>";
    }
  }
  echo $tableData;
?>