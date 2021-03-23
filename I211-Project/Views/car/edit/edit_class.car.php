<?php
/**
 * Author: Karen Bonilla
 * Date: 12/12/2019
 * File: edit_car.class.php
 * Description:
 */
class EditCar extends HomeHeader
{
    public function display($car) {
        //display page header
        parent::displayHeader("Edit Car");
        //get movie ratings from a session variable
        if (isset($_SESSION['car_ratings'])) {
            $ratings = $_SESSION['car_ratings'];
        }
        //retrieve car details by calling get methods
        $id = $car->getId();
        $make = $car->getMake();
        $model = $car->getModel();
        $price = $car->getPrice();
        $year = $car->getYear();
        $color = $car->getColor();
        $mileage = $car->getMileage();
        $image = $car->getImage();


        if (isset($_POST['make']) && isset($_POST['model']) && isset($_POST['price']) && isset($_POST['year']) && isset($_POST['color']) && isset($_POST['mileage'])) {
            $make = $_POST['make'];
            $model = $_POST['model'];
            $price = $_POST['price'];
            $year = $_POST['year'];
            $color = $_POST['color'];
            $mileage = $_POST['mileage'];
            $image = $_POST['image'];
            //echo $make;
            try {
                if(trim($make) ==""){
                    throw new Error("Missing input in make field");
                }
                if(trim($model) ==""){
                    throw new Error("Missing input in model field");
                }
                if(trim($price) ==""){
                    throw new Error("Missing input in price field");
                }
                if(trim($year) ==""){
                    throw new Error("Missing input in year field");
                }
                if(trim($color) ==""){
                    throw new Error("Missing input in color field");
                }
                if(trim($mileage) ==""){
                    throw new Error("Missing input in mileage field");
                }

                if(!is_numeric($price)) {
                    throw new Error("Price must me an integer");
                }
                if(!is_numeric($year)) {
                    throw new Error("Year must me an integer");
                }
                if(!is_numeric($mileage)) {
                    throw new Error("Mileage must me an integer");
                }


                $edit = new CarController();
                echo "<br><p style='color: red'>Update to records was successful</p>";
                $edit->update($id, $make, $model, $price, $year, $color, $mileage, $image);
            }catch (Error $e){
                $message = $e->getMessage();
                echo "<br><p style='color: red'>$message</p>";
            }
        }
        //echo $make;
        ?>

        <div id="main-header">Edit Car Details</div>

        <!-- display movie details in a form -->
        <form class="new-media"  action='' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
            <input type="hidden" name="id" value="<?= $id ?>">
            <p><strong>Make </strong>: <input name="make" value="<?= $make ?>" required=""></p>
            <p><strong>Model</strong>: <input name="model" value="<?= $model ?>" required=""></p>
            <p><strong>Price</strong>: <input name="price" value="<?= $price ?>" required=""></p>
            <p><strong>Year</strong>: <input name="year" value="<?= $year ?>" required=""></p>
            <p><strong>Color</strong>: <input name="color" value="<?= $color ?>" required=""></p>
            <p><strong>Mileage</strong>: <input name="mileage" value="<?= $mileage ?>" required=""></p>
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