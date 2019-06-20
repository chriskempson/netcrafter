<?php
/**
 * Koishi v1.0 - Minimalist hand-written HTML websites
 * https://github.com/chriskempson/koishi
 */
 
// **** CONFIG **************************************************************
// Feel free to change any of the settings below to your liking
// All paths should be defined with trailing slashes

define ('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
define ('PARTIAL_PATH', DOCUMENT_ROOT . 'partials/');
define ('PLUGIN_PATH', DOCUMENT_ROOT . 'plugins/');

// **** HELPER FUNCTIONS ****************************************************
// These functions are exposed by Koishi to help you build your website

/**
* Includes a partial file
*
* A partial file is a piece of HTML that makes up a page e.g the header, 
* navigation and footer could all be partials. The file will be included
* from the PARTIAL_PATH as defined at the top of koishi.php and should be
* a PHP file.
*
* @param string $name Name of the file minus the ".php"
*/
function partial($name, $variables = null)
{
	// Make variables available to include's scope
	if (is_array($variables)) extract($variables);

	include PARTIAL_PATH . $name . '.php';
}

/**
* Reads a file and returns any values to be added to the store via the set()
* function.
*
* @param string $file Path to the file making use of the set() function
*
* @return array A list of all the setings found by key and value
*/
function meta_from_file($file)
{
	$meta = null;
	if (file_exists($file)) include $file;
	return $meta;
}

// **** PLUGINS *************************************************************
// Plugins must follow the convention plugin_path/plugin_folder/plugin.php
// Any plugin that outputs text must return text not echo it.
foreach (glob(PLUGIN_PATH . '*/plugin.php') as $filename) 
{
    include $filename;
}
