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
<body>
<div class="container">
<header class="row">
    <hr align="left" width="100%">
</header>
</div>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="kitchen.php">Kitchen Page</a>
    </div>
    
  </div>
</div>

</br>
<div class="container">
  <div class="jumbotron" style="background-image: url(img/injr.jpg); background-size: 150% 150%;">
     <p align="right"><b>Your food will get ready soon!<b></p>
  </div>

		<form action="order.php" method="POST">
        <?php
            			
			$db_host = 'sql313.byethost18.com';
			$db_user = 'b18_18606889';
			$db_pwd = 'mesi1616';
			$database = 'b18_18606889_oms_db';

            if (!mysql_connect($db_host, $db_user, $db_pwd))
                die("Can't connect to database");

            if (!mysql_select_db($database))
                die("Can't select database");

            // sending query
            $result = mysql_query("SELECT o.order_id ,  m.menu_item_id as ID,m.menu_item_name as NAME ,o.table_number, o.quantity, o.comment FROM `b18_18606889_oms_db`.`order` o  join `b18_18606889_oms_db`.`Menu` m  on m.menu_item_id=o.menu_item_id WHERE o.is_complete=FALSE ORDER BY o.order_time DESC");
            if (!$result) {
                die("Query to show fields from table failed");
            }

            $fields_num = mysql_num_fields($result);
        echo "<table class='table table-striped table-hover table-bordered'><tr class='info'>";
        // printing table headers
        for($i=0; $i<$fields_num; $i++)
        {
            $field = mysql_fetch_field($result);
            echo "<th>{$field->name}</th>";
        }
        echo "<th></th></tr>\n";
        // printing table rows
        while($row = mysql_fetch_row($result))
        {
            echo "<tr>";
            // $row is array... foreach( .. ) puts every element
            // of $row to $cell variable
            foreach($row as $cell)
                echo "<td>$cell</td>";
             $id = $row[0];
             echo "<td> <button name='$id' id='$id' type='button' class='btn btn-primary disabled'>Complete</button></td";
			 
			 
            echo "</tr>\n";
        }
        mysql_free_result($result);
        ?>
		</form>

    </div>
</div>

</div> <!--close container>
<!-- javascript -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
