<?php
	function add_cat(){
		global $connection;
		if( isset($_POST['submit']) ){
			$cat_title_post = $_POST['cat_title'];
			if( $cat_title_post="" || empty($cat_title_post) ){
				echo htmlspecialchars('New category cannot be empty!');
			}

			else {
				$query_add_cat="INSERT INTO categories(cat_id, cat_title) VALUES (NULL, '{$_POST['cat_title']}') ";
				$result_add_cat= mysqli_query($connection, $query_add_cat);

				if(!$result_add_cat) {
					die( "<h1>" . mysqli_error($connection) . "</h1>" );
				}
			} 
		}
	}
	function query_result_check($result){
		global $connection;
		if(!$result){
			die("QUERY FAILED: ".mysqli_error($connection));
		}
	}

	function select_all($table_name){
		global $connection;
		$query_select = "SELECT * FROM {$table_name}";
		$result_select = mysqli_query($connection, $query_select);
		query_result_check($result_select);
		return $result_select;
	}

	function select_elements($table_name, $field_name, $id){
		global $connection;
		$query_select_elements = "SELECT * FROM $table_name WHERE $field_name = {$id}";
		$result_select_elements = mysqli_query($connection, $query_select_elements);
		query_result_check($result_select_elements);
		return $result_select_elements;
	}

	function select_elements_and($table_name, $first_field_name, $first_id, $second_field_name, $second_id){
		global $connection;
		$query_select_elements = "SELECT * FROM $table_name WHERE `$first_field_name` = {$first_id} AND $second_field_name = '{$second_id}' ORDER BY  ";
		$result_select_elements = mysqli_query($connection, $query_select_elements);
		query_result_check($result_select_elements);
		return $result_select_elements;
	}

	function find_all_cat(){
		global $connection;
		$query_select_cat = "SELECT * FROM categories";
		$result_select_cat = mysqli_query($connection, $query_select_cat);

		while( $row = mysqli_fetch_assoc($result_select_cat) ){
			$str = <<<EOD
				<tr>
					<td> {$row['cat_id']} </td>
					<td> {$row['cat_title']} </td>
					<td> <a href="categories.php?delete={$row['cat_id']}">Delete</a> </td>
					<td> <a href="categories.php?edit={$row['cat_id']}">Edit</a> </td>
				</tr>
EOD;
			echo $str;
		}
	}

	function delete_function($table_name, $field_name, $delete_id, $page_name){
		global $connection;
		$query_delete = "DELETE FROM `{$table_name}` WHERE {$field_name} = {$delete_id}";
		$result_delete = mysqli_query($connection, $query_delete);
		query_result_check($result_delete);
		header("LOCATION: {$page_name}");
	}

	function update_function($table_name, $field_name, $row_id, $update_id, $value, $page_name){
		global $connection;
		$query_update = "UPDATE `{$table_name}` SET `{$field_name}` = '{$value}' WHERE `{$row_id}`= {$update_id}";
		$result_update = mysqli_query($connection, $query_update);
		query_result_check($result_update);
		header("LOCATION: {$page_name}");
	}
?>