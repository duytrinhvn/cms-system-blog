
<?php
    include_once 'includes/admin_header.php';
    include_once 'includes/admin_navigation.php';
?>

<div id="page-wrapper">

    <div class="container-fluid">
        <h1 class="page-header">
            Profile Page
        </h1>

        <!-- Page Heading -->
        <div class="row">
            <?php 
            if(isset($_GET['u_edit']) && $_GET['u_edit']=='role'){
                $edit_field = $_GET['u_edit'];
                echo "Please insert new ".$edit_field.": ";
                echo "<form action='' method='post'>";
                echo "<select name='role'>";
                echo "<option value='admin'>Admin</option>";
                echo "<option value='user'>User</option>";
                echo "</select>";
                echo "<input type='submit' name='submit-role' value='Submit'>";
                echo "</form>";
            }
            elseif(isset($_GET['u_edit']) && $_GET['u_edit']=='password'){
                $edit_field = $_GET['u_edit'];
                echo "Please insert new ".$edit_field.": ";
                echo "<form action='' method='post'>";
                echo "<input type='password' placeholder='New {$edit_field}' name='{$edit_field}'>";
                echo "<input type='submit' name='submit-{$edit_field}' value='Submit'>";
                echo "</form>";                
            }
            elseif (isset($_GET['u_edit']) && $_GET['u_edit']!=='password' && $_GET['u_edit']!=='role') {
                $edit_field = $_GET['u_edit'];
                echo "Please insert new ".$edit_field.": ";
                echo "<form action='' method='post'>";
                echo "<input type='text' placeholder='New {$edit_field}' name='{$edit_field}'>";
                echo "<input type='submit' name='submit-{$edit_field}' value='Submit'>";
                echo "</form>";
            }

            if(isset($_POST['submit-role'])){
                $result_update_role =update_function('users', 'user_role', 'user_id', $_SESSION['id'], $_POST['role'], 'profile.php');
                query_result_check($result_update_role);
            }
            if(isset($_POST['submit-password'])){
                $result_update_password =update_function('users', 'user_password', 'user_id', $_SESSION['id'], $_POST['password'], 'profile.php');
                query_result_check($result_update_password);
            }
            if(isset($_POST['submit-firstname'])){
                $result_update_firstname =update_function('users', 'user_firstname', 'user_id', $_SESSION['id'], $_POST['firstname'], 'edit_profile.php');
                query_result_check($result_update_firstname);
            }
            if(isset($_POST['submit-lastname'])){
                $result_update_lastname =update_function('users', 'user_lastname', 'user_id', $_SESSION['id'], $_POST['lastname'], 'profile.php');
                query_result_check($result_update_lastname);
            }
            if(isset($_POST['submit-email'])){
                $result_update_email =update_function('users', 'user_email', 'user_id', $_SESSION['id'], $_POST['email'], 'profile.php');
                query_result_check($result_update_email);
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

