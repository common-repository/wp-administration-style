<?php
namespace WP_ADMINISTRATION_STYLE;

defined( 'ABSPATH' ) or die;

/**
 * Plugin Name:                       WP Administration Style
 * Description:                       Enhances the user interface and user experience of the WordPress dashboard.
 * Version:                           7.0.0
 * Tested up to:                      6.6.0
 * Requires at least:                 5.0.0
 * Requires PHP:                      7.4.33
 * Author:                            babakfp
 * Author URI:                        https://babakfp.ir
 * License:                           GPLv3 or later
 * License URI:                       https://www.gnu.org/licenses/gpl-3.0.html
 * Tags:                              Farsi, Farsi UI, فارسی, فونت فارسی, داشبورد فارسی
 * Text Domain:                       wp-administration-style
 * Domain Path:                       /languages
 */

if ( !class_exists( 'Wp_Administration_Style_Globals' ) )
{
    final class Wp_Administration_Style_Globals
    {
        public static $version = '7.0.0';
        public static $tested_up_to = '6.6.0';
        public static $requires_at_least = '5.0.0';
        public static $requires_php = '7.4.33';

        public static function url() {
            return plugin_dir_url( __FILE__ );
        }

        public static function dir() {
            return plugin_dir_path( __FILE__ );
        }
    }
}

require_once Wp_Administration_Style_Globals::dir() . 'includes/core.php';
