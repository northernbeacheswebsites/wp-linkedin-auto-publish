<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
?>

<div class="wrap">
    <div id="poststuff">
        <!--main heading-->
        <h1><i style="color: #0077b5;" class="fa fa-linkedin-square" aria-hidden="true"></i> <?php echo 'WP LinkedIn Auto Publish'; ?><div style="display: inline-block; margin-left: 10px; margin-top: -2px; position: absolute;">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="DA6P5SK9DYTU6">
                        <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div></h1>
        
        <!--notice message-->
        <div data-dismissible="disable-done-notice-forever" class="notice notice-warning is-dismissible">
        <p><h3>A Message from the Developer</h3><p>Hi there! Thanks for using my plugin. I wrote this plugin because I found there was no free way to share posts on LinkedIn company pages so I thought I would release this plugin. So if you like it please <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VGVE97KF74FVN" target="_blank">donate</a> as your donation will enable me to continue developing and improving the plugin and you can also rate the plugin <a href="https://wordpress.org/support/plugin/wp-linkedin-auto-publish/reviews/?rate=5#new-post" target="_blank"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></a>'s. If the plugin doesn't work you should take a few big breaths and write on the <a target="_blank" href="https://wordpress.org/support/plugin/wp-linkedin-auto-publish">forum</a> for the plugin. I strongly recommend viewing the below getting started video to help you setup your LinkedIn application and see how it all works.</p></br><iframe width="640" height="360" src="https://www.youtube.com/embed/Te2iKQoNz2w?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></br><a href="https://www.youtube.com/watch?v=Te2iKQoNz2w" target="_blank">Watch on YouTube</a></p>
        </div>

        <!--start form-->
        <form id='linkedin_autopublish_settings_form' action='options.php' method='post'>
            <!--start tabs-->
            <div id="tabs" class="nav-tab-wrapper"> 
                <ul class="tab-titles">
                    <li><a class="nav-tab" href="#authorisationPage"><i class="fa fa-lock" aria-hidden="true"></i> <?php _e('Authorisation', 'wp-linkedin-autopublish' ); ?></a></li>
                    <li><a class="nav-tab" href="#profileCompanyPage"><i class="fa fa-briefcase" aria-hidden="true"></i> <?php _e('Profile or Company', 'wp-linkedin-autopublish' ); ?></a></li>
                    <li><a class="nav-tab" href="#sharingOptionsPage"><i class="fa fa-share-alt" aria-hidden="true"></i> <?php _e('Sharing Options', 'wp-linkedin-autopublish' ); ?></a></li>
                    <li><a class="nav-tab" href="#additionalOptionsPage"><i class="fa fa-cogs" aria-hidden="true"></i> <?php _e('Additional Options', 'wp-linkedin-autopublish' ); ?></a></li>
                    <li><a class="nav-tab" href="#helpPage"><i class="fa fa-question" aria-hidden="true"></i> <?php _e('Help', 'wp-linkedin-autopublish' ); ?></a></li>
                </ul>

                <!--add settings pages-->
                <?php 

                wp_linkedin_autopublish_tab_content('authorisationPage'); 

                wp_linkedin_autopublish_tab_content('profileCompanyPage');

                wp_linkedin_autopublish_tab_content('sharingOptionsPage');

                wp_linkedin_autopublish_tab_content('additionalOptionsPage');

                wp_linkedin_autopublish_tab_content('helpPage');

                ?>

            </div> <!--end tabs div-->     
        </form>
        <!--ad-->
        <a id="linkedin-ad" target="_blank" href="https://northernbeacheswebsites.com.au/contact/">
            <div style="width: 100%; background-color: white; margin-bottom: 20px;">
                <div style="padding: 0px 25px; text-align: center;">
                    <img style="vertical-align: middle; max-width: 100%; height: auto;" src="<?php echo plugins_url( '/images/linkedin-ad.jpg', __FILE__ ); ?>">
                </div>
            </div>
        </a>
    </div>
</div>