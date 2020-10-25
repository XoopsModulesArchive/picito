<?php

require dirname(__DIR__, 3) . '/include/cp_header.php';
require dirname(__DIR__) . '/language/' . $xoopsConfig['language'] . '/main.php';
require dirname(__DIR__) . '/include/functions.php';

xoops_cp_header();

$settings = getSettings($xoopsModule->getVar('dirname'));
?>

    <form action="update.php" method="post">
        <table cellpadding="0" cellspacing="1" class="outer" width="100%">
            <tr>
                <td class="head"><?php print _LANG_XOOPS_PICITO_21_; ?></td>
            </tr>
        </table>
        <br>
        <table cellpadding="0" cellspacing="1" class="outer" width="100%">
            <tr>
                <td class="odd" width="200"><?php print _LANG_XOOPS_PICITO_23_; ?>:</td>
                <td class="odd">
                    <input type="text" value="<?php print $settings['title']; ?>" name="title">
                </td>
            </tr>
            <tr>
                <td class="odd" valign="top"><?php print _LANG_XOOPS_PICITO_24_; ?>:</td>
                <td class="odd">
                    <textarea name="intro"><?php print $settings['intro']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="odd" valign="top"><?php print _LANG_XOOPS_PICITO_25_; ?>:</td>
                <td class="odd">
                    <input type="text" value="<?php print $settings['button']; ?>" name="button">
                </td>
            </tr>

            <tr>
                <td class="odd" valign="top"><?php print _LANG_XOOPS_PICITO_26_; ?>:</td>
                <td class="odd">
                    <input type="checkbox" name="jpg"<?php if (!empty($settings['jpg'])) {
    print ' checked';
} ?>> JPG <br>
                    <input type="checkbox" name="gif"<?php if (!empty($settings['gif'])) {
    print ' checked';
} ?>> GIF <br>
                    <input type="checkbox" name="png"<?php if (!empty($settings['png'])) {
    print ' checked';
} ?>> PNG <br>
                </td>
            </tr>
            <tr>
                <td class="odd" valign="top"><?php print _LANG_XOOPS_PICITO_27_; ?>:</td>
                <td class="odd">
                    <input type="text" value="<?php print $settings['resize']; ?>" name="resize"> px
                </td>
            </tr>
            <tr>
                <td class="odd" valign="top"><?php print _LANG_XOOPS_PICITO_28_; ?>:</td>
                <td class="odd">
                    <input type="text" value="<?php print $settings['thumbw']; ?>" name="thumbw"> px
                </td>
            </tr>
            <tr>
                <td class="odd" valign="top"><?php print _LANG_XOOPS_PICITO_29_; ?>:</td>
                <td class="odd">
                    <input type="text" value="<?php print $settings['thumbh']; ?>" name="thumbh"> px
                </td>
            </tr>
            <tr>
                <td class="odd" valign="top"><?php print _LANG_XOOPS_PICITO_30_; ?>:</td>
                <td class="odd">
                    <input type="text" value="<?php print $settings['border']; ?>" name="border"> px
                </td>
            </tr>
            <tr>
                <td class="odd" valign="top"><?php print _LANG_XOOPS_PICITO_31_; ?>:</td>
                <td class="odd">
                    <input type="text" value="<?php print $settings['bordercolor']; ?>" name="bordercolor">
                    <em>(#000000 = black)</em>
                </td>
            </tr>
            <tr>
                <td class="odd" valign="top"><?php print _LANG_XOOPS_PICITO_32_; ?>:</td>
                <td class="odd">
                    <input type="text" value="<?php print $settings['maxsize']; ?>" name="maxsize"> KB
                </td>
            </tr>
            <tr>
                <td class="odd" valign="top"><?php print _LANG_XOOPS_PICITO_33_; ?>:</td>
                <td class="odd">
                    <input type="text" value="<?php print $settings['quality']; ?>" name="quality"> %
                </td>
            </tr>
            <tr>
                <td class="odd">&nbsp;</td>
                <td class="odd"><input type="submit" value="<?php print _LANG_XOOPS_PICITO_22_; ?>"></td>
            </tr>
        </table>
    </form>

<?php
xoops_cp_footer();
?>
