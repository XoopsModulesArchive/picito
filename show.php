<?php

require dirname(__DIR__, 2) . '/mainfile.php';
$GLOBALS['xoopsOption']['template_main'] = 'showpic.html';

require XOOPS_ROOT_PATH . '/header.php';
require __DIR__ . '/include/functions.php';

$sql = 'SELECT * FROM ' . $xoopsDB->prefix('image_uploads') . " 
WHERE filename = '" . addslashes($_GET['img']) . "' LIMIT 1";

$result = $xoopsDB->query($sql);
$rows = $xoopsDB->getRowsNum($result);
$result = $xoopsDB->fetchArray($result);

if ($rows < 1) {
    redirect_header('index.php', 1, _LANG_XOOPS_PICITO_06_);

    die();
}

$settings = getSettings($xoopsModule->getVar('dirname'));

$xoopsTpl->assign('imagename', $_GET['img']);
$xoopsTpl->assign('viewing', _LANG_XOOPS_PICITO_07_);
$xoopsTpl->assign('imageurl', XOOPS_URL . '/uploads/' . $_GET['img']);
$xoopsTpl->assign('imagethumb', XOOPS_URL . '/uploads/' . returnThumb($_GET['img']));
$xoopsTpl->assign('filename', _LANG_XOOPS_PICITO_08_);
$xoopsTpl->assign('filesize', _LANG_XOOPS_PICITO_09_);
$xoopsTpl->assign('datetime', _LANG_XOOPS_PICITO_10_);
$xoopsTpl->assign('realsize', ShowFileSize($result['filesize']));
$xoopsTpl->assign('realdate', formatDate($result['date']));
$xoopsTpl->assign('bbcode', _LANG_XOOPS_PICITO_11_);
$xoopsTpl->assign('html', _LANG_XOOPS_PICITO_12_);
$xoopsTpl->assign('backhome', _LANG_XOOPS_PICITO_13_);

require XOOPS_ROOT_PATH . '/footer.php';
