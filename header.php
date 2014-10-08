<!DOCTYPE HTML>
<html>
<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width" />
   <title>Sports Store</title>
   <link href="content/site.css" type="text/css" rel="stylesheet" />
</head>
<body>
   <div id="header">
      <div class="title">SPORTS STORE</div>
   </div>
   <div id="categories">
      <a href="list.php">Home</a><br />
      <?php
         require_once("classes/NavigationMenu.php");
         $navMenu = new NavigationMenu();
         $catlist = $navMenu->get_categories();
         $selectedcategory = isset($_GET['category']) ? $_GET['category'] : NULL;
         foreach($catlist as $cat) {
            echo $cat == $selectedcategory ?
            '<a class="selected" href="list.php?category='.$cat.'&page=1">'.$cat.'</a><br />':
            '<a href="list.php?category='. $cat .'&page=1">' . $cat . '</a><br />';
         }
      ?>
   </div>
   <div id="content">

