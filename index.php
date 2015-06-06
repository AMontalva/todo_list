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
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="form">
		<h1>To Do List</h1>
		<form action="add_todolist_item.php" method="POST">
			<input type="text" name="name" placeholder="Name">
			<br><br>
			<textarea name="description" id="" placeholder="Description"></textarea>
			<br><br>
			<button type="submit" name="submit">Submit</button>
		</form>
		<h2>User List</h2>
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
		<h2>Task Item List</h2>
		<?php
		// 2. Perform database query, assemble query, concatenate, easier to read
		$query  = "SELECT * ";
		$query .= "FROM todolist_item";
		$result = $database->query($query);//send connection, and query, result is resource of database rows
		$database->confirm_query($result);
		?>
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
	</div>
</body>
</html>