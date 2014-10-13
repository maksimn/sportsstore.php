<?php
   require_once('classes/ProductRepository.php');
   $productRepository = new ProductRepository();
   $productRepository->extract_data_from_db(0, -1);
   $productRepository->show_extracted_data_for_admin();
?>
