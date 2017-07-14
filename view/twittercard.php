<?php
// VALIDATED FORM
if( !empty( $_POST['btn_save']) ){
	update_option( "eewee_twittercard_val_enabled", $_POST['f_enabled'] );
	update_option( "eewee_twittercard_val_method", $_POST['f_method'] );
	update_option( "eewee_twittercard_val_site", $_POST['f_site'] );
	update_option( "eewee_twittercard_val_creator", $_POST['f_creator'] );
}
?>

    
<?php 
// FORM
$f = new form_add_twitterCard();
$f->getForm();
?>