<?php
   require_once('data/connectionvars.php');
   class NavigationMenu {
      private $sql_query_result;
      private $category_list;
      public function __construct() {
         $this->prepare_categories();
      }
      public function prepare_categories() {
         $query = "SELECT DISTINCT Category FROM Products";
         $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
         $this->sql_query_result = mysqli_query($dbc, $query);
         mysqli_close($dbc);
      }
      public function get_categories() {
         $this->category_list = array();
         while ($row = mysqli_fetch_array($this->sql_query_result)) {
            array_push($this->category_list, $row['Category']);         
         }
         return $this->category_list;
      }
   }
?>
