<?php
namespace Cinecinetique\Wordpress\FFPro;
/**
 * @package Filter_Dynamic_Field
 * @version 1.0
 */
/*
Plugin Name: Filter Dynamic Field On Drop Down For Formidable Forms
Plugin URI: https://cinecinetique.com
Description: Allow filtering of items in drop down menus populated dynamically
Author: Rija Ménagé
Version: 1.0
Author URI: https://www.cinecinetique.com
*/

global $wpdb, $frmdb;

require_once (__DIR__ . '/classes/cinecinetique/wordpress/ffpro/ChangeUserRole.php') ;


Class FilterDynamicFieldMain {

  function register_wordpress_hook ($wpdb, $frmdb) {

    $ff_plugin_class = new \Cinecinetique\Wordpress\FFPro\FilterDynamicField($wpdb, $frmdb);

    add_action('frm_after_update_entry', array ($ff_plugin_class, 'filterDynamicFieldMain'), 45, 2);

  }
}


$main = new FilterDynamicFieldMain () ;

$main->register_wordpress_hook ($wpdb, $frmdb) ;
