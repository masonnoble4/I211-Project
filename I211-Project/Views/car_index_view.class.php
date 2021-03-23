<?php
/*
 * Author: Louie Zhu
 * Date: Mar 6, 2019
 * Name: movie_index_view.class.php
 * Description: the parent class that displays a search box.
 * The javascript variable media specifies the media type. This variable is needed for auto suggestion.
 */

//Todo: Should extend whatever the main index view class is named. Change if necessary.
class CarIndexView extends InventoryHeader
{
    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <script>
            //type
            var name = "car";
        </script>
        <!--create the search bar -->
        <script type="text/javascript" src="<?= BASE_URL ?>/www/js/auto_suggestion.js"></script>
        <div id="searchbar">
            <!-- TODO: Is the restful URL listing it as cars or car? -->
            <form method="get" action="<?= BASE_URL ?>/car/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search cars by name" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" value="Go" />
            </form>
            <div id="suggestionDiv"></div>
        </div>
        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }
}
