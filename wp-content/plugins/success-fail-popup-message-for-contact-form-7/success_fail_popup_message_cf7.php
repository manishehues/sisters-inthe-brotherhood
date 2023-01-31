<?php
/**
* Plugin Name: Success Fail Popup Message For Contact Form 7
* Description: This plugin allows create Success Fail Popup Message For Contact Form 7 plugin.
* Version: 1.0
* Copyright: 2022
* Text Domain: success-fail-popup-message-for-contact-form-7
* Domain Path: /languages 
*/


if (!defined('ABSPATH')) {
    die('-1');
}

// define for plugin file
define('SFPMCF7_PLUGIN_FILE', __FILE__);

// define for base name
define('SFPMCF7_BASE_NAME', plugin_basename( SFPMCF7_PLUGIN_FILE ));

// define for plugin dir path
define('SFPMCF7_PLUGIN_DIR', plugins_url('', __FILE__));

// Include function files
include_once('main/backend/success_fail_popup_options.php');
include_once('main/frontend/success_fail_submit_popup_settings.php');
include_once('main/resources/success-fail-popup-installation-require.php');
include_once('main/resources/success-fail-popup-language.php');
include_once('main/resources/success-fail-popup-load-js-css.php');