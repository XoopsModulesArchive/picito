<?php

require dirname(__DIR__, 3) . '/include/cp_header.php';
require dirname(__DIR__) . '/language/' . $xoopsConfig['language'] . '/main.php';
require dirname(__DIR__) . '/include/functions.php';

if ($_GET['id']) {
    $sql = 'SELECT * FROM ' . $xoopsDB->prefix('image_uploads') . " 
	WHERE id='" . $_GET['id'] . "'";

    $result = $xoopsDB->query($sql);

    $result = $xoopsDB->fetchArray($result);

    $filename = $result['filename'];

    unlink(XOOPS_ROOT_PATH . '/uploads/' . $filename);

    unlink(XOOPS_ROOT_PATH . '/uploads/' . returnThumb($filename));

    $sql2 = 'DELETE FROM ' . $xoopsDB->prefix('image_uploads') . "	WHERE filename = '$filename' LIMIT 1";

    $GLOBALS['xoopsDB']->queryF($sql2);

    redirect_header('index.php', 1, _LANG_XOOPS_PICITO_14_);
}
