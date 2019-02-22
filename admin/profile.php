<?php
	include_once 'includes/admin_header.php';
	include_once 'includes/admin_navigation.php';
?>

<div id="page-wrapper">

    <div class="container-fluid">
		<h1 class="page-header">
            Profile Page
        </h1>

        <?php 
        $result_select_row = select_elements('users', 'user_id', $_SESSION['id']);
        $row = mysqli_fetch_assoc($result_select_row);
        $role = $row['user_role'];
        $firstname = $row['user_firstname'];
        $lastname = $row['user_lastname'];
        $email = $row['user_email'];
        ?>
        <!-- Page Heading -->
        <div class="row">
            <p><span class='breakLine'>Username: </span><?php echo $_SESSION['username']; ?></p>
            <p><span class='breakLine'>Role: </span><?php echo $role; ?><a class="margin-left-adjust" href='edit_profile.php?u_edit=role'>Edit</a></p>
            <p><span class='breakLine'>Firstname: </span><?php echo $firstname; ?><a class="margin-left-adjust" href='edit_profile.php?u_edit=firstname'>Edit</a></p>
            <p><span class='breakLine'>Lastname: </span><?php echo $lastname; ?><a class="margin-left-adjust" href='edit_profile.php?u_edit=lastname'>Edit</a></p>
            <p><span class='breakLine'>Email: </span><?php echo $email; ?><a class="margin-left-adjust" href='edit_profile.php?u_edit=email'>Edit</a></p>
            <p><span class='breakLine'>Password: </span>*******<a class="margin-left-adjust" href='edit_profile.php?u_edit=password'>Edit</a></p>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php
	include_once 'includes/admin_footer.php';
?>
