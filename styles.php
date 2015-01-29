<?php
// First of all send css header
header("Content-type: text/css");

// Array of css files
$path = dirname(__FILE__) . '/assets/stylesheet/';
$css = array(
    'fonts.css',
    'preloader.css',
    'styles.css',

    'header.css',
    'portfolio.css',

    'small.css',
    'normal.css',
    'large.css',

    'navigation.css',
    'wwd.css',
    'intermission.css',
    'contact.css',
    'animation.css',

    'jquery.FlowupLabels.css'
);

$output = array();

// Loop the css Array
foreach ($css as $css_file) {

    // Load the content of the css file
    $output[] = file_get_contents($path . $css_file);
}

require_once dirname(__FILE__) . '/3rdparty/minify/cssmin.php';

echo CssMin::minify(implode('', $output));