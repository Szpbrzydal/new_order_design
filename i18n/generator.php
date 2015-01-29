<?php
/**
 * Created by PhpStorm.
 * User: grzegorzgurzeda
 * Date: 27/09/14
 * Time: 01:14
 */

$filename = dirname(__FILE__) . '/../application/templates/layout.xhtml';
$filename = file_get_contents($filename);
$filename = str_replace('<!doctype html>', '', $filename);
$dom = new DOMDocument;
$dom->loadXML($filename);

$xpath = new DOMXPath($dom);

$elements = array();

foreach ($xpath->query('//@i18n:translate') as $v)
{
    $output = '';
    foreach ($v->parentNode->childNodes as $childNode)
    {
        $output .= $childNode->ownerDocument->saveXml($childNode);
    }

    $elements[] = $output;
}

$output = '';

foreach ($elements as $element)
{
    $output .= 'msgid "' . str_replace('"', '\"', $element) . '"
msgstr "' . str_replace('"', '\"', $element) . '"' . "\n\n";
}

$output_filename = dirname(__FILE__) . '/pl_PL/LC_MESSAGES/nod.agency.po';
$output_filename_binary = dirname(__FILE__) . '/pl_PL/LC_MESSAGES/nod.agency.mo';

if (!file_exists($output_filename))
    file_put_contents($output_filename, $output);

require_once dirname(__FILE__) . '/../3rdparty/php_mo/php_mo.php';

phpmo_convert($output_filename, $output_filename_binary);