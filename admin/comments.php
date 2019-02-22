<?php
	include_once 'includes/admin_header.php';
	include_once 'includes/admin_navigation.php';
?>

<div id="page-wrapper">
    <div class="container-fluid">
		<h1 class="page-header">
            Comments Page
        </h1>

        <!-- Page Heading -->
        <div class="row">
        	<?php 
        	if(isset($_GET['source'])) {
        		$source = $_GET['source'];
        	}
        	else {
        		$source = '';
        	}
    		switch ($source) {
    			case 'add_post':
    				include 'includes/add_comment.php';
    				break;
    			
    			default:
    				include 'includes/view_comments.php';
    				break;
    		}

        	?>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php
	include_once 'includes/admin_footer.php';
?>
