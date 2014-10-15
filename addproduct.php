<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width" />
   <link href="content/admin.css" rel="stylesheet" type="text/css" />
   <title></title>
</head>
<body>
   <?php
      if(isset($_POST['submit'])) {
         if(isset($_POST['Name']) && isset($_POST['Description']) && isset($_POST['Price']) && isset($_POST['Category'])) {
            require_once("classes/ProductRepository.php");
            $productRepository = new ProductRepository();
            $productRepository->add_product($_POST['Name'], $_POST['Description'], $_POST['Price'], $_POST['Category']);
         } else {
            echo '<h3 style="color:red;">Задайте значения всех полей формы.</h3><br />';
         }
      }
   ?>
   <h1>Add a new product</h1>
   <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <label class="text-box editor-label" for="Name">Name</label><br />
      <input class="text-box editor-field" type="text" name="Name"/><br />
      <label class="text-box editor-label" for="Description">Description</label><br />
      <textarea class="text-box multi-line" id="Description" name="Description"></textarea><br />
      <label class="text-box editor-label" for="Price">Price, $</label><br />
      <input class="text-box editor-field" type="text" name="Price"/><br />
      <label class="text-box editor-label" for="Category">Category</label><br />
      <input class="text-box editor-field" type="text" name="Category"/><br />
      <input type="submit" name="submit" value="Add"/>
   </form>
   <p><a href="admin.php">Back to admin page</a></p> 
</body>
</html>
