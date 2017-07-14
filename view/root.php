<?php
// page de mise à jour 
if( $_GET['type'] == "edit" ){
	include(EEWEE_TWITTERCARD_PLUGIN_DIR.'/view/edit.php');
	
// page classique
}else{
	include(EEWEE_TWITTERCARD_PLUGIN_DIR.'/view/twittercard.php');

}
?>