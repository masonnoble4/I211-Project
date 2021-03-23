<?php
/**
 * Author: Karen Bonilla
 * Date: 12/12/2019
 * File: edit_car.class.php
 * Description:
 */

class EditCar extends CarIndexView
{
    public function display($car) {
        //display page header
        parent::displayHeader("Edit Car");

        //get movie ratings from a session variable
        if (isset($_SESSION['car_ratings'])) {
            $ratings = $_SESSION['car_ratings'];
        }

        //retrieve movie details by calling get methods
        $id = $car->getId();
        $make = $car->getMake();
        $model = $car->getModel();
        $price = $car->getPrice();
        $year = $car->getYear();
        $color = $car->getColor();
        $mileage = $car->getMileage();
        $image = $car->getImage();
        ?>

        <div id="main-header">Edit Car Details</div>

        <!-- display movie details in a form -->
        <form class="new-media"  action='<?= BASE_URL . "/car/update/" . $id ?>' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
            <input type="hidden" name="id" value="<?= $id ?>">
            <p><strong>Make </strong>: <input name="make" type="text" value="<?= $make ?>" required=""></p>
            <p><strong>Model</strong>: <input name="model" type="text" value="<?= $model ?>" required=""></p>
            <p><strong>Price</strong>: <input name="release_date" type="number" value="<?= $price ?>" required=""></p>
            <p><strong>Year</strong>: <input name="release_date" type="number" value="<?= $year ?>" required=""></p>
            <p><strong>Color</strong>: <input name="release_date" type="text" value="<?= $color ?>" required=""></p>
            <p><strong>Mileage</strong>: <input name="release_date" type="number" value="<?= $mileage ?>" required=""></p>
            <p><strong>Image</strong>: url (http:// or https://) or local file including path and file extension<br>
                <input name="image" type="text" size="100" value="<?= $image ?>"></p>
            <input type="submit" name="action" value="Update Car">
            <input type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/car/detail/" . $id ?>"'>
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }
}