<?php 
/**
 * Plugin Name:         Res pop-up
 * Plugin URI:          https://neoslab.online
 * Description:         plugin para pop up
 * Version:             1.0.0
 * Author:              Neos Lab
 * Author URI:          https://newtheme.eu
 * License:             GPL2
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         pop-up
 * Domain Path:         /languages
 */

// When activate plugin.

register_activation_hook(__FILE__, 'res_install');

function res_install() {
    require_once 'activador.php';
}

// When desactivation plugin
register_deactivation_hook(__FILE__, 'res_desactivador');

function res_desactivador() {
    flush_rewrite_rules();
}

// Menu options.

require_once 'partials/res-menu.php';