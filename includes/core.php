<?php
namespace WP_ADMINISTRATION_STYLE;

require_once Wp_Administration_Style_Globals::dir() . 'includes/is-gutenberg-active.php';

defined( 'ABSPATH' ) or die;

if ( !class_exists( 'Wp_Administration_Style' ) )
{
    final class Wp_Administration_Style
    {
        public function __construct() {
            add_action( 'admin_head', [ $this, 'farsi_font_face' ] );
            add_action( 'admin_enqueue_scripts', [ $this, 'dashboard_styles' ] );
            add_action( 'login_enqueue_scripts', [ $this, 'login_styles' ] );

            // Elementor editor styles
            add_action( 'elementor/editor/wp_head', [ $this, 'farsi_font_face' ] );
            add_action( 'elementor/editor/after_enqueue_styles', fn() => wp_enqueue_style ( 'wp-administration-style::elementor-editor', Wp_Administration_Style_Globals::url() . 'static/css/elementor-editor.css', [], Wp_Administration_Style_Globals::$version ) );
            add_action( 'elementor/preview/enqueue_styles', fn() => wp_enqueue_style ( 'wp-administration-style::elementor-preview', Wp_Administration_Style_Globals::url() . 'static/css/elementor-preview.css', [], Wp_Administration_Style_Globals::$version ) );
            add_action( 'elementor/editor/after_enqueue_scripts', fn() => wp_enqueue_script ( 'wp-administration-style::elementor-editor', Wp_Administration_Style_Globals::url() . 'static/js/elementor-editor.js', [], Wp_Administration_Style_Globals::$version ) );
        }

        function dashboard_styles() {
            wp_enqueue_style( 'wp-administration-style::base', Wp_Administration_Style_Globals::url() . 'static/css/base.css', [], Wp_Administration_Style_Globals::$version );
            wp_enqueue_style( 'wp-administration-style::uicons', Wp_Administration_Style_Globals::url() . 'static/fonts/wp-administration-style-icons/style.css', [], Wp_Administration_Style_Globals::$version );
            wp_enqueue_style( 'wp-administration-style::mce-ifr', Wp_Administration_Style_Globals::url() . 'static/css/mce-ifr.css', [], Wp_Administration_Style_Globals::$version );

            if ( is_gutenberg_active() ) {
                wp_enqueue_style( 'wp-administration-style::gutenberg', Wp_Administration_Style_Globals::url() . 'static/css/gutenberg.css', [], Wp_Administration_Style_Globals::$version );
            }

            if ( is_plugin_active('elementor/elementor.php') ) {
                wp_enqueue_style( 'wp-administration-style::elementor', Wp_Administration_Style_Globals::url() . 'static/css/elementor.css', [], Wp_Administration_Style_Globals::$version );
            }

            if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
                wp_enqueue_style( 'wp-administration-style::woocommerce', Wp_Administration_Style_Globals::url() . 'static/css/woocommerce.css', [], Wp_Administration_Style_Globals::$version );
            }

            wp_enqueue_style( 'wp-administration-style::mce', Wp_Administration_Style_Globals::url() . 'static/css/mce.css', [], Wp_Administration_Style_Globals::$version );
            wp_enqueue_script( 'wp-administration-style::js', Wp_Administration_Style_Globals::url() . 'static/js/index.js', [], Wp_Administration_Style_Globals::$version );
        }

        function login_styles() {
            wp_enqueue_style( 'wp-administration-style::signin', Wp_Administration_Style_Globals::url() . 'static/css/signin.css', [], Wp_Administration_Style_Globals::$version );
            wp_enqueue_style( 'wp-administration-style::uicons', Wp_Administration_Style_Globals::url() . 'static/fonts/wp-administration-style-icons/style.css', [], Wp_Administration_Style_Globals::$version );
        }

        function farsi_font_face() {
            echo '
                <link rel="preload" href="'. Wp_Administration_Style_Globals::url() . 'static/fonts/Vazirmatn/Vazirmatn[wght].woff2" as="font" type="font/woff2" crossorigin />

                <style type="text/css">
                    @font-face {
                        font-family: "Vazirmatn";
                        src: url("'. Wp_Administration_Style_Globals::url() . 'static/fonts/Vazirmatn/Vazirmatn[wght].woff2") format("woff2 supports variations"),
                            url("'. Wp_Administration_Style_Globals::url() . 'static/fonts/Vazirmatn/Vazirmatn[wght].woff2") format("woff2-variations");
                        font-weight: 100 900;
                        font-display: block;
                        font-style: normal;
                    }
                </style>
            ';
        }

    }

    new Wp_Administration_Style();
}
