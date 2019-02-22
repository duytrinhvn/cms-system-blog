<?php 
$query_edit_cat = "SELECT * FROM categories WHERE cat_id = $cat_id ";
$result_edit_cat = mysqli_query($connection, $query_edit_cat);
while( $row = mysqli_fetch_assoc($result_edit_cat) ){
	$cat_title = $row['cat_title'];
?>
<form action="" method="post">
	<div class="form_group">
		<label for="cat_edit">Edit Category</label>
		<input placeholder="<?php if(isset($cat_title)) echo $cat_title; ?>" type="text" name="cat_title_new" class="form-control">
	</div>
	<br>
	<div class="form_group">
		<input type="submit" name="submit_edit" value="Edit Category" class="btn btn-primary">
	</div>
</form>   
<?php } ?>

<?php
if( isset($_POST['submit_edit']) ){
	$cat_title_new = $_POST['cat_title_new'];

	$query_edit_cat="UPDATE categories SET cat_title = '{$cat_title_new}' WHERE cat_id = {$cat_id}";
	$result_edit_cat=mysqli_query($connection, $query_edit_cat);
}
?>