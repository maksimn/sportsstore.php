<!DOCTYPE HTML>
<html>
<head>
   <meta charset="utf-8" />
   <title>List of products</title>
   <link rel="stylesheet" type="text/css" href="sitestyle.css" />
</head>
<body>
   <?php
      require_once("PagingInfo.php");
      require_once("ProductRepository.php");
      require_once("HtmlHelper.php");
      define('THIS_SCRIPT_NAME', 'productList.php');
      
      // Задаём параметры разбиения на страницы:
      $pagingInfo = new PagingInfo();
      $pagingInfo->set_current_page();
      $pagingInfo->set_total_items();
      $pagingInfo->set_total_pages();

      // Извлечение и показ списка товаров:
      $productRepository = new ProductRepository();
      $productRepository->extract_data_from_db( 
         // начальная позиция извлечения данных из базы
         ($pagingInfo->current_page - 1)*$pagingInfo->items_per_page, 
         $pagingInfo->items_per_page // количество извлекаемых строк
      );
      $productRepository->show_extracted_data_on_this_page(); 
   ?>
   <p>
   <?php
      // Отображение ссылок на страницы:
      $htmlhelper = new HtmlHelper();
      $htmlhelper->set_paginginfo($pagingInfo);
      $htmlhelper->show_page_links(THIS_SCRIPT_NAME);
   ?>
   </p>
</body>
</html>
