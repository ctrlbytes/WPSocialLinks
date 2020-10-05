<?php defined('WPINC') ?: die(); ?>
<?php

class SocialLinks
{
    private $social_links_options;

    public function __construct()
    {
        add_action('admin_menu', array($this, 'social_links_add_plugin_page'));
        add_action('admin_init', array($this, 'social_links_page_init'));
    }

    public function social_links_add_plugin_page()
    {
        add_menu_page(
            'Social Links', // page_title
            'Social Links', // menu_title
            'manage_options', // capability
            'cbwp_social_links', // menu_slug
            array($this, 'social_links_create_admin_page'), // function
            'dashicons-admin-links', // icon_url
            3 // position
        );
    }

    public function social_links_create_admin_page()
    {
        $this->social_links_options = get_option('cbwp_social_links'); ?>

        <div class="wrap">
            <h2>Social Links</h2>
            <p>
                By <a href="https://ctrlbytes.com" target="_blank">CtrlBytes</a>
            </p>
            <?php settings_errors(); ?>

            <form method="post" action="options.php">
                <?php
                settings_fields('social_links_option_group');
                do_settings_sections('social-links-admin');
                submit_button();
                ?>
            </form>
        </div>
    <?php }

    public function social_links_page_init()
    {
        register_setting(
            'social_links_option_group', // option_group
            'cbwp_social_links', // option_name
            array($this, 'social_links_sanitize') // sanitize_callback
        );

        add_settings_section(
            'social_links_setting_section', // id
            'Settings', // title
            array($this, 'social_links_section_info'), // callback
            'social-links-admin' // page
        );

        add_settings_field(
            'facebook', // id
            'Facebook', // title
            array($this, 'facebook_callback'), // callback
            'social-links-admin', // page
            'social_links_setting_section' // section
        );

        add_settings_field(
            'twiiter', // id
            'Twiiter', // title
            array($this, 'twiiter_callback'), // callback
            'social-links-admin', // page
            'social_links_setting_section' // section
        );

        add_settings_field(
            'instagram', // id
            'Instagram', // title
            array($this, 'instagram_callback'), // callback
            'social-links-admin', // page
            'social_links_setting_section' // section
        );

        add_settings_field(
            'youtube', // id
            'Youtube', // title
            array($this, 'youtube_callback'), // callback
            'social-links-admin', // page
            'social_links_setting_section' // section
        );

        add_settings_field(
            'linkedin', // id
            'LinkedIn', // title
            array($this, 'linkedin_callback'), // callback
            'social-links-admin', // page
            'social_links_setting_section' // section
        );

        add_settings_field(
            'whatsapp', // id
            'Whatsapp', // title
            array($this, 'whatsapp_callback'), // callback
            'social-links-admin', // page
            'social_links_setting_section' // section
        );
    }

    public function social_links_sanitize($input)
    {
        $sanitary_values = array();
        if (isset($input['facebook'])) {
            $sanitary_values['facebook'] = sanitize_text_field($input['facebook']);
        }

        if (isset($input['twiiter'])) {
            $sanitary_values['twiiter'] = sanitize_text_field($input['twiiter']);
        }

        if (isset($input['instagram'])) {
            $sanitary_values['instagram'] = sanitize_text_field($input['instagram']);
        }

        if (isset($input['youtube'])) {
            $sanitary_values['youtube'] = sanitize_text_field($input['youtube']);
        }

        if (isset($input['linkedin'])) {
            $sanitary_values['linkedin'] = sanitize_text_field($input['linkedin']);
        }

        if (isset($input['whatsapp'])) {
            $sanitary_values['whatsapp'] = sanitize_text_field($input['whatsapp']);
        }

        return $sanitary_values;
    }

    public function social_links_section_info()
    {
    ?>
        <p>
            Config Social Links for your site.
        </p>
<?php
    }

    public function facebook_callback()
    {
        printf(
            '<input class="regular-text" type="text" name="cbwp_social_links[facebook]" id="facebook" value="%s">',
            isset($this->social_links_options['facebook']) ? esc_attr($this->social_links_options['facebook']) : ''
        );
    }

    public function twiiter_callback()
    {
        printf(
            '<input class="regular-text" type="text" name="cbwp_social_links[twiiter]" id="twiiter" value="%s">',
            isset($this->social_links_options['twiiter']) ? esc_attr($this->social_links_options['twiiter']) : ''
        );
    }

    public function instagram_callback()
    {
        printf(
            '<input class="regular-text" type="text" name="cbwp_social_links[instagram]" id="instagram" value="%s">',
            isset($this->social_links_options['instagram']) ? esc_attr($this->social_links_options['instagram']) : ''
        );
    }

    public function youtube_callback()
    {
        printf(
            '<input class="regular-text" type="text" name="cbwp_social_links[youtube]" id="youtube" value="%s">',
            isset($this->social_links_options['youtube']) ? esc_attr($this->social_links_options['youtube']) : ''
        );
    }

    public function linkedin_callback()
    {
        printf(
            '<input class="regular-text" type="text" name="cbwp_social_links[linkedin]" id="linkedin" value="%s">',
            isset($this->social_links_options['linkedin']) ? esc_attr($this->social_links_options['linkedin']) : ''
        );
    }

    public function whatsapp_callback()
    {
        printf(
            '<input class="regular-text" type="text" name="cbwp_social_links[whatsapp]" id="whatsapp" value="%s">',
            isset($this->social_links_options['whatsapp']) ? esc_attr($this->social_links_options['whatsapp']) : ''
        );
    }
}
