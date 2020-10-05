<?php

/**
 * Plugin Name: WP Social Links
 * Plugin URI: https://github.com/ctrlbytes/WPSocialLinks
 * Description: Add Social Links for wordpress your site.
 * Version: 1.0
 * Author: CtrlBytes
 * Author URI: https://ctrlbytes.com/
 **/

defined('WPINC') ?: die();

require __DIR__ . "/inc/class-social-links.php";

if (is_admin())
    $social_links = new SocialLinks();
