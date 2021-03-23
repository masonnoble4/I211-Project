<?php
/**
 * Author: Karen Bonilla
 * Date: 12/3/2019
 * File: welcome_index.class.php
 * Description:
 */

class WelcomeIndex extends HomeHeader
{
    public function display() {
        //display page header
        parent::displayHeader("Cars Galore Vehicle Library Home");

        $url = "http://localhost/I211/I211FINALPROJECTDRAFT3-master/Draft2/www/img/luxury_car.gif";

        ?>
        <div id="main-header">Welcome to Cars Galore Vehicle Library!</div>

        <!--        <img src = "--><?// BASE_URL ?><!--/www/img/luxury_car.gif">-->

        <style type="text/css">
            body
            {
                background-image:url('<?php echo $url ?>');
                height: 60%;
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
            }
        </style>
        <!--        <body style = "background-image: url("--><?//= BASE_URL ?><!--/www/img/luxury_car.gif")">-->
        <body>
        <h1 id = "header_design" style = "margin-top: 100px; margin-left: 18%; font-size: 80px;"><em>Cars Galore</em></h1>

        <hr id = "home_line">

        <p id = "home_para">Welcome to Cars Galore Vehicle Inventory! We are here to provide you with all necessary information
            for you to feel knowledgeable and assured about your future car purchases. With our state-of-the-art website
            you will be able to browse different car models and see important information. We also have a rating system that
            can be viewed to further help you narrow down your choices. Please feel free to contact us with any questions, comments,
            or concerns! Happy browsing! </p>

        </body>
        <!--        </body>-->
        <!--<p>This application is designed to demonstrate the popular software design pattern named MVC.
            The application allows for increased knowledge on all sorts of cars from different car brands.
            Helping consumers make informed decisions before purchasing their next vehicle is of utmost importance
            to us. We are here to help! The application is meant to be flexible and extensible.</p>
        <br>
        <table style="border: none; width: 700px; margin: 5px auto">
            <tr>
                <td colspan="2" style="text-align: center"><strong>Major features include:</strong></td>
            </tr>
            <tr>
                <td style="text-align: left">
                    <ul>
                        <li>List all cars</li>
                        <li>Display details of specific cars</li>
                        <li>Update or delete existing cars</li>
                        <li>Add new cars</li>
                    </ul>
                </td>
                <td style="text-align: left">
                    <ul>
                        <li>Search for cars</li>
                        <li>Autosuggestion</li>
                        <li>Filter cars</li>
                        <li>Sort cars</li>
                        <li>Pagination</li>
                    </ul></td>
            </tr>
        </table> -->

        <br>
        <br>

        <?php
        //display page footer
        parent::displayFooter();
    }
}