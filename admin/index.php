<?php 
session_start();

if(!isset($_SESSION['role'])){
	header('LOCATION: ../index.php');	
}
if( isset($_SESSION['role']) ){
	if($_SESSION['role'] !== 'admin'){
		header('LOCATION: ../index.php');
	}
}

?>
<?php include "includes/admin_header.php";?>

	<?php include "includes/admin_navigation.php";?>

    <?php include "includes/admin_page_content.php";?>

<?php include "includes/admin_footer.php";?>