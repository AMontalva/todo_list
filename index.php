<?php 
require("database.php");
$database = new Database();

// 2. Perform database query, assemble query, concatenate, easier to read
$query  = "SELECT * ";
$query .= "FROM user";
$result = $database->query($query);//send connection, and query, result is resource of database rows
$database->confirm_query($result);

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>To Do List</title>
</head>
<body>
	<h1>To Do List</h1>
	<form action="add_todolist_item.php" method="POST">
		<input type="text" name="name" placeholder="Name">
		<br><br>
		<textarea name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>
		<br><br>
		<input type="submit" name="submit">
	</form>
  	<ul>
		<?php
		// 3. Use returned data (if any)
		while($subject = $database->fetch_assoc($result)) {
		// output data from each row

	    ?>
            <li><?php echo $subject["name"] . " (" . 
            $subject["id"] . ")"; ?></li>
          
   		<?php
           }
      	?>
	</ul>
</body>
</html>