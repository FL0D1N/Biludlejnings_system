<?php
//include auth.php file on all secure pages
include("auth.php");
require("db.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p>This is secure area.</p>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>
</div>
<?php


// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["Product_ID"]. " - Product: " . $row["Product"]. " - Price: " . $row["Price"]. ",-" , "<br>";
  }
} else {
  echo "0 results";
}
$con->close();
?>
</body>
</html>