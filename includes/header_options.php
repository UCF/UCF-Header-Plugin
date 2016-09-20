<?php
// create custom plugin settings menu
add_action('admin_menu', 'ucf_header_plugin_menu');

function ucf_header_plugin_menu()
{
    add_options_page(
        'UCF Header Plugin',
        'UCF Header Plugin Options',
        'manage_options',
        'UCF-Header-plugin',
        'UCF_Header_plugin_options_page'
    );
}

function UCF_Header_plugin_options_page()
{
    ?>
        <div class="wrap">
            <h2>UCF Header Plugin Options</h2>
            <form method="post" action="header_options.php">
            <?php settings_fields('headeroptions-group'); ?>
            <?php do_settings_sections('headeroptions-group'); ?>
            <?php submit_button(); ?>
            </form>
        </div>
    <?php
}
?>

