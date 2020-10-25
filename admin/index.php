<?php

require dirname(__DIR__, 3) . '/include/cp_header.php';
require dirname(__DIR__) . '/language/' . $xoopsConfig['language'] . '/main.php';
require dirname(__DIR__) . '/include/functions.php';

xoops_cp_header();

/*
 * Search for images and print a table
 */

$start   = $_GET['start'] ?? 0;
$eu = ($start - 0);
$limit = 12;
$current = $eu + $limit;
$back = $eu - $limit;
$next = $eu + $limit;

$sql = 'SELECT id FROM ' . $xoopsDB->prefix('image_uploads');
$nume = $xoopsDB->query($sql);
$nume = $xoopsDB->getRowsNum($nume);

$sql = 'SELECT * FROM ' . $xoopsDB->prefix('image_uploads') . " ORDER BY id DESC LIMIT $eu, $limit";
$result = $xoopsDB->query($sql);
?>

    <table cellpadding="0" cellspacing="1" class="outer" width="100%">
        <tr>
            <td class="head"><?php print constant('_LANG_XOOPS_PICITO_15_'); ?></td>
        </tr>
    </table>
    <br>
<?php
print '<table cellpadding="0" cellspacing="1" class="outer" width="100%">';

while (false !== ($row = @$GLOBALS['xoopsDB']->fetchArray($result))) {
    print '<tr>';

    for ($rows = '0'; $rows < '4'; $rows++) {
        if (!empty($row)) {
            ?>
            <td class="odd" align="center" valign="top" width="25%">
                <?php print _LANG_XOOPS_PICITO_17_ . ': ' . ShowFileSize($row['filesize']); ?>
                <br>
                <a href="delete.php?id=<?php print $row['id']; ?>"><?php print _LANG_XOOPS_PICITO_16_; ?></a>
                <br><br>

                <a href="<?php print XOOPS_URL . '/uploads/' . $row['filename']; ?>"
                   target="_blank" title="<?php print htmlspecialchars($row['date'] . ' ' . $row['time'], ENT_QUOTES | ENT_HTML5); ?>"><img
                            src="<?php print XOOPS_URL . '/uploads/' . returnThumb($row['filename']); ?>"
                            alt="Picture"></a>
            </td>
            <?php
        } else {
            print '<td class="odd" width="25%">&nbsp;</td>';
        }

        if ($rows < '3') {
            $row = $GLOBALS['xoopsDB']->fetchArray($result);
        }
    }

    print '</tr>';
}

print '</table>';

// Pagination
print '<p align="center">';

if ($back >= 0) {
    print "<a href=\"?start=$back\">&lt; " . _LANG_XOOPS_PICITO_19_ . '</a>&nbsp;&nbsp;';
}

$i = 0;
$l = 1;
for ($i = 0; $i < $nume; $i += $limit) {
    if ($i != $eu) {
        //print "&nbsp;<a href=\"?start=$i\" style=\"text-decoration: none\">$l</a>";
    } else {
        $all = round($nume / 4);

        print "&nbsp;<strong>( $l )</strong>";
    }

    $l += 1;
}

if ($current < $nume) {
    print "&nbsp;&nbsp;<a href=\"?start=$next\">" . _LANG_XOOPS_PICITO_18_ . ' &gt;</a> ';
}

print '</p>';

/*
 * Include Xoops administration footer
 */

xoops_cp_footer();
?>
