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
                  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                     <input type="hidden" name="id" value="<?php echo $productID; ?>" />
                     <input type="submit" name="submit" value="Delete" />
                  </form>
               </td>
            </tr>
<?php
         }
?>
      </table>
<?php
      }
      public function add_product($name, $description, $price, $category) {
         $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
         $query = 'INSERT INTO Products (Name, Description, Category, Price) VALUES ("' . 
                  $name . '", "'. $description .'", "' . $category . '", CAST(' . $price .' AS DECIMAL(16, 2)))';
         echo $query . '<br>';
         $sql_query_result = mysqli_query($dbc, $query) or die( 'Wrong db connection<br>');
         if($sql_query_result == FALSE) {
            echo '<p style="color:red;">The product was not added. </p><br/>';
         }
         else {
            echo '<p style="color:blue;">The product was successfully added.</p><br/>';
         }
         mysqli_close($dbc);         
      }
      public function delete($id) {
         $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
         $query = 'DELETE FROM Products WHERE ProductID = ' . $id;
         $sql_query_result = mysqli_query($dbc, $query);
         if($sql_query_result == FALSE) {
            echo 'The product was not removed. <br/>';
         }
         else {
            echo 'The product was successfully removed.<br/>';
         }
         mysqli_close($dbc);         
      }
      public function update($id, $name, $description, $price, $category) {
         $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
         $query = "UPDATE Products SET Name='$name', Description='$description', Price=CAST($price AS DECIMAL(16,2)), Category='$category' WHERE ProductID = $id";
         $sql_query_result = mysqli_query($dbc, $query);
         mysqli_close($dbc);           
         return $sql_query_result;
      }
   }
?>
