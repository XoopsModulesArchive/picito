<?php

require dirname(__DIR__, 2) . '/mainfile.php';
$GLOBALS['xoopsOption']['template_main'] = 'index.html';

require XOOPS_ROOT_PATH . '/header.php';
require __DIR__ . '/include/functions.php';

$settings = getSettings($xoopsModule->getVar('dirname'));

$xoopsTpl->assign('moduletitle', $settings['title']);
$xoopsTpl->assign('introtext', $settings['intro']);
$xoopsTpl->assign('upbutton', $settings['button']);

require XOOPS_ROOT_PATH . '/footer.php';
