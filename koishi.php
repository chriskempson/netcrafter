<?php
/**
 * Koishi v1.0 - A minimalist way of building hand-written websites
 * https://github.com/chriskempson/koishi
 */
 
// Feel free to change any of the settings below to your liking. 
// All paths should be defined with trailing slashes
define ('root', $_SERVER['DOCUMENT_ROOT'] . '/../');
define ('partials', root . 'partials/');
define ('plugins', root . 'plugins/');

// Load all plugin files. Plugins must follow the convention
// PLUGIN_PATH/plugin_folder/plugin.php.
foreach (glob(plugins . '*/plugin.php') as $filename) 
{
    include $filename;
}