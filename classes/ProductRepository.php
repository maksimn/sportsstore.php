<?php
   require_once('data/connectionvars.php');
   class ProductRepository {
      public $sql_query_result;
      public function extract_data_from_db($beg, $num, $category) {
         $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
         $query;
         if($category == NULL) {
            $query = 'SELECT * FROM Products LIMIT ' . $beg . ', ' . $num;
         }
         else {
            $query = 'SELECT * FROM Products WHERE Category = "'. $category .  
                     '" LIMIT ' . $beg . ', ' . $num;
         }
         $this->sql_query_result = mysqli_query($dbc, $query);
         mysqli_close($dbc);
      }
      public function show_extracted_data_on_this_page() {
         while ($row = mysqli_fetch_array($this->sql_query_result)) {
            $name = $row['Name'];
            $description = $row['Description'];
            $price = $row['Price'];
?>
         <div class="item">
            <h3><?php echo $name; ?></h3>
            <p><?php echo $description; ?></p>
            <h4><?php echo $price; ?></h4>
         </div>
<?php 
         } 
      }
   }
?>
