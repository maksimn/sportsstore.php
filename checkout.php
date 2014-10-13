<?php
   require_once("header.php");
   require_once("classes/ShippingDetails.php");
   require_once("classes/Cart.php");
   if(isset($_POST['submit'])) { // В случае POST-запроса к этому сценарию
      session_start();
      $cart = $_SESSION['cart'];
      if(count($cart->lines()) == 0) {
         echo 'Sorry, your cart is empty!';
      }
      else {
         require_once("classes/EmailOrderProcessor.php");
         $emailorderprocessor = new EmailOrderProcessor();
         $emailorderprocessor->process_order();
      }
   }
   else {
?>
<h2>Check out now</h2>
Please enter your details, and we'll ship your goods right away?
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <h3>Ship to</h3>
   <div>Name:<input type="text" name="name"/></div>
   <h3>Address:</h3>
   <div>Line 1: <input type="text" name="line1"/></div>
   <div>Line 2: <input type="text" name="line2"/></div>
   <div>Line 3: <input type="text" name="line3"/></div>
   <div>City: <input type="text" name="city"/></div>
   <div>State: <input type="text" name="state"/></div>
   <div>Zip: <input type="text" name="zip"/></div>
   <div>Country:<input type="text" name="country"/></div>
   <h3>Options</h3>
   <label>
      <input type="checkbox" name="giftwrap" />
      Gift wrap for this items
   </label>
   <p align="center">
      <input class="actionButtons" type="submit" name="submit" value="Complete order" />
   </p>
</form>
<?php
   }
   require_once("footer.php");
?>
