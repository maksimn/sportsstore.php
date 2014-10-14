<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width" />
   <link href="content/admin.css" rel="stylesheet" type="text/css" />
   <title></title>
</head>
<body>
<?php
   require_once('classes/Product.php');
   $productID = $_GET['id'];
   $prod = get_product($productID);
?>
   <h1>Edit <?php echo $prod->name; ?></h1>
   <form method="POST" action="edit.php">
      <label for="ProductID">ProductID</label><br />
      <input type="text" name="ProductID" value="<?php echo $prod->productID; ?>" /><br />
      <label for="Name">Name</label><br />
      <input type="text" name="Name" value="<?php echo $prod->name; ?>"/><br />
      <label for="Description">Description</label><br />
      <input type="text" name="Description" value="<?php echo $prod->description; ?>" /><br />
      <label for="Price">Price</label><br />
      <input type="text" name="Price" value="$<?php echo $prod->price; ?>" /><br />
      <label for="Category">Category</label><br />
      <input type="text" name="Category" value="<?php echo $prod->category; ?>" /><br />
      <input type="submit" value="Save"/>
   </form>
   <a href="admin.php">Cancel and return to list.</a>
</body>
</html>
