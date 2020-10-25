<?php

require dirname(__DIR__, 2) . '/mainfile.php';

require XOOPS_ROOT_PATH . '/header.php';
require __DIR__ . '/include/functions.php';
require __DIR__ . '/include/gd.class.php';

$settings = getSettings($xoopsModule->getVar('dirname'));

$allowed = [];

if (!empty($settings['png'])) {
    $allowed[] = 'image/x-png';

    $allowed[] = 'image/png';
}

if (!empty($settings['gif'])) {
    $allowed[] = 'image/gif';
}

if (!empty($settings['jpg'])) {
    $allowed[] = 'image/pjpeg';

    $allowed[] = 'image/jpeg';
}

if (isset($_POST['submit'])) {
    if (0 === $_FILES['file']['size']) {
        redirect_header('index.php', 1, _LANG_XOOPS_PICITO_01_);

        die();
    } elseif ($_FILES['file']['size'] > ($settings['maxsize'] * 1024)) {
        $errormsg = _LANG_XOOPS_PICITO_02_ . ' ' . $settings['maxsize'] . ' KB.';

        redirect_header('index.php', 1, $errormsg);

        die();
    } elseif (!in_array($_FILES['file']['type'], $allowed, true)) {
        redirect_header('index.php', 1, _LANG_XOOPS_PICITO_03_);

        die();
    }

    $ext = GetFileExt($_FILES['file']['name']);

    $gen = generateName(20);

    $origi = $gen . $ext;

    $thumb = $gen . '_thumb' . $ext;

    $uproot = XOOPS_ROOT_PATH . '/uploads/';

    $path = $uproot . $origi;

    if (!move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
        redirect_header('index.php', 1, _LANG_XOOPS_PICITO_04_);

        die();
    }

    $gd = new GD($path);

    $gd->resize($settings['thumbw'], $settings['thumbh']);

    $gd->add_border($settings['border'], $settings['bordercolor']);

    $path2 = $uproot . $thumb;

    $gd->save($path2, $settings['quality'] . '%');

    if (!empty($settings['resize'])) {
        $gd = new GD($path);

        $gd->resize($settings['resize'], $settings['resize']);

        $gd->add_border($settings['border'], $settings['bordercolor']);

        $gd->save($path, $settings['quality'] . '%');
    }

    $sql = 'INSERT INTO ' . $xoopsDB->prefix('image_uploads') . " 
		(filename, filesize, date, time, filetype, ip, tags) VALUES (
		'$origi',
		'" . $_FILES['file']['size'] . "',
		'" . date('Y-m-d') . "',
		'" . date('H:i:s') . "',
		'" . $_FILES['file']['type'] . "',
		'" . $_SERVER['REMOTE_ADDR'] . "',
		'none')";

    $xoopsDB->query($sql);

    redirect_header('show.php?img=' . $origi, 1, _LANG_XOOPS_PICITO_05_);
}

require XOOPS_ROOT_PATH . '/footer.php';
