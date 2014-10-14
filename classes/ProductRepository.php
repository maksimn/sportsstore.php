<?php
   require_once('data/connectionvars.php');
   class ProductRepository {
      public $sql_query_result;
      public function extract_data_from_db($beg, $num, $category) {
         $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
         $query;
         if($category == NULL && ($beg != 0 && $num != -1)) {
            $query = 'SELECT * FROM Products LIMIT ' . $beg . ', ' . $num;
         } 
         else if ($category == NULL && ($beg == 0 && $num == -1)) {
            $query = 'SELECT * FROM Products';
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
            $productID = $row['ProductID'];
            $name = $row['Name'];
            $description = $row['Description'];
            $price = $row['Price'];
?>
         <div class="item">
            <h3><?php echo $name; ?></h3>
            <p><?php echo $description; ?></p>
            <form method="GET" action="cart.php">
               <input type="hidden" name="id" value="<?php echo $productID; ?>"/>
               <input type="hidden" name="returnUrl" 
                  value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
               <input type="submit" value="+ Add to cart"/>
            </form>
            <h4>$<?php echo $price; ?></h4>
         </div>
<?php 
         } 
      }
      public function show_extracted_data_for_admin() {
?>
         <h1>All Products</h1>
         <table class="Grid">
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th class="NumericCol">Price</th>
            <th>Actions</th>
         </tr>
<?php
         while ($row = mysqli_fetch_array($this->sql_query_result)) {
            $productID = $row['ProductID'];
            $name = $row['Name'];
            $description = $row['Description'];
            $price = $row['Price'];
            $category = $row['Category'];
?>
            <tr>
               <td><?php echo $productID; ?></td>
               <td><a href="edit.php?id=<?php echo $productID; ?>"><?php echo $name; ?></a></td>
               <td class="NumericCol"><?php echo '$' . $price; ?></td>
               <td>
                  <form method="POST" action="edit.php">
                     <input type="hidden" name="id" value="<?php echo $productID; ?>" />
                     <input type="submit" value="Delete" />
                  </form>
               </td>
            </tr>
<?php
         }
?>
      </table>
      <p><a href="edit.php">Add a new product</a></p> 
<?php
      }
   }
?>
