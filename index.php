<?php include 'config.php'; ?>
<?php include 'admin/header.php'; ?>
<?php 
    if( is_user_logged_in() ) {
        // show admin dashboard
        include 'admin/admin.php';
        include 'admin/footer.php';
    }else{
        // show Login Form
        include 'login.php';
    } // END user logged in validation ?>