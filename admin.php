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
         $productRepository->extract_data_from_db(0, -1, null);
         $productRepository->show_extracted_data_for_admin();
      ?>
</body>
</html>
