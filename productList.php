<!DOCTYPE HTML>
<html>
<head>
   <meta charset="utf-8" />
   <title>List of products</title>
   <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
   <?php
      require_once("connectionvars.php");

      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME)
         or die('Error connecting to MySQL server.');
      $query = "SELECT * FROM Products";
      $result = mysqli_query($dbc, $query) or die('Error querying database.');
      
      while ($row = mysqli_fetch_array($result)) {
         $name = $row['Name'];
         $description = $row['Description'];
         $price = $row['Price'];
         echo '<div class="item">';
         echo '<h3>' . $name . '</h3>';
         echo '<p>' . $description . '</p>';
         echo '<h4>' . $price . '</h4>';
         echo '</div>';
      } 
   ?>
</body>
</html>
