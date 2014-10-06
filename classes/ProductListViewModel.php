<?php
   require_once("classes/ProductRepository.php");
   require_once("classes/PagingInfo.php");
   // Модель-представление списка товаров:
   class ProductListViewModel {
      public $products;
      public $paginginfo;
      public $currentcategory;
      public function __construct($products, $paginginfo) {
         $this->products = $products;
         $this->paginginfo = $paginginfo;
      }
      public function show() {
         $start = ($this->paginginfo->current_page - 1)*$this->paginginfo->items_per_page;
         $this->products->extract_data_from_db($start, $this->paginginfo->items_per_page);
         $this->products->show_extracted_data_on_this_page(); 
      }
   }
?>
