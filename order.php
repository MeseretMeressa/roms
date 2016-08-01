<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>MESERT_MEKONNEN_JOINT_WEBSITE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/respond.js"></script>
</head>
<body style="background-color:lightyellow;">
<div class="container">
<header class="row">
    <hr align="left" width="100%">
</header>

<div class="container">
  <div class="jumbotron" style="background-image: url(img/injr.jpg); background-size: 150% 150%;">
  <!--<div style="background:yellow !important" class="jumbotron">-->
     <h1>Confirmation Page </h1>
  </div>
<?php

		$db_host = 'sql313.byethost18.com';
		$db_user = 'b18_18606889';
		$db_pwd = 'mesi1616';
		$database = 'b18_18606889_oms_db';

	 $link = mysqli_connect($db_host, $db_user, $db_pwd,$database);
	 mysqli_set_charset($link, "utf8");
	 error_reporting(E_ALL); 
	 ini_set('display_errors', 1);
	if($link === false){
		die("Can't connect to database");
	}

	 $tableNumber = 0;
	foreach($_POST as $key => $value)
	{
		if($key=='tableNumber')
			$tableNumber=intval($value);
	}
	if($tableNumber==0){
		//die("ERROR: table number missing.");
	}
	//order_id, table_number, menu_item_id, quantity, comment, is_complete, order_time
	foreach($_POST as $key => $value)
	{
		if($key <> 'tableNumber'){
			$menu_item_id = intval($key);
			$quantity = intval($value);
			$datetime = date('Y-m-d H:i:s');
			if($quantity<>0){
			// attempt insert query execution
				$sql = "INSERT INTO  `csci499`.`order` (  `table_number` ,  `menu_item_id` ,  `quantity` ,  `comment` ,  `is_complete` ,  `order_time` )  VALUES ($tableNumber, $menu_item_id, $quantity,'empty comment',FALSE,'$datetime')";
				if(mysqli_query($link, $sql)){
					//echo "Records added successfully.";
				} else{
					echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
					//echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
				}
			}
		}
			
	}
	//write a query to join order table with menu table and fetch price,quantity,menu_item_name 
	// close connection
	mysqli_close($link);
?>

	<div>
		<p>Your order is successfully submitted, enjoy.</p>
		
		<INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);">

              <!--  <form method= "get" action="/index.html">
			<button type="submit">Back to Home Page</button>
		</form> -->
                     

	</div>
</div>
</body>
</html>

