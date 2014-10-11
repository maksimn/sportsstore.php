<?php
   class Product {
      public $productID;
      public $name;
      public $category;
      public $description;
      public $price;
   }
   function get_product($id) {
      require_once('data/connectionvars.php');
      $query = "SELECT * FROM Products WHERE ProductID = " . $id;
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
      $sql_query_result = mysqli_query($dbc, $query);
      mysqli_close($dbc);
      $row = mysqli_fetch_array($sql_query_result);
      $product = new Product();
      $product->productID = $row['ProductID'];
      $product->name = $row['Name'];
      $product->category = $row['Category'];
      $product->description = $row['Description'];
      $product->price = $row['Price'];
      return $product;
   }
?>
