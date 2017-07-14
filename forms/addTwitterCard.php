<?php
class form_add_twitterCard{
	
	function __construct(){}
	
	/**
	 *	Render form
	 */
	function getForm(){
		?>		
		<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
			
                    <?php
                            $enabled = get_option( "eewee_twittercard_val_enabled" );
                            $enabledChecked = "";
                            if( $enabled == "on" ){
                                    $enabledChecked = "checked";
                            }

                            $method = get_option( "eewee_twittercard_val_method" );
                            $methodCheckedTW = $methodCheckedTWOG = "";
                            if( $method == "tw" ){
                                    $methodCheckedTW = "checked";
                            }else{
                                    $methodCheckedTWOG = "checked";
                            }
                    ?>                            

                    <div id="poststuff">
                        <div id="post-body" class="metabox-holder columns-2">

                            <div id="post-body-content">

                                <div id="eeweeTwitterCarddiv" class="stuffbox">
                                    <h3><label for="link_name">Twitter Card</label></h3>
                                    <div class="inside">
                                        
                                        <table class="links-table" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                        <th scope="row"><label for='f-enabled'><?php _e('Enabled', 'eeweeTwitterCard') ?></label></th>
                                                        <td><input type='checkbox' id='f-enabled' name='f_enabled' <?php echo $enabledChecked; ?> /></td>
                                                </tr>
                                                <tr>
                                                        <th scope="row"><label for="f-method"><?php _e('Method used', 'eeweeTwitterCard') ?></label></th>
                                                        <td>
                                                            <input type='radio' id='f-method-tw' name='f_method' value='tw' <?php echo $methodCheckedTW; ?> /> <label for='f-method-tw'>Twitter Card</label>
                                                            <input type='radio' id='f-method-twog' name='f_method' value='twog' <?php echo $methodCheckedTWOG; ?> /> <label for='f-method-twog'>Twitter Card and Open Graph</label>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th scope="row"><label for="f-site"><?php _e('Site', 'eeweeTwitterCard') ?></label></th>
                                                        <td>
                                                            <input type='text' id='f-site' name='f_site' value='<?php form_option( "eewee_twittercard_val_site" ); ?>' />
                                                            <p class="description">(ex: nytimes)</p>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th scope="row"><label for="f-creator"><?php _e('Creator', 'eeweeTwitterCard') ?></label></th>
                                                        <td>
                                                            <input type='text' id='f-creator' name='f_creator' value='<?php form_option( "eewee_twittercard_val_creator" ); ?>' /> 
                                                            <p class="description">(ex: SarahMaslinNir)</p>
                                                        </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div><!-- /post-body-content -->


                            <div id="postbox-container-1" class="postbox-container">
                                <div id="side-sortables" class="meta-box-sortables ui-sortable">
                                    <div id="linksubmitdiv" class="postbox ">
                                        <div class="handlediv" title="Cliquer pour inverser."><br></div>
                                        <h3 class="hndle"><span>Enregistrer</span></h3>
                                        <div class="inside">
                                            <div class="submitbox" id="submitlink">

                                                <div id="major-publishing-actions">
                                                    <div id="publishing-action">
                                                        <input type="submit" name="btn_save" id="submit" class="button-primary" value="<?php _e('Update', 'eeweeTwitterCard') ?>" />    
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- postbox-container-1 -->

                        </div><!-- post-body -->
                    </div><!-- poststuff -->
                            
		</form>
		<?php
	}
	
}