<!DOCTYPE HTML>
<html>
<head>
   <meta charset="utf-8" />
   <title>List of products</title>
</head>
<body>
   <?php
      require_once("classes/PagingInfo.php");
      require_once("classes/ProductRepository.php");
      require_once("classes/HtmlHelper.php");
      
      // Задаём параметры разбиения на страницы:
      $pagingInfo = new PagingInfo();

      // Извлечение и показ списка товаров:
      $productRepository = new ProductRepository();
      $start = ($pagingInfo->current_page - 1)*$pagingInfo->items_per_page; 
      $productRepository->extract_data_from_db($start, $pagingInfo->items_per_page); 
      $productRepository->show_extracted_data_on_this_page(); 
   ?>
   <p>
   <?php // Отображение ссылок на страницы:
      $htmlhelper = new HtmlHelper();
      $htmlhelper->show_page_links($pagingInfo, $_SERVER['PHP_SELF']);
   ?>
   </p>
</body>
</html>
