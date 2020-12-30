<?php include 'header.php'; ?>
<?php 
    if( is_user_logged_in() ) {
        // show admin dashboard
        include 'admin.php';
        include 'footer.php';
    }else{
        // show Login Form
        include 'login.php';
    } // END user logged in validation ?>