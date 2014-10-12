<?php
   require_once("header.php");
   require_once("classes/ShippingDetails.php");
?>
<h2>Check out now</h2>
Please enter your details, and we'll ship your goods right away?
<form method="GET" action="">
   <h3>Ship to</h3>
   <div>Name:<input type="text" name="name"/></div>
   <h3>Address:</h3>
   <div>Line 1: <input type="text" name="line1"/></div>
   <div>Line 2: <input type="text" name="line2"/></div>
   <div>Line 3: <input type="text" name="line3"/></div>
   <div>City: <input type="text" name="city"/></div>
   <div>State: <input type="text" name="state"/></div>
</form>
<?php
   require_once("footer.php");
?>
