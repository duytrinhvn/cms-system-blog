<?php
	include_once 'includes/admin_header.php';
	include_once 'includes/admin_navigation.php';

?>

<div id="page-wrapper">

    <div class="container-fluid">
		<h1 class="page-header">
            Categories Page
        </h1>

        <!-- Page Heading -->
        <div class="row">
			<?php add_cat();?>			<!-- ADD CAT FUNCTION-->
			<!-- Add Category -->
            <div class="col-lg-6">                       
				<form action="" method="post">
					<div class="form_group">
						<label for="cat_title">Add Category</label>
						<input type="text" name="cat_title" class="form-control">
					</div>
					<br>
					<div class="form_group">
						<input type="submit" name="submit" value="Add Category" class="btn btn-primary">
					</div>
				</form>
				<br>
				<?php
				if(isset($_GET['edit'])) {
					$cat_id = $_GET['edit'];
					include 'includes/edit_cat.php';		// EDIT CAT FUNCTION
				}
				?>                  
            </div>

			<!-- Categories Table -->
			<div class="col-lg-6">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Category</th>
						</tr>
					</thead>

					<tbody>
						<?php 
						find_all_cat(); // FIND CAT FUNCTION
						if(isset($_GET['delete'])){
							delete_function('categories', 'cat_id', $_GET['delete'], 'categories.php'); 	// DELETE CAT 
						}
						?>
					</tbody>

				</table>
			</div>


        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php
	include_once 'includes/admin_footer.php';
?>
