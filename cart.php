<?php
   require_once('header.php');
   require_once('classes/Product.php');
   require_once('classes/Cart.php');
   // 1. Извлечь из БД товар с данным id
   $prod = get_product($_GET['id']);
   // 2. Добавить товар в корзину
   session_start();
   $cart = null;
   if($_SESSION['cart'] != NULL) {
      $cart = $_SESSION['cart'];
   }
   else {
      $cart = new Cart();
      $_SESSION['cart'] = $cart;
   }
   $cart->add_item($prod, 1);
   $returnUrl = $_GET['returnUrl'];
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
