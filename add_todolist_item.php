<?php 

require("todo_list.php");

$todolist_item = new todolist_item();

if (isset($_POST['submit'])) {
    // Process the form

	print_r($_POST);

	$name_post = $_POST["name"];
	$description_post = $_POST["description"];
	$todolist_item->add_todolist_item($name_post, $description_post);

   	redirect_to("index.php");
}
else {
  // This is probably a GET request
    redirect_to("index.php");
} // end: if (isset($_POST['submit']))

?>