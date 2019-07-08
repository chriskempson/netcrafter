<?php
/**
 * Netcrafter v1.0 - Finger generated HTML!
 * https://github.com/chriskempson/netcrafter
 */
 
// **** CONFIG **************************************************************
// Feel free to change any of the settings below to your liking
// NOTE: All paths should be defined with trailing slashes

define ('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
define ('SCRIPT_FILENAME', $_SERVER['SCRIPT_FILENAME']);
define ('PARTIAL_PATH', DOCUMENT_ROOT . '../partials/');
define ('PLUGIN_PATH', DOCUMENT_ROOT . '../plugins/');

// **** HELPER FUNCTIONS ****************************************************
// These functions are exposed by Netcrafter to help you build your website

/**
* Includes a partial file
*
* A partial file is a piece of HTML that makes up a page e.g the header, 
* navigation and footer could all be partials. The file will be included
* from the PARTIAL_PATH as defined at the top of netcrafter.php and should be
* a PHP file.
*
* @param string $name Name of the file minus the ".php"
*/
function partial($name, $variables = null)
{
    // Make variables available to include()'s scope
    if (is_array($variables)) extract($variables);

    include PARTIAL_PATH . $name . '.php';
}

/**
* Returns the whole meta data array or a single value from the meta data 
* found within the current running script
*
* @param string $name Meta data array index value to return
*
* @return string Returns a single specified value if $name is set
* @return array The whole meta data array
*/
function meta($name = null)
{
    // Only call 'meta_from_file' once
    global $script_meta;
    if (!$script_meta) {
        $script_meta = meta_from_file(SCRIPT_FILENAME);
    }

    if ($name) return $script_meta[$name];
    else return $script_meta;
}

/**
* Returns the whole meta data array or a single value from the meta data 
* found within a specified file. Also includes the file path in the returned aray.
*
* @param string $file Path to a file containing meta tags
*
* @return array A files meta tags plus filename
* @return array The whole meta data array* 
*/
function meta_from_file($file, $name = null)
{
    // Prepend file name
    $file_meta['file'] = $file;

    // Add title tag
    preg_match("/<title>(.*)<\/title>/siU", 
        file_get_contents($file), 
        $title
    );
    if (isset($title[1])) $file_meta['title'] = $title[1];

    // Merge meta arrays
    $file_meta = array_merge($file_meta, get_meta_tags($file));

    if ($name) return $file_meta[$name];
    else return $file_meta;
}

// **** PLUGINS *************************************************************
// Plugins must follow the convention plugin_path/plugin_folder/plugin.php
// Any plugin that outputs text must return text not echo it.
foreach (glob(PLUGIN_PATH . '*/plugin.php') as $filename) 
{
    include $filename;
}

// **** INIT ****************************************************************

// Deliver a 404 if a file doesn't exist when no filename is requested
if (!is_file(DOCUMENT_ROOT . $_SERVER["REQUEST_URI"]. '/index.php')) {
    http_response_code(404);
    die('File ' . $_SERVER["REQUEST_URI"] . '/index.php not found.');
}

// Get the ball rolling with the first partial
partial('html');