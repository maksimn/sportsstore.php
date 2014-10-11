<?php
   require_once('header.php');
   require_once('classes/Product.php');
   require_once('classes/Cart.php');
   session_start();
   $returnUrl = null;
   $cart = null;
   if(isset($_POST['productID'])) { // В случае POST-запроса
      $cart = $_SESSION['cart'];
      $id = $_POST['productID'];
      $prod = new Product(); 
      $prod->productID = $id;
      $cart->remove_line($prod);
      $returnUrl = $_POST['returnUrl'];
   }
   if(isset($_GET['id'])) { // В случае GET-запроса
      // 1. Извлечь из БД товар с данным id
      $prod = get_product($_GET['id']);
      // 2. Добавить товар в корзину   
      if($_SESSION['cart'] != NULL) {
         $cart = $_SESSION['cart'];
      }
      else {
         $cart = new Cart();
         $_SESSION['cart'] = $cart;
      }
      $cart->add_item($prod, 1);
      $returnUrl = $_GET['returnUrl'];
   }
   // 3. Представление корзины
?>
<h2>Your cart</h2>
<table width="90%" align="center">
   <thead><tr>
      <th align="center">Quantity</th>
      <th align="left">Item</th>
      <th align="right">Price</th>
      <th align="right">Subtotal</th>
   </tr></thead>
   <tbody>
   <?php
      foreach($cart->lines() as $line) {
   ?>
         <tr>
            <td align="center"><?php echo $line->quantity; ?></td>
            <td align="left"><?php echo $line->product->name; ?></td>
            <td align="right"><?php echo '$' . $line->product->price; ?></td>
            <td align="right"><?php echo $line->quantity * $line->product->price; ?></td>
            <td>
               <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <input type="hidden" name="productID" value="<?php echo $line->product->productID; ?>" />
                  <input type="hidden" name="returnUrl" value="<?php echo $returnUrl; ?>" />
                  <input type="submit" class="actionButtons" value="Remove" />
               </form>
            </td>
         </tr>
   <?php
      }
   ?>   
   </tbody>
   <tfoot><tr>
      <td colspan="3" align="right">Total:</td>
      <td align="right"><?php echo $cart->compute_total_price(); ?></td>
   </tr></tfoot>
</table>
<p align="center" class="actionButtons">
   <a href="<?php echo $returnUrl; ?>">Continue shopping</a>
</p>
<?php   
   require_once('footer.php');
?>
