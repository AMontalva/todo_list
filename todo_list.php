<?php 

require("database.php");

class todolist_item {
	// name
	// description
	private $name;
	private $description;

	public function add_todolist_item($name_post, $description_post) {
		global $database;
		$query = "INSERT INTO todolist_item (";
		$query .= " name, description";
		$query .= ") VALUES (";
		$query .= " '{$name_post}', '{$description_post}'";
		$query .= ")";
		// $result = todolist_item::query($query);
		$database->query($query);
	}
}

?>