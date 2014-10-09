<?php
   require_once('../classes/Cart.php');
   function can_add_new_lines() {
      $pr1 = new Product();
      $pr1->productID = 1;
      $pr1->name = "P1";
      $pr2 = new Product();
      $pr2->productID = 2;
      $pr2->name = "P2";
      $target = new Cart();
      $target->add_item($pr1, 1);
      $target->add_item($pr2, 1);
      $target->add_item($pr2, 1);
      $results = $target->lines();
      echo 'can_add_new_lines() Test 1: ' . (count($results) == 2 ? 'passed' : 'not passed'); echo '<br/>';
      echo 'can_add_new_lines() Test 2: ' . ($results[0]->product->productID == 1 ? 'passed' : 'not passed'); echo '<br/>';
      echo 'can_add_new_lines() Test 3: ' . ($results[1]->quantity == 2 ? 'passed' : 'not passed'); echo '<br/>';
      foreach ($target->lines() as $line) {
         echo $line->product->name . ' ' . $line->quantity; echo ' <br/>';
      }      
   }
   can_add_new_lines();
   function can_remove_line() {
      $pr1 = new Product(); $pr1->productID = 1; $pr1->name = "P1";
      $pr2 = new Product(); $pr2->productID = 2; $pr2->name = "P2";
      $pr3 = new Product(); $pr3->productID = 3; $pr3->name = "P3";
      $target = new Cart();
      $target->add_item($pr1, 1);
      $target->add_item($pr2, 3);
      $target->add_item($pr3, 5);
      $target->add_item($pr2, 1);
      $target->remove_line($pr2);
      $qty_of_pr2 = 0;
      foreach ($target->lines() as $line) {
         if($line->product->productID == 2) {
            $qty_of_pr2 = $qty_of_pr2 + $line->quantity;
         }
      }
      echo 'can_remove_line() Test 1: ' . ($qty_of_pr2 == 0 ? 'passed' : 'not passed'); echo '<br/>';
      echo 'can_remove_line() Test 2: ' . (count($target->lines()) == 2 ? 'passed' : 'not passed'); echo '<br/>';    
      foreach ($target->lines() as $line) {
         echo $line->product->name . ' ' . $line->quantity; echo ' <br/>';
      }      
   }
   can_remove_line();
?>
