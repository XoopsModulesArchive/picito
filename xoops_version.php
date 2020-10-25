<?php

$modversion['name'] = 'Picito';
$modversion['version'] = 2.0;
$modversion['description'] = 'Image uploader for Xoops.';
$modversion['credits'] = 'Astro';
$modversion['license'] = 'GPL';
$modversion['official'] = 0;
$modversion['image'] = 'logo.png';
$modversion['dirname'] = 'picito';
$modversion['author'] = 'Astro - www.rapscena.com';

$modversion['hasMain'] = 1;
$modversion['hasAdmin'] = 1;

$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';

$modversion['tables'][0] = 'image_uploads';

$modversion['templates'][1]['file'] = 'index.html';
$modversion['templates'][1]['description'] = 'Upload form.';
$modversion['templates'][2]['file'] = 'showpic.html';
$modversion['templates'][2]['description'] = 'Show information of uploaded image.';
