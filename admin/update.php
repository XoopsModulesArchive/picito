<?php

require dirname(__DIR__, 3) . '/include/cp_header.php';
require dirname(__DIR__) . '/language/' . $xoopsConfig['language'] . '/main.php';

$contents = [
    'title' => $_POST['title'],
'intro' => nl2br($_POST['intro']),
'button' => $_POST['button'],
'png' => $_POST['png'],
'gif' => $_POST['gif'],
'jpg' => $_POST['jpg'],
'resize' => $_POST['resize'],
'thumbw' => $_POST['thumbw'],
'thumbh' => $_POST['thumbh'],
'border' => $_POST['border'],
'bordercolor' => $_POST['bordercolor'],
'maxsize' => $_POST['maxsize'],
'quality' => $_POST['quality'],
];

$file = XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/include/config.txt';
$contents = serialize($contents);

$fh = fopen($file, 'wb');
fwrite($fh, $contents);
fclose($fh);

redirect_header('index.php', 1, _LANG_XOOPS_PICITO_20_);
