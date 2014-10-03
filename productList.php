<?php
   require_once("connectionvars.php");
   // Нам нужно узнать общее количество товаров в таблице Products:
   function get_total_num_of_products() {
      $dbc2 = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
      $query2 = 'SELECT COUNT(*) AS num_products FROM Products';
      $result2 = mysqli_query($dbc2, $query2);
      $row2 = mysqli_fetch_array($result2);
      mysqli_close($dbc2);
      return $row2['num_products'];
   }
   // Отображение ссылок на страницы от 1 до $n
   function show_references_to_pages($scriptname, $n, $curr_page) {
      for($i = 1; $i <= $n; $i++) {
         if($i == $curr_page) {
            echo '<a class="selected" href="' . $scriptname . '?page=' . $i . '">' . $i . '</a>';
         } 
         else {
            echo '<a href="' . $scriptname . '?page=' . $i . '">' . $i . '</a>';
         }
      }
   }
?>
<!DOCTYPE HTML>
<html>
<head>
   <meta charset="utf-8" />
   <title>List of products</title>
   <link rel="stylesheet" type="text/css" href="sitestyle.css" />
</head>
<body>
   <?php
      define('THIS_SCRIPT_NAME', 'productList.php');
      // Задаём параметры разбиения на страницы:
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $pagesize = 4;
      // Общее количество товаров:
      $total_items = get_total_num_of_products();
      $total_pages = ceil($total_items / $pagesize);

      // Извлекаем данные из базы для данной страницы:
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
      $query = 'SELECT * FROM Products LIMIT ' . (($page - 1)*$pagesize) . ', ' . $pagesize;
      $result = mysqli_query($dbc, $query);
      mysqli_close($dbc);

      // Показываем извлеченную информацию на странице:
      while ($row = mysqli_fetch_array($result)) {
         $name = $row['Name'];
         $description = $row['Description'];
         $price = $row['Price'];
   ?>
         <div class="item">
            <h3><?php echo $name; ?></h3>
            <p><?php echo $description; ?></p>
            <h4><?php echo $price; ?></h4>
         </div>
   <?php 
      } 
   ?>
   <p>
   <?php
      show_references_to_pages(THIS_SCRIPT_NAME, $total_pages, $page);
   ?>
   </p>
</body>
</html>
