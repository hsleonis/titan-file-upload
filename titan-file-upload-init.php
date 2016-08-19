<?php
/**
 * Main plugin file
 *
 * @package Titan File Upload
 *
 * @see lib/class-option-file.php
 */

/**
Plugin Name: Titan File Upload
Plugin URI: http://themeaxe.com
Description: This plugin is an extension of Titan Framework. It adds any file upload functionality on Titan Framework which is currently unavailable.
Author: Md. Hasan Shahriar
Version: 1.1
Author URI: http://themeaxe.com
 */

if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly.
}

// Used for tracking the version used.
defined( 'TFU_VERSION' ) or define( 'TFU_VERSION', '1.1' );
// Used for text domains.
defined( 'TFU_I18NDOMAIN' ) or define( 'TFU_I18NDOMAIN', 'titan-file-upload' );
// Used for general naming, e.g. nonces.
defined( 'TFU' ) or define( 'TFU', 'titan-file-upload' );
// Used for general naming.
defined( 'TFU_NAME' ) or define( 'TFU_NAME', 'Titan File Upload' );
// Used for file includes.
defined( 'TFU_PATH' ) or define( 'TFU_PATH', trailingslashit( dirname( __FILE__ ) ) );
// Used for file uri
defined('TFU_URI') or define('TFU_URI', trailingslashit( plugins_url('',__FILE__)));
// Used for testing and checking plugin slug name.
defined( 'TFU_PLUGIN_BASENAME' ) or define( 'TFU_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );


/**
 * Class TitanFileUploadPlugin
 * Extends Titan Framework Core functionality to upload any file
 *
 * @author Md. Hasan Shahriar
 * @url http://themeaxe.com
 */
class TitanFileUploadPlugin{
    /**
     * TitanFileUploadPlugin constructor.
     */
    public function __construct() {
        // File upload option
        add_action('plugins_loaded', array( $this, 'tfu_file_upload_init'));
    }

    /**
     * This extension requires Titan Framework
     */
    public function tfu_not_loaded() {
        // Show required notice
        require_once( TFU_PATH . 'titan-checker.php' );
    }

    /**
     * Initialize File upload class
     */
    public function tfu_file_upload_init() {
        if(class_exists(TitanFrameworkPlugin)) {
            require_once(TFU_PATH . 'lib/class-option-file.php');
            require_once(TFU_PATH . 'lib/class-titan-file-upload.php');

            new TitanFileUpload();
        }
        else{
            $this->tfu_not_loaded();
        }
    }
}

/**
 * Here you go!
 */
new TitanFileUploadPlugin();