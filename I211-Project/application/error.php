<?php
/**
 * Author: Mason Noble
 * Date: 12/13/2019
 * File: error.php
 * Description:
 */

CarIndexView::displayHeader("Error was encountered");
?>
    <div id = "main-header">Error</div>
    <hr>
    <table style = "width: 100%; border: none">
        <tr>
            <td style = "vertical-align: middle; text-align: center; width:100px">
            </td>
            <td style = "text-align: left; vertical-align: top;">
                <h3> Sorry, but an error has occurred.</h3>
                <div style = "color: red">
                    <?= urldecode($message)
                    ?>
                </div>
                <a href="<?= BASE_URL ?>/welcome/index">Back to home page</a>
                <br>
            </td>
        </tr>
    </table>

<?php
CarIndexView::displayFooter();