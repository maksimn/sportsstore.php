<?php
   require_once("header.php");
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
<div class="pager">
<?php // Отображение ссылок на страницы:
   $htmlhelper = new HtmlHelper();
   $htmlhelper->show_page_links($pagingInfo, $_SERVER['PHP_SELF']);
?>
</div>
<?php
   require_once("footer.php");
?>
