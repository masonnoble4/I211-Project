<?php
/**
 * Author: Karen Bonilla
 * Date: 12/4/2019
 * File: inventory_header.class.php
 * Description:
 */

class InventoryHeader
{
    //this method displays the page header
    static public function displayHeader($page_title) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title> <?php echo $page_title ?> </title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <link rel='shortcut icon' href='<?= BASE_URL ?>/www/img/favicon.ico' type='image/x-icon' />
            <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/application.css' />
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
        <div id="top"></div>
        <div id='wrapper'>
        <div id="banner">
            <div class = "nav">
                <ul id = "nav_ul">
                    <li class = "nav_li"><a href = '<?= BASE_URL ?>/welcome/index/' ?>HOME</a></li>
                    <li class = "nav_li right"><a href = '<?= BASE_URL ?>/car/index' />CAR INVENTORY</a></li>
                </ul>

                <h1 id = header_design>
                    <span id = "special">Cars Galore: </span>
                    <span>Car Inventory</span>
                </h1>

            </div>
            <div class = "extra">&nbsp;</div>
        </div>
        <?php
    }//end of displayHeader function

    //this method displays the page footer
    public static function displayFooter() {
        ?>
        <br><br><br>
<!--       <div id="push"></div>-->
      </div>
        <div id="footer"><br>&copy 2019 Cars Galore Inventory. All Rights Reserved.</div>
        <script type="text/javascript" src="<?= BASE_URL ?>/www/js/auto_suggestion.js"></script>
        </body>
        </html>
        <?php
    } //end of displayFooter function

}