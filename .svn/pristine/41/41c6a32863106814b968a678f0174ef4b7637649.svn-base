<?php

/*
*		Plugin Name: WP LinkedIn Auto Publish
*		Plugin URI: https://www.northernbeacheswebsites.com.au
*		Description: Publish your latest posts to LinkedIn profiles or companies automatically. 
*		Version: 5.14
*		Author: Martin Gibson
*		Author URI:  https://www.northernbeacheswebsites.com.au
*		Text Domain: wp-linkedin-auto-publish   
*		Support: https://www.northernbeacheswebsites.com.au/contact
*		Licence: GPL2
*/



/**
* 
*
*
* Create admin menu and add it to a global variable so that admin styles/scripts can hook into it
*/
add_action( 'admin_menu', 'wp_linkedin_autopublish_add_admin_menu' );
add_action( 'admin_init', 'wp_linkedin_autopublish_settings_init' );

function wp_linkedin_autopublish_add_admin_menu(  ) { 
    $menu_icon_svg = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48c3ZnIHZlcnNpb249IjEuMiIgYmFzZVByb2ZpbGU9InRpbnkiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDIwIDIwIiBvdmVyZmxvdz0ic2Nyb2xsIiB4bWw6c3BhY2U9InByZXNlcnZlIj48Zz48Zz48Zz48cGF0aCBmaWxsPSIjOUVBM0E3IiBkPSJNMTcuNywxSDIuM0MxLjYsMSwxLDEuNiwxLDIuM3YxNS40QzEsMTguNCwxLjYsMTksMi4zLDE5aDE1LjNjMC43LDAsMS4zLTAuNiwxLjMtMS4zVjIuM0MxOSwxLjYsMTguNCwxLDE3LjcsMXogTTYuMywxNi4zSDMuN1Y3LjdoMi43VjE2LjN6IE01LDYuNkM0LjEsNi42LDMuNSw1LjksMy41LDVjMC0wLjksMC43LTEuNSwxLjUtMS41YzAuOSwwLDEuNSwwLjcsMS41LDEuNUM2LjYsNS45LDUuOSw2LjYsNSw2LjZ6IE0xNi4zLDE2LjNoLTIuN3YtNC4yYzAtMSwwLTIuMy0xLjQtMi4zYy0xLjQsMC0xLjYsMS4xLTEuNiwyLjJ2NC4ySDhWNy43aDIuNnYxLjJoMGMwLjQtMC43LDEuMi0xLjQsMi41LTEuNGMyLjcsMCwzLjIsMS44LDMuMiw0LjFWMTYuM3oiLz48L2c+PC9nPjwvZz48L3N2Zz4=';
    
    global $wp_linkedin_autopublish_settings_page;
	$wp_linkedin_autopublish_settings_page = add_menu_page( 'WP LinkedIn Auto Publish', 'WP LinkedIn Auto Publish', 'manage_options', 'wp_linkedin_auto_publish', 'wp_linkedin_autopublish_options_page',$menu_icon_svg);
}
/**
* 
*
*
* Gets, sets and renders options
*/
require('inc/options-output.php');
/**
* 
*
*
* Output the wrapper of the settings page and call the sections
*/
function wp_linkedin_autopublish_options_page(  ) { 
    require('inc/options-page-wrapper.php');
}
/**
* 
*
*
* Add custom links to plugin on plugins page
*/
function wp_linkedin_autopublish_plugin_links( $links, $file ) {
   if ( strpos( $file, 'wp-linkedin-autopublish.php' ) !== false ) {
      $new_links = array(
               '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VGVE97KF74FVN" target="_blank">' . __('Donate') . '</a>',
               '<a href="https://wordpress.org/support/plugin/wp-linkedin-auto-publish" target="_blank">' . __('Support Forum') . '</a>',
            );
      $links = array_merge( $links, $new_links );
   }
   return $links;
}
add_filter( 'plugin_row_meta', 'wp_linkedin_autopublish_plugin_links', 10, 2 );
/**
* 
*
*
* Add settings link to plugin on plugins page
*/
function wp_linkedin_autopublish_settings_link( $links ) {
    $settings_link = '<a href="admin.php?page=wp_linkedin_auto_publish">' . __( 'Settings' ) . '</a>';
    array_unshift( $links, $settings_link );
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'wp_linkedin_autopublish_settings_link' );
/**
* 
*
*
* Load admin styles and scripts
*/
function wp_linkedin_autopublish_register_admin($hook)
{
    //put this post script on every page
    wp_enqueue_script( 'custom-admin-post-script', plugins_url( '/inc/postscript.js', __FILE__ ), array( 'jquery'));
    
    //get settings page
    global $wp_linkedin_autopublish_settings_page;
    
    //if the page isn't the settings page return nothing otherwise load scripts/styles
    if($hook != $wp_linkedin_autopublish_settings_page)
        return;

    wp_enqueue_script('clipboard', 'https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.16/clipboard.min.js');
    wp_enqueue_script( 'custom-admin-script', plugins_url( '/inc/adminscript.js', __FILE__ ), array( 'jquery','wp-color-picker' ));
    wp_enqueue_script('jquery-ui-accordion');
    wp_enqueue_script('jquery-ui-tabs');
    wp_enqueue_style( 'custom-admin-style', plugins_url( '/inc/adminstyle.css', __FILE__ ));
    wp_register_style( 'font-awesome-icons', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
    wp_enqueue_style( array('font-awesome-icons') );
}
add_action( 'admin_enqueue_scripts', 'wp_linkedin_autopublish_register_admin' );
/**
* 
*
*
* Function to get current page URL
*/
function wp_linkedin_autopublish_current_page_url() {
    
    
    if(isset($_SERVER['HTTPS'])) {
        $serverType = 'https://';
    } else {
        $serverType = 'http://';         
    }
    
    $currentPageUrl = $serverType . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
    $findCurrentPageUrl = strpos($currentPageUrl,"wp_linkedin_auto_publish")+24;
    $trimCurrentPageUrl = substr($currentPageUrl,0,$findCurrentPageUrl);
    return $trimCurrentPageUrl;
}
/**
* 
*
*
* Function to get the posts URL
*/
function wp_linkedin_autopublish_posts_page_url() {

    $currentPageUrl = $_SERVER['REQUEST_URI']; 

    $findCurrentPageUrl = strpos($currentPageUrl,"admin.php");

    $trimCurrentPageUrl = substr($currentPageUrl,0,$findCurrentPageUrl)."edit.php";
    
    return $trimCurrentPageUrl;
}
/**
* 
*
*
* Function to generate random state for API call
*/
function wp_linkedin_autopublish_state_generator($length = 21) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
/**
* 
*
*
* Function that gets the access token
*/
function wp_linkedin_autopublish_get_access_token(){

    if ( ! current_user_can( 'manage_options') ){
		return;
	}
            
    //get options    
    $options = get_option( 'wp_linkedin_autopublish_settings' );    

    $code = $_POST['code']; 
    $redirect = $_POST['redirect'];

    $json_feed = wp_remote_post( 'https://www.linkedin.com/oauth/v2/accessToken?grant_type=authorization_code&code='.$code.'&redirect_uri='.$redirect.'&client_id='.$options['wp_linkedin_autopublish_client_id'].'&client_secret='.$options['wp_linkedin_autopublish_client_secret'].'&scope=r_fullprofile%20r_emailaddress%20w_share%20rw_company_admin', array(
        'headers' => array(
            'Content-Length' => 0,
        ),
    ) );

    $decodedBody = json_decode(preg_replace('/("\w+"):(\d+(\.\d+)?)/', '\\1:"\\2"', $json_feed['body']), true);
                
    echo $decodedBody['access_token'];

    die();        
 
} 
add_action( 'wp_ajax_get_access_token', 'wp_linkedin_autopublish_get_access_token' );
/**
* 
*
*
* Function that displays settings tab content
*/
function wp_linkedin_autopublish_tab_content ($tabName) {
    ?>
<div class="tab-content" id="<?php echo $tabName; ?>">
    <div class="meta-box-sortables ui-sortable">
        <div class="postbox">
            <div class="inside">
                
                
                <?php if($tabName == 'helpPage') { ?>
                
                <div id="accordion">
                    <h3><i class="fa fa-info-circle" aria-hidden="true"></i> Posts aren't being sent to LinkedIn what's going on?</h3>
                    <div>
                        There could be several reasons why posts aren't going to LinkedIn, let's go through a few of these:
                        
                        <ol>
                            <li>If you are sharing to a company page make sure you are an administrator of that company page.</li>
                            <li>Make sure you copy and paste your Client ID and Secret on the <a class="open-tab" href="#authorisationPage">authorisation tab</a> exactly as it is written on your LinkedIn application.</li>
                            <li>Make sure the Authorisation Code and Access Token settings are filled in by clicking the 'Get Authorisation Code &amp; Access Token' button on the <a class="open-tab" href="#authorisationPage">authorisation tab</a>. All settings on this tab need to be completed for this plugin to work.</li>
                            <li>Make sure when you're creating your LinkedIn application that you give the application all permissions for the 'Default Application Permissions' checkboxes. If you haven't done this, do this, and then press the 'Get Authorisation Code &amp; Access Token' button again on the <a class="open-tab" href="#authorisationPage">authorisation tab</a>.</li>
                            <li>Make sure on your LinkedIn application that your 'OAuth 2.0 Authorised Redirect URL' is: <strong><?php echo esc_url(wp_linkedin_autopublish_current_page_url()); ?></strong> <button class="clipboard" style="cursor:pointer;" data-clipboard-text="<?php echo esc_url(wp_linkedin_autopublish_current_page_url()); ?>">Copy</button>. If you're coming from another plugin that shared posts to LinkedIn don't assume that your existing redirect URL will work because it won't.</li>
                            <li>Make sure of course on your post page that you haven't checked the 'Don't share this post' checkbox.</li>
                            <li>If you're sharing to a company make sure on the <a class="open-tab" href="#profileCompanyPage">profile or company tab</a> that you have selected the company you want to share with. If the company you want to share with isn't listed it means either something isn't right with your authorisation so perhaps try reauthorising the plugin again or you don't have permission to manage that company in LinkedIn.</li>
                            <li>Make sure the category that your post belongs to hasn't been checked on the 'Don't Share Select Post Categories on LinkedIn' option on the <a class="open-tab" href="#sharingOptionsPage">sharing options tab</a>.</li>
                            <li>If you have shared the post to LinkedIn already and you haven't changed any of the shared content LinkedIn won't let you share it again because it detects that as duplicate content. So you will need to change the content before sharing again.</li>
                        </ol>
                        
                    </div>
                    
                    
                    <h3><i class="fa fa-info-circle" aria-hidden="true"></i> Why do I need to re-authorise the plugin every 60 days?</h3>
                    <div>
                        Unfortunately this is not my choice. LinkedIn uses oAuth 2.0 and they expire access tokens every 60 days for what they must say is for 'security purposes'. I know this makes life suck even more than it already does. If LinkedIn should provide a way to enable access tokens that don't expire I will be onto this ASAP. However just before your access token will expire you will see a notice on your WordPress dashboard prompting you to renew the access token. Renewing the access token just requires clicking the 'Get Authorisation Code &amp; Access Token' button on the <a class="open-tab" href="#authorisationPage">Authorisation tab</a> so you can ensure your posts always get shared to LinkedIn. 
                    </div>
                    
                    
                    <h3><i class="fa fa-info-circle" aria-hidden="true"></i> I am still having issues with the plugin, what can I Do?</h3>
                    <div>
                        Please visit the <a target="_blank" href="https://wordpress.org/support/plugin/wp-linkedin-auto-publish">forum</a> and I should answer your question or resolve your issue within 24 hours. Before writing on the forum make sure you have the latest version of this plugin installed and it would be a good idea to also make sure you have the latest version of WordPress. Please be specific and screenshots often say a thousand words so please try and do this. I will try and resolve your issue from my end however sometimes I can't replicate every issue and in these circumstances I may ask you to provide access to your WordPress install so I can properly diagnose things.
                    </div>
                    
                </div>
                
                <?php } else { ?>
                
                <?php if($tabName == 'authorisationPage') { ?>
                <!--instructions-->
                <h3><?php _e('Authorisation Instructions', 'wp-linkedin-autopublish' ); ?></h3>
                <p>First you need to create a LinkedIn Application. You can do this by clicking <a target="_blank" href="https://www.linkedin.com/developer/apps">here</a> (make sure you are already logged in to LinkedIn). Then click the "Create Application" button. Fill out all of the general information in the first page of the form. Then in the "Authentication" tab give your app <strong>all permissions</strong> and under "oAuth 2.0" add the Redirect URL: <strong><?php echo esc_url(wp_linkedin_autopublish_current_page_url()); ?></strong> <button class="clipboard" style="cursor:pointer;" data-clipboard-text="<?php echo esc_url(wp_linkedin_autopublish_current_page_url()); ?>">Copy</button>. Then finally in the "Settings" tab make sure your apps "Application Status" is set to "Live". Now enter your LinkedIn Client ID and Secret below and press the "Save All Settings" button. Once the page reloads press the "Get Authorisation Code &amp; Access Token" button and then press the "Save All Settings" button. If you're experiencing any issues please check out the <a class="open-tab" href="#helpPage">help tab</a> or watch the <a href="https://www.youtube.com/watch?v=Te2iKQoNz2w" target="_blank">getting started video</a> on YouTube.</p>
                
                <?php } ?>
                
                <!--table-->
                <table class="form-table">


                <!--fields-->
                <?php
                settings_fields($tabName);
                do_settings_sections($tabName);
                ?>
                    
                <button type="submit" name="submit" id="submit" class="button button-primary"><i class="fa fa-check-square" aria-hidden="true"></i>
 <?php _e('Save All Settings', 'wp-linkedin-autopublish' ); ?></button>    
                </table>
                
                <?php } ?>
                

            </div> <!-- .inside -->
        </div> <!-- .postbox -->                      
    </div> <!-- .meta-box-sortables --> 
</div> <!-- .tab-content -->     
    <?php
}
/**
* 
*
*
* Add metabox to post
*/
function wp_linkedin_autopublish_metabox($postType){
    $options = get_option( 'wp_linkedin_autopublish_settings' );
    $explodedPostTypes = explode(",",$options['wp_linkedin_autopublish_share_post_types']);
    $explodedPostTypes = array_map('strtolower', $explodedPostTypes);
    
    if(in_array($postType,$explodedPostTypes)) {
        add_meta_box( 'wp_linkedin_autopublish_meta_box',__('WP LinkedIn Auto Publish Settings', 'wp-linkedin-autopublish' ), 'wp_linkedin_autopublish_build_meta_box',$postType,'side','high');      
    } 
}
add_action( 'add_meta_boxes', 'wp_linkedin_autopublish_metabox' );
/**
* 
*
*
* Add callback function to metabox content
*/
function wp_linkedin_autopublish_build_meta_box ($post) {
  $options = get_option( 'wp_linkedin_autopublish_settings' );
  wp_nonce_field( basename( __FILE__ ), 'wp_linkedin_autopublish_meta_box_nonce' );
    
  $current_custom_linkedin_share_message = get_post_meta( $post->ID, '_custom_linkedin_share_message', true );
    
  $current_dont_share_post_linkedin = get_post_meta( $post->ID, '_dont_share_post_linkedin', true );     
    
?>
<div class='inside'>
    
    
    
    
    
    
    
	<p><?php echo __( 'Custom Share Message:', 'wp-linkedin-autopublish' ); ?><br>
        <textarea cols="29" rows="3" name="custom-linkedin-share-message" id="custom-share-message"><?php
    
        if(strlen($current_custom_linkedin_share_message)>0) {
           echo esc_attr($current_custom_linkedin_share_message); 
        } elseif (isset($options['wp_linkedin_autopublish_default_share_message'])) {
            echo esc_attr($options['wp_linkedin_autopublish_default_share_message']);
        } else {
            echo '';
        }  
    
        ?></textarea>
	</p>
  
    <p>        
    <?php if($current_dont_share_post_linkedin == "yes") $current_dont_share_post_linkedin_checked = 'checked="checked"'; ?>
    <div id="dont-sent-to-linkedin-checkbox-line">   
    <input id="dont-sent-to-linkedin-checkbox" type="checkbox" name="dont-share-post-linkedin" value="yes" <?php if(isset($current_dont_share_post_linkedin_checked)){ echo esc_attr($current_dont_share_post_linkedin_checked);} ?>> <?php echo __( 'Don\'t share this post', 'wp-linkedin-autopublish' ); ?></div>
    </p>
    
    <?php if(metadata_exists('post', $post->ID, '_sent_to_linkedin')) {
    echo '<strong>Share History</strong></br>';
            
    foreach(array_reverse(get_post_meta($post->ID, '_sent_to_linkedin', true )) as $share){
            echo $share.'</br>';
    }                    
    }
    ?>
    
    <a href="" style="margin-top: 10px;" data="<?php echo $post->ID; ?>" class="button send-to-linkedin"><?php echo __( 'Share Now', 'wp_linkedin_autopublish' ); ?></a>
    
    
</div>
<?php     
}
/**
* 
*
*
* Function to save meta box information
*/
function wp_linkedin_autopublish_save_meta_boxes_data($post_id,$post){
    if ( !isset( $_POST['wp_linkedin_autopublish_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['wp_linkedin_autopublish_meta_box_nonce'], basename( __FILE__ ) ) ){
	return;
    }
    //don't do anything for autosaves 
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
    //check if user has permission to edit posts otherwise don't do anything 
    if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
    
    //get and set options
    if ( isset( $_REQUEST['custom-linkedin-share-message'] ) ) {
		update_post_meta( $post_id, '_custom_linkedin_share_message', sanitize_text_field( $_POST['custom-linkedin-share-message'] ) );
	}
    if ( isset( $_REQUEST['dont-share-post-linkedin'] ) ) {
		update_post_meta( $post_id, '_dont_share_post_linkedin', sanitize_text_field( $_POST['dont-share-post-linkedin'] ) );
	} else {
        delete_post_meta($post_id, '_dont_share_post_linkedin');
    }
}
add_action( 'save_post', 'wp_linkedin_autopublish_save_meta_boxes_data',10,2);
/**
* 
*
*
* Function share post on linkedin
*/
function wp_linkedin_autopublish_post_to_linkedin ($new_status, $old_status, $post) {

    //if the old status isn't published and the new statusis carry out the share to linkedin
    if ('publish' === $new_status) {
        
    //get options
    $options = get_option( 'wp_linkedin_autopublish_settings' );
     
    //get categories user has chosen not to share and separate comma values and turn it into an array
    $explodedCategories = explode(",",$options['wp_linkedin_autopublish_dont_share_categories']);
    
    //get the current category
    $thePostCategory = get_the_category($post->ID);
    $thePostCategoryArray = array();
    
    foreach($thePostCategory as $categoryName){
        array_push($thePostCategoryArray,$categoryName->name);       
    }
    
    //compare the 2 arrays and count how many duplicates there are 
    $thePostCategoryComparison = count(array_intersect($explodedCategories,$thePostCategoryArray));    
        
    //get the custom post types the user has nominated to share    
    $explodedPostTypes = explode(",",$options['wp_linkedin_autopublish_share_post_types']);
    $explodedPostTypes = array_map('strtolower', $explodedPostTypes);
    $postType = $post->post_type;
                  
    //first check if the user has decided to not share the post and check if the user has nominated to not share category belonging to the post and then check if the user has nominated to share the post type whether this be a post, page or custom post type
    if(get_post_meta($post->ID, '_dont_share_post_linkedin', true ) !== "yes" && $thePostCategoryComparison == 0 && in_array($postType,$explodedPostTypes)) {    
    
    //create an associative array to be used for shortcode replacement    
    $variables = array("post_title"=>html_entity_decode(get_the_title($post->ID)),
                       "post_link"=>get_permalink($post->ID),
                       "post_excerpt"=>get_the_excerpt($post->ID),
                       "post_content"=>preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '',strip_tags(get_post_field('post_content',$post->ID))),
                       "post_author"=>get_the_author_meta('display_name',get_post_field('post_author',$post->ID)),
                       "website_title"=>html_entity_decode(get_bloginfo('name'))
                      );    
        
    //if the custom comment has been blanked out try getting the default message otherwise get the custom comment
    if(strlen(get_post_meta($post->ID, '_custom_linkedin_share_message', true ))<1) {
        $linkedinComment = $options['wp_linkedin_autopublish_default_share_message'];   
    } else {
        $linkedinComment = get_post_meta($post->ID, '_custom_linkedin_share_message', true ); 
    }
    
    //for each variable used replace it with the actual value  
    foreach($variables as $key => $value){
        $linkedinComment = str_replace('['.strtoupper($key).']', $value, $linkedinComment); 
    }
    //limit the comment to 700 characters total
    $linkedinComment = substr($linkedinComment, 0, 700);    
           
    //if simple share method is selected just post the visibility and custom message
    if($options['wp_linkedin_autopublish_share_method'] == "simple"){
        $json = json_encode( array(
        'visibility' => array(
            'code' => $options['wp_linkedin_autopublish_share_with']
        ),
        'comment' => $linkedinComment,
    ) );

    } else {
        $json = json_encode( array(
        'visibility' => array(
            'code' => $options['wp_linkedin_autopublish_share_with']
        ),
        'comment' => $linkedinComment,
        'content' => array(
            'submitted‐image-url' => get_the_post_thumbnail_url($post->ID, 'full'),
            'title' => html_entity_decode(get_the_title($post->ID)),
            'submitted-url' => get_permalink($post->ID),
            'description' => get_the_excerpt($post->ID)
        ),
    ) );  
    }
        
    //see if we are sharing with a profile or company         
    if($options['wp_linkedin_autopublish_profile_company'] == 'profile'){ 
        $endPoint = "people/~";
    } else {
        $endPoint = "companies/".$options['wp_linkedin_autopublish_company_select'];    
    } 
        
    //do API call to LinkedIn    
    $response = wp_remote_post( 'https://api.linkedin.com/v1/'.$endPoint.'/shares?format=json&oauth2_access_token='.$options['wp_linkedin_autopublish_access_token'], array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'x-li-format' => 'json',
            'Content-Type' => 'application/json; charset=utf-8',
        ),
        'body' => $json,
    )); 
        
    //save the response to a new meta option 
    //get and decode the response    
    $decodedBody = json_decode(preg_replace('/("\w+"):(\d+(\.\d+)?)/', '\\1:"\\2"', $response['body']), true); 
    
    //get current date and time in the wordpress format and to the wordpress timezone    
    $dateTime = date(get_option('date_format').' '.get_option('time_format'),strtotime(get_option('gmt_offset').' hours'));    
        
    //get the current time and create a link that goes to the post    
    $linkedinResponse = '<a target="_blank" href="'.$decodedBody['updateUrl'].'">'.$dateTime.'</a>';   
        
    //update the post meta with time and URL        
    //if the post hasn't been shared before send an array with the data if it has been shared get the existing array and append the new item to the array
    if(metadata_exists('post',$post->ID,'_sent_to_linkedin')){
        
        $existingShares = array();
        foreach(get_post_meta($post->ID, '_sent_to_linkedin', true ) as $share){
            array_push($existingShares,$share); 
        }
        array_push($existingShares,$linkedinResponse);
        update_post_meta($post->ID, '_sent_to_linkedin',$existingShares);
         
    } else {
        update_post_meta($post->ID, '_sent_to_linkedin',array($linkedinResponse));     
    }       
       
    } //end if user has decided to share post
    } //end if post transition has gone to published
}
add_action( 'transition_post_status', 'wp_linkedin_autopublish_post_to_linkedin', 10, 3 );
/**
* 
*
*
* Function share post on linkedin - used by the instant share
*/
function wp_linkedin_autopublish_post_to_linkedin_instant ($new_status, $old_status, $post,$instant_post) {
    
    //if the old status isn't published and the new statusis carry out the share to linkedin
    if ('publish' === $new_status) {
        
    //get options
    $options = get_option( 'wp_linkedin_autopublish_settings' );
     
                  
    //first check if the user has decided to not share the post and check if the user has nominated to not share category belonging to the post and then check if the user has nominated to share the post type whether this be a post, page or custom post type
    //also in 5.13 we are going to add a condition to allow people to express post a post regardless of its post type or category   
    if($instant_post == true && get_post_meta($post->ID, '_dont_share_post_linkedin', true ) !== "yes") {    
    
    //create an associative array to be used for shortcode replacement    
    $variables = array("post_title"=>html_entity_decode(get_the_title($post->ID)),
                       "post_link"=>get_permalink($post->ID),
                       "post_excerpt"=>get_the_excerpt($post->ID),
                       "post_content"=>preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '',strip_tags(get_post_field('post_content',$post->ID))),
                       "post_author"=>get_the_author_meta('display_name',get_post_field('post_author',$post->ID)),
                       "website_title"=>html_entity_decode(get_bloginfo('name'))
                      );    
        
    //if the custom comment has been blanked out try getting the default message otherwise get the custom comment
    if(strlen(get_post_meta($post->ID, '_custom_linkedin_share_message', true ))<1) {
        $linkedinComment = $options['wp_linkedin_autopublish_default_share_message'];   
    } else {
        $linkedinComment = get_post_meta($post->ID, '_custom_linkedin_share_message', true ); 
    }
    
    //for each variable used replace it with the actual value  
    foreach($variables as $key => $value){
        $linkedinComment = str_replace('['.strtoupper($key).']', $value, $linkedinComment); 
    }
    //limit the comment to 700 characters total
    $linkedinComment = substr($linkedinComment, 0, 700);    
           
    //if simple share method is selected just post the visibility and custom message
    if($options['wp_linkedin_autopublish_share_method'] == "simple"){
        $json = json_encode( array(
        'visibility' => array(
            'code' => $options['wp_linkedin_autopublish_share_with']
        ),
        'comment' => $linkedinComment,
    ) );

    } else {
        $json = json_encode( array(
        'visibility' => array(
            'code' => $options['wp_linkedin_autopublish_share_with']
        ),
        'comment' => $linkedinComment,
        'content' => array(
            'submitted‐image-url' => get_the_post_thumbnail_url($post->ID, 'full'),
            'title' => html_entity_decode(get_the_title($post->ID)),
            'submitted-url' => get_permalink($post->ID),
            'description' => get_the_excerpt($post->ID)
        ),
    ) );  
    }
        
    //see if we are sharing with a profile or company         
    if($options['wp_linkedin_autopublish_profile_company'] == 'profile'){ 
        $endPoint = "people/~";
    } else {
        $endPoint = "companies/".$options['wp_linkedin_autopublish_company_select'];    
    } 
        
    //do API call to LinkedIn    
    $response = wp_remote_post( 'https://api.linkedin.com/v1/'.$endPoint.'/shares?format=json&oauth2_access_token='.$options['wp_linkedin_autopublish_access_token'], array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'x-li-format' => 'json',
            'Content-Type' => 'application/json; charset=utf-8',
        ),
        'body' => $json,
    )); 
        
    //save the response to a new meta option 
    //get and decode the response    
    $decodedBody = json_decode(preg_replace('/("\w+"):(\d+(\.\d+)?)/', '\\1:"\\2"', $response['body']), true); 
    
    //get current date and time in the wordpress format and to the wordpress timezone    
    $dateTime = date(get_option('date_format').' '.get_option('time_format'),strtotime(get_option('gmt_offset').' hours'));    
        
    //get the current time and create a link that goes to the post    
    $linkedinResponse = '<a target="_blank" href="'.$decodedBody['updateUrl'].'">'.$dateTime.'</a>';   
        
    //update the post meta with time and URL        
    //if the post hasn't been shared before send an array with the data if it has been shared get the existing array and append the new item to the array
    if(metadata_exists('post',$post->ID,'_sent_to_linkedin')){
        
        $existingShares = array();
        foreach(get_post_meta($post->ID, '_sent_to_linkedin', true ) as $share){
            array_push($existingShares,$share); 
        }
        array_push($existingShares,$linkedinResponse);
        update_post_meta($post->ID, '_sent_to_linkedin',$existingShares);
         
    } else {
        update_post_meta($post->ID, '_sent_to_linkedin',array($linkedinResponse));     
    }       
       
    } //end if user has decided to share post
    } //end if post transition has gone to published
}
/**
* 
*
*
* This function shares a post to LinkedIn by pressing the share to linkedin button
*/
function wp_linkedin_autopublish_post_to_linkedin_instantly (){
    
    //set php variables from ajax variables
    $post = get_post(intval($_POST['postID']));
    $new_status = $_POST['newStatus'];
    $old_status = $_POST['oldStatus'];
    $instant_post = true; 
    
    //delete any existing setting value that prevents the post being shared
    delete_post_meta(intval($_POST['postID']), '_dont_share_post_linkedin');
    
    //call share method
    wp_linkedin_autopublish_post_to_linkedin_instant($new_status, $old_status, $post, $instant_post);
    
    //add the post meta which prevents the post being shared again
    update_post_meta(intval($_POST['postID']), '_dont_share_post_linkedin','yes');
    
    //return success
    echo "success";
    wp_die(); // this is required to terminate immediately and return a proper response
    
}
add_action( 'wp_ajax_post_to_linkedin', 'wp_linkedin_autopublish_post_to_linkedin_instantly' );
/**
* 
*
*
* This function updates the dont share checkbox when the value is changed
*/
function wp_linkedin_autopublish_update_dont_share_option (){
    
    //set php variables from ajax variables
    $post = intval($_POST['postID']);
    $dontShareAction = $_POST['dontShareAction'];
    
    if($dontShareAction == "update"){
        update_post_meta($post, '_dont_share_post_linkedin','yes');     
    } else {
        delete_post_meta($post, '_dont_share_post_linkedin');    
    }
    
    //return success
    echo "success";
    wp_die(); // this is required to terminate immediately and return a proper response
    
}
add_action( 'wp_ajax_update_dont_share', 'wp_linkedin_autopublish_update_dont_share_option' );
/**
* 
*
*
* This function updatesthe custom share message when changed
*/
function wp_linkedin_autopublish_update_custom_share_message (){
    
    //set php variables from ajax variables
    $post = intval($_POST['postID']);
    $message = $_POST['shareMessage'];

    //add the post meta which prevents the post being shared again
    update_post_meta($post, '_custom_linkedin_share_message',$message);
    
    //return success
    echo "success";
    wp_die(); // this is required to terminate immediately and return a proper response
    
}
add_action( 'wp_ajax_update_share_message', 'wp_linkedin_autopublish_update_custom_share_message' );
/**
* 
*
*
* Function to prevent republishing post that has already been sent to linkedin by default
*/
function wp_linkedin_autopublish_dont_republish($post_id,$post){
if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
    
    //check to see if post is published
    if('publish' == $post->post_status) { 
        update_post_meta( $post_id, '_dont_share_post_linkedin', 'yes');    
    }  
}
add_action( 'save_post', 'wp_linkedin_autopublish_dont_republish',11,2);
/**
* 
*
*
* This function makes the above function only run the first time
*/
function wp_linkedin_autopublish_remove_function_except_first_publish()
{
  remove_action('save_post','wp_linkedin_autopublish_dont_republish',11,2);
}
add_action('publish_to_publish','wp_linkedin_autopublish_remove_function_except_first_publish');
/**
* 
*
*
* Display warning message that the access token is about to expire
*/
function wp_linkedin_autopublish_token_expiry_warning() {
    $options = get_option( 'wp_linkedin_autopublish_settings' );
    
    //if the user hasn't saved any settings yet there's no need to display this message
    if(isset($options['wp_linkedin_autopublish_access_token_validity']) && strlen($options['wp_linkedin_autopublish_access_token_validity'])>0){
        //get expiry date
        $expiryDate = $options['wp_linkedin_autopublish_access_token_validity'];
        $newExpiryDate = date_format(date_create_from_format('d/m/Y', $expiryDate), 'm/d/Y');
        $expiryDateUnix = strtotime($newExpiryDate);
        //get todays date
        $todaysDate = date('m/d/Y', time());
        $todaysDateUnix = strtotime($todaysDate);
        //get difference between dates
        $daysBetweenDates = ceil(($expiryDateUnix - $todaysDateUnix) / 86400);
        //show expiry date in a format based on users selected Wordpress date format
        $newExpiryDateLocalised = date_format(date_create_from_format('d/m/Y', $expiryDate), get_option('date_format'));

        $menuPage = menu_page_url('wp_linkedin_auto_publish',0);
        
        if(abs($daysBetweenDates) == 1) {
            $dayPlural = "day";    
        } else {
            $dayPlural = "days";    
        }
              
        if($daysBetweenDates < 8 && $daysBetweenDates > 0){
            $class = 'notice notice-error';
            $message = '<h3 style="margin-top: 0px;">WP LinkedIn Auto Publish Notice</h3> WP LinkedIn Auto Publish needs to be re-authenticated! If the plugin isn\'t re-authenticated the autopublish feature will stop working on the: <strong>'. $newExpiryDateLocalised.'</strong> (that\'s just '.$daysBetweenDates.' '.$dayPlural.' away crikey). <a style="font-weight:bold;" href="'.$menuPage.'">Click here</a> to re-authenticate.';

            printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message ); 
        }
        
        if($daysBetweenDates == 0){
            $class = 'notice notice-error';
            $message = '<h3 style="margin-top: 0px;">WP LinkedIn Auto Publish Notice</h3> WP LinkedIn Auto Publish needs to be re-authenticated! Automatic publishing of your posts to LinkedIn will stop today. <a style="font-weight:bold;" href="'.$menuPage.'">Click here</a> to re-authenticate.';

            printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message ); 
        }
        
        if($daysBetweenDates < 0){
            $class = 'notice notice-error';
            $message = '<h3 style="margin-top: 0px;">WP LinkedIn Auto Publish Notice</h3> WP LinkedIn Auto Publish needs to be re-authenticated! Automatic publishing of your posts to LinkedIn stopped working on the <strong>'. $newExpiryDateLocalised.'</strong> (that was '.abs($daysBetweenDates).' '.$dayPlural.' ago...jiminy jilickers). <a style="font-weight:bold;" href="'.$menuPage.'">Click here</a> to re-authenticate.';

            printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message ); 
        }
        
    }      
}
add_action( 'admin_notices', 'wp_linkedin_autopublish_token_expiry_warning' );
/**
* 
*
*
* Check if it's necessary to add a column to the all pages listing
*/
function wp_linkedin_autopublish_page_column_required(){
    //get option of what post types to share
    $options = get_option( 'wp_linkedin_autopublish_settings' );
    $explodedPostTypes = explode(",",$options['wp_linkedin_autopublish_share_post_types']);
    $explodedPostTypes = array_map('strtolower', $explodedPostTypes);
    if(in_array("page",$explodedPostTypes)){
        return true;    
    } else {
        return false;
    }
}
/**
* 
*
*
* Create new column on the posts page
*/
function wp_linkedin_autopublish_additional_posts_column($columns) {
    
    $options = get_option( 'wp_linkedin_autopublish_settings' );
    
    if(isset($options['wp_linkedin_autopublish_hide_posts_column'])){
        return $columns;
    } else {
        $new_columns = array(
        'shared_on_linkedin' => __( 'Shared on LinkedIn', 'wp-linkedin-autopublish' ),
        );
        $filtered_columns = array_merge( $columns, $new_columns );
        return $filtered_columns;       
    }
}
add_filter('manage_posts_columns', 'wp_linkedin_autopublish_additional_posts_column');
if(wp_linkedin_autopublish_page_column_required()==true){
    add_filter('manage_page_posts_columns', 'wp_linkedin_autopublish_additional_posts_column');   
}
/**
* 
*
*
* Add content to the new posts page column
*/
function wp_linkedin_autopublish_additional_posts_column_data( $column ) {
    
    $options = get_option( 'wp_linkedin_autopublish_settings' );
    
    // Get the post object for this row so we can output relevant data
    global $post;
  
    // Check to see if $column matches our custom column names
    switch ( $column ) {

    case 'shared_on_linkedin' :
    if(metadata_exists('post', $post->ID, '_sent_to_linkedin')) {
    foreach(array_reverse(get_post_meta($post->ID, '_sent_to_linkedin', true )) as $share){
            echo $share.'</br>';
    }   
    } else {
       
        echo 'Not shared <a class="send-to-linkedin" href="" data="'.$post->ID.'">Share now</a>';    
                
       //edit_post_link( 'share now', 'Not shared ', '', $post->ID, '');
        
        
    } 
      break;    
    }
}
add_action( 'manage_posts_custom_column', 'wp_linkedin_autopublish_additional_posts_column_data' );
// if pages have been opted not to be shared hide the column on the all pages listing
if(wp_linkedin_autopublish_page_column_required()==true){
    add_action('manage_page_posts_custom_column', 'wp_linkedin_autopublish_additional_posts_column_data');
}
/**
* 
*
*
* Add translation
*/
add_action('plugins_loaded', 'wp_linkedin_autopublish_translations');
function wp_linkedin_autopublish_translations() {
	load_plugin_textdomain( 'wp-linkedin-autopublish', false, dirname( plugin_basename(__FILE__) ) . '/inc/lang/' );
}






?>