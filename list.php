<?php
   require_once("header.php");
   require_once("classes/ProductListViewModel.php");
   require_once("classes/HtmlHelper.php");

   $paginginfo = new PagingInfo();
   $productListViewModel = new ProductListViewModel(new ProductRepository(), $paginginfo);
   $productListViewModel->show();
?>
<div class="pager">
<?php // Отображение ссылок на страницы:
   $htmlhelper = new HtmlHelper();
   $htmlhelper->show_page_links($paginginfo, $_SERVER['PHP_SELF']);
?>
</div>
<?php
   require_once("footer.php");
?>
