<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width" />
   <link href="content/admin.css" rel="stylesheet" type="text/css" />
   <title></title>
</head>
<body>
      <?php
         require_once('classes/ProductRepository.php');
         $productRepository = new ProductRepository();
         // В случае отправки POST-запроса на удаление товара:
         if(isset($_POST['id'])) {
            $productRepository->delete($_POST['id']);
         }
         $productRepository->extract_data_from_db(0, -1, null);
         $productRepository->show_extracted_data_for_admin();
      ?>
   <p><a href="addproduct.php">Add a new product</a></p> 
</body>
</html>
