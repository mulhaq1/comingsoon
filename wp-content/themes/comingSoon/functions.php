<?php
/**
	* Coming Soon functions and definitions
	*
	* Set up the theme and provides some helper functions, which are used in the
	* theme as custom template tags. Others are attached to action and filter
	* hooks in WordPress to change core functionality.
	*
	* When using a child theme you can override certain functions (those wrapped
	* in a function_exists() call) by defining them first in your child theme's
	* functions.php file. The child theme's functions.php file is included before
	* the parent theme's file, so the child theme functions would be used.
	*
	* @link https://codex.wordpress.org/Theme_Development
	* @link https://codex.wordpress.org/Child_Themes
	*
	* Functions that are not pluggable (not wrapped in function_exists()) are
	* instead attached to a filter or action hook.
	*
	* For more information on hooks, actions, and filters,
	* {@link https://codex.wordpress.org/Plugin_API}
	*
	* @package WordPress
	* @subpackage Coming Soon
	* @since Coming Soon 1.0
*/

/**
* Create a comming soon menu
*/
add_action( 'admin_menu', function(){
    add_menu_page( 'Comming Soon Setting', 'Comming Soon Setting', 'manage_options', 'comming-soon-setting', function(){
            if( isset( $_POST['submit_comming_soon'] ) ){
                $commingSoonSetting  = array(
                    'heading1' => strip_tags( $_POST['heading1'] ),        
                    'heading2' => strip_tags( $_POST['heading2'] ),
                    'bgImage' => strip_tags( $_POST['bgImage'] ),         
                    'logo1' => strip_tags( $_POST['logo1'] ),         
                    'logo1url' => strip_tags( $_POST['logo1url'] ),
                    'logo2' => strip_tags( $_POST['logo2'] ), 
                    'logo2url' => strip_tags( $_POST['logo2url'] ),           
                    'description' => strip_tags( $_POST['description'] ),
                    'facebook' => strip_tags( $_POST['facebook'] ),        
                    'twitter' => strip_tags( $_POST['twitter'] ),
                    'linkedin' => strip_tags( $_POST['linkedin'] ),        
                    'subscribeText' => strip_tags( $_POST['subscribeText'] ),
                    'subscribeButton' => strip_tags( $_POST['subscribeButton'] ),
                    'subscribeMessage' => strip_tags( $_POST['subscribeMessage'] ),
                    'mcApiKey' => strip_tags( $_POST['mcApiKey'] ),
                    'mcListId' => strip_tags( $_POST['mcListId'] )
                );
                update_option( 'commingSoonSetting', json_encode( $commingSoonSetting ) );
                echo '
                    <div id="message" class="updated notice notice-success is-dismissible">
                        <p>Setting Saved.</p>
                        <button type="button" class="notice-dismiss">
                            <span class="screen-reader-text">Dismiss this notice.</span>
                        </button>
                    </div>
                ';
            } else{
                $commingSoonSettingDefault  = array(
                    'heading1' => '', 
                    'heading2' => '',
                    'bgImage' => '',
                    'logo1' => '',
                    'logo1url' => '',
                    'logo2' =>  '',
                    'logo2url' =>  '',
                    'description' =>  '',
                    'facebook' => '',
                    'twitter' => '',
                    'linkedin' => '',
                    'subscribeText' => '',
                    'subscribeButton' => '',
                    'subscribeMessage' => '',
                    'mcApiKey' => '',
                    'mcListId' => ''
                );
                $commingSoonSetting = get_option( 'commingSoonSetting', false );
                if( $commingSoonSetting === false || empty($commingSoonSetting) ){
                    $commingSoonSetting = $commingSoonSettingDefault;
                } else{
                    $commingSoonSetting = (array)json_decode( $commingSoonSetting );
                }
            }
            $heading1 = stripslashes( strip_tags( $commingSoonSetting['heading1'] ) );           
            $heading2 = stripslashes( strip_tags( $commingSoonSetting['heading2'] ) );
            $bgImage = stripslashes( strip_tags( $commingSoonSetting['bgImage'] ) );            
            $logo1 = stripslashes( strip_tags( $commingSoonSetting['logo1'] ) );          
            $logo1url = stripslashes( strip_tags( $commingSoonSetting['logo1url'] ) );
            $logo2 = stripslashes( strip_tags( $commingSoonSetting['logo2'] ) );  
            $logo2url = stripslashes( strip_tags( $commingSoonSetting['logo2url'] ) );              
            $description = stripslashes( strip_tags( $commingSoonSetting['description'] ) );
            $facebook = stripslashes( strip_tags( $commingSoonSetting['facebook'] ) );           
            $twitter = stripslashes( strip_tags( $commingSoonSetting['twitter'] ) );
            $linkedin = stripslashes( strip_tags( $commingSoonSetting['linkedin'] ) );		   
            $subscribeText = stripslashes( strip_tags( $commingSoonSetting['subscribeText'] ) );
            $subscribeButton = stripslashes( strip_tags( $commingSoonSetting['subscribeButton'] ) );    
            $subscribeMessage = stripslashes( strip_tags( $commingSoonSetting['subscribeMessage'] ) );  
            $mcApiKey = stripslashes( strip_tags( $commingSoonSetting['mcApiKey'] ) );  
            $mcListId = stripslashes( strip_tags( $commingSoonSetting['mcListId'] ) );
        ?>
            <style>
                .wp-list-table{
                    max-width: 600px; 
                    margin-top: 30px;
                }
                .wp-list-table tr td:first-child {
                    width: 200px;
                    overflow: hidden;
                }
                input[type=text], textarea{
                    width: 300px;
                }
            </style>
            <div class="wrap">
                <h1>Comming Soon Setting</h1>
                <form id="posts-filter" method="post">
                    <table class="wp-list-table widefat fixed striped posts">
                        <tbody>
                            <tr>
                                <td>
                                    <label class="newtag form-input-tip">Heading 1</label>
                                </td>
                                <td>
                                    <input type="text" name="heading1" value="<?php echo $heading1; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Heading 2</label>
                                </td>
                                <td>
                                    <input type="text" name="heading2" value="<?php echo $heading2; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Background Image</label>
                                </td>
                                <td>
                                    <input type="text" name="bgImage" value="<?php echo $bgImage; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Logo 1</label>
                                </td>
                                <td>
                                    <input type="text" name="logo1" value="<?php echo $logo1; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Logo 1 URL</label>
                                </td>
                                <td>
                                    <input type="text" name="logo1url" value="<?php echo $logo1url; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Logo 2</label>
                                </td>
                                <td>
                                    <input type="text" name="logo2" value="<?php echo $logo2; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Logo 2 URL</label>
                                </td>
                                <td>
                                    <input type="text" name="logo2url" value="<?php echo $logo2url; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Description</label>
                                </td>
                                <td>
                                    <textarea name="description"><?php echo $description; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Facebook URL</label>
                                </td>
                                <td>
                                    <input type="text" name="facebook" value="<?php echo $facebook; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Twitter URL</label>
                                </td>
                                <td>
                                    <input type="text" name="twitter" value="<?php echo $twitter; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Linkedin URL</label>
                                </td>
                                <td>
                                    <input type="text" name="linkedin" value="<?php echo $linkedin; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Subscribe Heading</label>
                                </td>
                                <td>
                                    <input type="text" name="subscribeText" value="<?php echo $subscribeText; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Subscribe Button Text</label>
                                </td>
                                <td>
                                    <input type="text" name="subscribeButton" value="<?php echo $subscribeButton; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Subscribe Message</label>
                                </td>
                                <td>
                                    <input type="text" name="subscribeMessage" value="<?php echo $subscribeMessage; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>MailChimp API Key</label>
                                </td>
                                <td>
                                    <input type="text" name="mcApiKey" value="<?php echo $mcApiKey; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>MailChimp List Id</label>
                                </td>
                                <td>
                                    <input type="text" name="mcListId" value="<?php echo $mcListId; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label></label>
                                </td>
                                <td>
                                    <input type="submit" name="submit_comming_soon" value="Save" class="button button-primary button-large" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        <?php
    }, 'dashicons-admin-settings', 6  );
} );