<?php
   require_once('Cart.php');
   class EmailOrderProcessor {
      public function process_order() {
         if($_POST['name'] == '') {
            echo 'Please enter a name <br/>';
         }
         if($_POST['line1'] == '') {
            echo 'Please enter the first address line <br />';
         }
         if($_POST['city'] == '') {
            echo 'Please enter a city name <br />';
         }
         if($_POST['state'] == '') {
            echo 'Please enter a state name <br />';
         }
         if($_POST['country'] == '') {
            echo 'Please enter a country name <br />';
         }
         if(($_POST['name'] != '') && ($_POST['line1'] != '') && ($_POST['city'] !='') &&
            ($_POST['state'] != '') && ($_POST['country'] != '')) {
            // Тогда можно обработать заказ
            $to = 'maksim1989sovunion@yandex.ru';
            $email = 'sporsstore.example.com'; 
            $subject = 'A New Order';
            $msg = 'A new order has been submitted<br/>' . '---<br/>' . 'Items:<br/>';
            $cart = $_SESSION['cart'];
            foreach($cart->lines() as $line) {
               $subtotal = $line->product->price * $line->quantity;
               $msg = $msg . $line->quantity . ' x ' . $line->product->name . ', subtotal: $' . 
                      $subtotal . '<br/>';
            }
            $msg = $msg . 'Total order value : $' . $cart->compute_total_price() .  '<br/>---<br/>';
            $msg = $msg . 'Ship to:<br/>' . $_POST['name'] . '<br/>' . $_POST['line1'] . '<br/>' . 
                   $_POST['line2'] . '<br/>' . $_POST['line3'] . '<br/>' . $_POST['city'] . '<br/>' .
                   $_POST['state'] . '<br/>' . $_POST['country'] . '<br/>' . $_POST['zip'] . 
                   '<br/>---<br/>' . 'Gift wrap : ' . ($_POST['giftwrap'] ? 'Yes': 'No') . '<br/>';
            echo ('Email letter send to ' . $to . '<br/>Subject: ' . $subject . '<br/>' . $msg);       
            $cart->clear();
            echo ('<h2>Thanks!</h2>');
            echo ('<p>Thanks for placing your order. We will ship your goods as soon as possible.</p>');     
            //mail($to, $subject, $msg, 'From:' . $email);
         }
      }
   }
?>
