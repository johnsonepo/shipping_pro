<?php
/*
Plugin Name: Shipping Pro
Description: This plugin adds shipping functionality to WordPress.
Version: 1.0
Author: Johnson Epo (envoos)
Author URI: https://www.linkedin.com/in/envoos/
Tags: woocommerce, orders, shipment, delivery, real-time map
*/

defined('ABSPATH') || exit;

require_once plugin_dir_path(__FILE__) . 'includes/autoload.php';

$shippo = Shippo::run();
