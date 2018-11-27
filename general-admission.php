<?php
/*
Plugin Name:  General Admission for Woocommerce
Plugin URI:   https://4thwall.io
Description:  WordPress Plugin that extends Woocommerce to facilitate simple general admission events. Ideal for small nonprofits such as contemporary music ensembles and storefront theatres, or for speaking events.
Version:      1.0
Author:       4th Wall Websites
Author URI:   https://4thwall.io
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages

General Admission is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

General Admission is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with General Admission. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/
// make sure Woocommerce is active
if ( in_array( 'woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

  // make sure we're not conflicting with another Plugin
  if ( ! class_exists('WC_GenAdmission') ) {
    // create the class
    class WC_GenAdmission {
      public function __construct() {
        //admin notices
        add_action('admin_notices', array($this, 'my_admin_notice'));

        //Add general admission tab to woocommerce settings
        add_filter( 'woocommerce_settings_tabs_array', array ($this, 'add_settings_tab'), 50 );
      }

      //print an admin notice
      public function my_admin_notice(){
        ?>
         <div class="notice notice-success is-dismissible">
             <p><?php _e( 'Done!', 'sample-text-domain' ); ?></p>
         </div>
        <?php
      }
      // add a settings tab
      public function add_settings_tab($settings_tabs){
        $settings_tabs['general_admission'] = __( 'General Admission', 'general-admission-for-woocommerce' );
        return $settings_tabs;
      }




    }

    $GLOBALS['wc_genadmission'] = new WC_GenAdmission();
  }
}
