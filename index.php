<?php
/**
 * @author Grzegorz Gurzeda
 */


// veSwew0qg9
$config = array(
    'root_path' => dirname(__FILE__) . '/',
);

// eTAG cache
/**
$file = 'myfile.php';
$last_modified_time = filemtime($file);
$etag = md5_file($file);

header("Last-Modified: ".gmdate("D, d M Y H:i:s", $last_modified_time)." GMT");
header("Etag: $etag");
/**/

// TODO: MOVE TO Autoloader
require_once $config['root_path'] . '3rdparty/phptal/PHPTAL.php';

// Lets initialize PHPTAL
$template = new PHPTAL('application/templates/landing.xhtml');
if ($_GET['module'] == 'homepage')
{
    session_start();

    // TRANSLATION
    require_once $config['root_path'] . '3rdparty/phptal/PHPTAL/GetTextTranslator.php';
    $tr = new PHPTAL_GetTextTranslator();
    $tr->setLanguage('pl_PL.utf8', 'pl_PL');
    $tr->addDomain('nod.agency', dirname(__FILE__) . '/i18n/');
    $tr->useDomain('nod.agency');

    $template = new PHPTAL('application/templates/homepage.xhtml');

    $template->setTranslator($tr);

    $template->core = array(
        'session' => $_SESSION,
    );
}
/**/
if (!empty($_GET['t']))
{
    session_start();

    // TRANSLATION
    require_once $config['root_path'] . '3rdparty/phptal/PHPTAL/GetTextTranslator.php';
    $tr = new PHPTAL_GetTextTranslator();
    $tr->setLanguage('pl_PL.utf8', 'pl_PL');
    $tr->addDomain('nod.agency', dirname(__FILE__) . '/i18n/');
    $tr->useDomain('nod.agency');

    $template = new PHPTAL('application/templates/layout.xhtml');

    $template->setTranslator($tr);

    $template->core = array(
        'session' => $_SESSION,
    );
}
/**/
$template->setOutputMode(PHPTAL::HTML5);

$template->meta = array(
    'title' => 'New Order Design Agency - Coming soon',
);

echo $template->execute();