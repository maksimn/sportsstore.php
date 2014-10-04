<?php
   require_once("connectionvars.php");
   class PagingInfo {
      public $items_per_page;
      public $total_items;
      public $current_page;
      public $total_pages;
      public function __construct() {
         $this->items_per_page = 4;
         $this->set_current_page();
         $this->set_total_items();
         $this->set_total_pages();
      }
      public function set_current_page() {
         $this->current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      }
      public function set_total_items() {
         $dbc2 = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
         $query2 = 'SELECT COUNT(*) AS num_products FROM Products';
         $result2 = mysqli_query($dbc2, $query2);
         $row2 = mysqli_fetch_array($result2);
         mysqli_close($dbc2);
         $this->total_items = $row2['num_products'];
      }
      public function set_total_pages() {
         $this->total_pages = ceil($this->total_items / $this->items_per_page);
      }
   }
?>
