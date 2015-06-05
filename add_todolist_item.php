<?php 

require("todo_list.php");

$todolist_item = new todolist_item();

if (isset($_POST['submit'])) {
    // Process the form

	print_r($_POST);

	$name_post = $_POST["name"];
	$description_post = $_POST["description"];
	$todolist_item->add_todolist_item($name_post, $description_post);

	// 2. Perform database query, assemble query, concatenate, easier to read
	$query  = "SELECT * ";
	$query .= "FROM todolist_item";
	$result = $database->query($query);//send connection, and query, result is resource of database rows
	$database->confirm_query($result);

	// 3. Use returned data (if any)
	while($subject = $database->fetch_assoc($result)) {
	// output data from each row

    ?>
        <li><?php echo $subject["name"] . " (" . 
        $subject["id"] . ")"; ?></li>
      
		<?php
       }
}
else {
  // This is probably a GET request
    redirect_to("index.php");
} // end: if (isset($_POST['submit']))

?>