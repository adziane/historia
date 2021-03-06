<?php $title = $GLOBALS['lang']['sharing_index_title'] ?>

<p><?php printf($GLOBALS['lang']['sharing_index_p_1'], count($sharings)) ?></p>

<table width="100%" border="1px">
    <thead>
        <th><?= $GLOBALS['lang']['date'] ?></th>
        <th><?= $GLOBALS['lang']['archive'] ?></th>
        <th><?= $GLOBALS['lang']['user'] ?></th>
        <th><?= $GLOBALS['lang']['share'] ?></th>
    </thead>
    <tbody>
    <?php foreach ($sharings as $sharing) : ?>
        <tr>
            <td>
                <center><?= $sharing['d_datetime_demande'] ?></center>
            </td>
            <td>
                <center><?= $sharing['d_fk_archive_reference'] ?></center>
            </td>
            <td>
                <center><?= $sharing['u_pseudo'] ?></center>
            </td>
            <td>
                <center>
                    <a href="/historia/sharing/share/<?= $sharing['d_jeton'] . "?lang={$GLOBALS['i18n']}" ?>"><?= $GLOBALS['lang']['share'] ?></a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
        <th><?= $GLOBALS['lang']['date'] ?></th>
        <th><?= $GLOBALS['lang']['archive'] ?></th>
        <th><?= $GLOBALS['lang']['user'] ?></th>
        <th><?= $GLOBALS['lang']['share'] ?></th>
    </tfoot>
</table>
