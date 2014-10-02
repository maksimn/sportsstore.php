<!DOCTYPE HTML>
<html>
<head>
   <meta charset="utf-8" />
   <title>List of products</title>
   <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
   <?php
      require_once("connectionvars.php");

      // Задаём параметры разбиения на страницы:
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $pagesize = 4;

      // Извлекаем данные из базы для данной страницы:
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);
      $query = 'SELECT * FROM Products LIMIT ' . (($page - 1)*$pagesize) . ', ' . $pagesize;
      $result = mysqli_query($dbc, $query);
      
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
</body>
</html>
