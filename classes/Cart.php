<?php
   class CartLine {
      public $product;
      public $quantity;
   }
 
   class Cart {
      private $linecollection = array();
      public function add_item($product, $quantity) {
         // Проверка, имеется ли добавляемый товар уже в $linecollection
         // если да, то добавить $quantity к уже имеющемуся количеству этого товара
         // если нет, то добавить новую пару "ключ-значение" в массив
         if($linecollection[$product] == NULL) {
            array_push($linecollection, $product => $quantity);
         } 
         else {
            $linecollection[$product] += $quantity;
         }
      }
   }
?>
