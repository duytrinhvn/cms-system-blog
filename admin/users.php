    <?php
	include_once 'includes/admin_header.php';
	include_once 'includes/admin_navigation.php';
?>

<div id="page-wrapper">
    <div class="container-fluid">

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
    			case 'add_user':
    				include 'includes/add_user.php';
    				break;
    			
    			default:
    				include 'includes/view_users.php';
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
