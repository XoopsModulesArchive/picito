<?php

function getSettings($folder)
{
    $file = XOOPS_ROOT_PATH . '/modules/' . $folder . '/include/config.txt';

    $data = file_get_contents($file);

    $data = unserialize($data);

    return $data;
}

function ShowFileSize($file)
{
    $file_size = $file;

    if ($file_size >= 1073741824) {
        $file_size = round($file_size / 1073741824 * 100) / 100 . 'g';
    } elseif ($file_size >= 1048576) {
        $file_size = round($file_size / 1048576 * 100) / 100 . ' MB';
    } elseif ($file_size >= 1024) {
        $file_size = round($file_size / 1024 * 100) / 100 . ' KB';
    } else {
        $file_size .= 'b';
    }

    return $file_size;
}

function GetFileExt($str)
{
    $ext = mb_strtolower(mb_substr(mb_strrchr($str, '.'), 1));

    $ext = '.' . $ext;

    return $ext;
}

function generateName($length)
{
    $password = '';

    $chars = 'abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789';

    mt_srand((float)microtime() * 1000000);

    for ($i = 0; $i < $length; $i++) {
        $password .= mb_substr($chars, mt_rand() % mb_strlen($chars), 1);
    }

    return $password;
}

function returnThumb($str)
{
    $str = explode('.', $str);

    $str = $str['0'] . '_thumb.' . $str['1'];

    return $str;
}

function formatDate($str)
{
    $str = explode('-', $str);

    $str = array_reverse($str);

    $new = implode('.', $str);

    return $new;
}
