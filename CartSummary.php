<div id="cart">
   <span class="caption">
      <b>Your cart:</b>
      <?php
         require_once('classes/Cart.php');
         session_start();
         $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
         if(isset($cart)) {
            $quantity = 0;
            foreach($cart->lines() as $line) {
               $quantity = $quantity + $line->quantity;
            }
            echo $quantity . ' item(s), ';
            echo '$'. $cart->compute_total_price();
         }
         else {
            echo '0 items';
         }         
      ?>
   </span>
   <a href="cart.php">
      Checkout
   </a>
</div>
