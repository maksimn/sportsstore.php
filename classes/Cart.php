<?php
   require_once('Product.php');
   class CartLine {
      public $product;
      public $quantity;
      public function __construct($prod, $qty) {
         $this->product = $prod;
         $this->quantity = $qty;
      }
   }
   // Корзина с товарами для покупки:
   class Cart {
      private $linecollection = array(); // массив, содержащий объекты CartLine.
      public function add_item($product, $quantity) {
         // Проверка, имеется ли добавляемый товар уже в $linecollection
         // если да, то добавить $quantity к уже имеющемуся количеству этого товара
         // если нет, то добавить новую пару "ключ-значение" в массив
         $is_in_linecollection = false;
         foreach($this->linecollection as $line) {
            if($line->product->productID == $product->productID) {
                $is_in_linecollection = true;
                $line->quantity = $line->quantity + $quantity; 
            }  
         }
         if(!$is_in_linecollection) {
             array_push($this->linecollection, new CartLine($product, $quantity));
         }
      }
      public function remove_line($product) {
         for($i = 0, $n = count($this->linecollection); $i < $n; $i++) {
            if($this->linecollection[$i]->product->productID == $product->productID) {
               unset($this->linecollection[$i]);
               break;
            }
         }
      }

      public function compute_total_price() {

      }
      public function clear() {

      }
      public function lines() {
         return $this->linecollection;
      }
   }
?>
