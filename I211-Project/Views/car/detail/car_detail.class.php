<?php
/**
 * Author: Karen Bonilla
 * Date: 12/5/2019
 * File: car_detail.class.php
 * Description:
 */

class CarDetail extends CarIndexView
{
    public function display($car, $confirm = "") {
        //display page header
        parent::displayHeader("Display Car Details");

        //retrieve movie details by calling get methods
        $id = $car->getId();
        $make = $car->getMake();
        $model = $car->getModel();
        $price = $car->getPrice();
        $year = $car->getYear();
        $color = $car->getColor();
        $mileage = $car->getMileage();
        $image = $car->getImage();

        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . CAR_IMG . $image;
        }
        ?>

        <div id="main-header">Car Details</div>
        <hr>
        <!-- display movie details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= $image ?>" alt="<?= $model ?>" />
                </td>
                <td style="width: 130px;">
                    <p style="color:white"><strong>Make:</strong></p>
                    <p style="color:white"><strong>Model:</strong></p>
                    <p style="color:white"><strong>Price:</strong></p>
                    <p style="color:white"><strong>Year:</strong></p>
                    <p style="color:white"><strong>Color:</strong></p>
                    <p style="color:white"><strong>Mileage:</strong></p>
                    <br>
                    <br>
                    <br>
                    <div id="button-group">
                        <input type="button" id="edit-button" value="   Edit   "
                               onclick="window.location.href = '<?= BASE_URL ?>/car/edit/<?= $id ?>'">&nbsp;
                        <input type="button" id="edit-button" value="   Delete   "
                               onclick="window.location.href = '<?= BASE_URL ?>/car/delete/<?= $id ?>'">&nbsp;
                    </div>
                </td>
                <td>
                    <p style="color:white"><?= $make ?></p>
                    <p style="color:white"><?= $model?></p>
                    <p style="color:white"><?= $price ?></p>
                    <p style="color:white"style="color:white"><?= $year?></p>
                    <p style="color:white"><?= $color ?></p>
                    <p style="color:white"><?= $mileage ?></p>
<!--                    <p class="media-description">--><?//= $description ?><!--</p>-->
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>
        <a href="<?= BASE_URL ?>/car/index">Go to car list</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method


}