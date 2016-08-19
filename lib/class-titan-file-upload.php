<?php
/**
 * Titan File Upload
 *
 * @package Titan File Upload
 *
 * @see lib/class-titan-file-upload.php
 */

/**
 * Class TitanFileUpload
 */
class TitanFileUpload{
    /**
     * TitanFileUpload constructor.
     */
    public function __construct(){
        $this->hooks();
    }

    /**
     * Attach the hook
     */
    public function hooks(){
        add_action('admin_enqueue_scripts', array($this,'titan_file_upload_css'));
    }

    /**
     * Enqueue css files
     *
     * @param $hook
     */
    public function titan_file_upload_css($hook){
        wp_register_style( 'tfu-admin', TFU_URI.  'css/tfu-admin-styles.css', array('tf-admin-styles') );
        wp_register_style( 'tfu-customizer', TFU_URI . 'css/tfu-admin-theme-customizer-styles.css', array('tf-admin-theme-customizer-styles') );

        // Only enqueue scripts if we're on a Titan options page.
        if($hook=='widgets.php'){
            wp_enqueue_style('tfu-customizer');
        }
        else {
            wp_enqueue_style('tfu-admin');
        }
    }
}