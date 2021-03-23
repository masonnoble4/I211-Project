<?php
/**
 * Author: Mason Noble
 * Date: 12/4/2019
 * File: add_car.class.php
 * Description:
 */

class AddCar extends HomeHeader
{

    public function display()
    {
        parent::displayHeader('');
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['make']) && isset($_POST['model']) && isset($_POST['price']) && isset($_POST['year']) && isset($_POST['color']) && isset($_POST['mileage'])) {
                $make = $_POST['make'];
                $model = $_POST['model'];
                $price = $_POST['price'];
                $year = $_POST['year'];
                $color = $_POST['color'];
                $mileage = $_POST['mileage'];
                $image = $_POST['image'];

                //echo $make;

                /*echo $make;
                echo $model;
                echo $price;
                echo $year;
                echo $color;
                echo $mileage;
                echo $image;*/
                //echo $make;

                try{
                    if(trim($make) ==""){
                        throw new RequiredValueException("Fatal Error: <br><br><br><br><p style=\"color:red\">Make value is missing.</p>");
                    }
                    if(trim($model) ==""){
                        throw new RequiredValueException("Fatal Error: <br><br><br><br><p style=\"color:red\">Model value is missing.</p>");
                    }
                    if(trim($price) ==""){
                        throw new RequiredValueException("Fatal Error: <br><br><br><br><p style=\"color:red\">Price value is missing.</p>");
                    }
                    if(trim($year) ==""){
                        throw new RequiredValueException("Fatal Error: <br><br><br><br><p style=\"color:red\">Year value is missing.</p>");
                    }
                    if(trim($color) ==""){
                        throw new RequiredValueException("Fatal Error: <br><br><br><br><p style=\"color:red\">Color value is missing.</p>");
                    }
                    if(trim($mileage) ==""){
                        throw new RequiredValueException("Fatal Error: <br><br><br><br><p style=\"color:red\">Mileage value is missing.</p>");
                    }

                    //for fields that should contain numbers
                    if(!is_numeric($price)) {
                        throw new DataTypeException(gettype($price),$price. " in the price field to be an integer");
                    }
                    if(!is_numeric($year)) {
                        throw new DataTypeException(gettype($year),$year. " in the year field to be an integer");
                    }
                    if(!is_numeric($mileage)) {
                        throw new DataTypeException(gettype($mileage),$mileage. " in the mileage field to be an integer");
                    }

                    $addCar = new CarController();
                    echo "<br><br><br><br><br><p style='color: red'>Adding a car was a success</p>";
                    $addCar->addCar($make, $model, $price, $year, $color, $mileage, $image);
                } catch (RequiredValueException $e) {
                    $message = $e->getMessage();
                    echo $message;
                } catch (DataTypeException $e){
                    $message = $e->getMessage();
                    echo $message;
                }
                //generate a JSON object for the result
                //echo $message;
                //$response = array("result" => $result, "message" => $message);
                //echo json_encode($response);



                //echo $createListing;
                //echo $model;

            }
        }

        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <!--<script type="application/javascript" href="js/check_email.js"/>-->
            <meta charset="UTF-8">
            <title>Add Car</title>
            <link type='text/css' rel='stylesheet' href='www/css/application.css' />
            <!--<a href="<?php echo BASE_URL?>/account/admin_mgmt_page" style="display: block; padding: 65px 3px 4px 50%;">Home</a>-->
        </head>
        <body style="background-color: black">

        <div id = "addCar" style="display: block; " >
            <h2 id = "add_header">Add New Vehicle</h2>
        <form method="POST" id = "add_form">
              <br>
        <input name="make" placeholder="Make" value="" class = "add_inputs">
        <br>
        <input  name="model" placeholder="Model" value="" class = "add_inputs">
        <br>
        <input  name="price" placeholder="Price" value="" class = "add_inputs">
        <br>
        <input  name="year" placeholder="Year" value="" class = "add_inputs">
        <br>
        <input  name="color" placeholder="Color" value="" class = "add_inputs">
        <br>
        <input  name="mileage" placeholder="Mileage" value="" class = "add_inputs">
        <br>
        <input name="image"  placeholder="Image" value="" class = "add_inputs">
        <br>
        <input type="submit" value="Add Car" id = "add_submit">
        </form>
        </div>



        </body>
        </html>
        <?php
        parent::displayFooter();
        //header("Location: index.php");

    }
}

class RequiredValueException extends Exception
{
    //leave it empty simply reuse features in the parent class.
}

class DataTypeException extends Exception
{
    public function __construct($in_type, $in_expected)
    {
        parent::__construct("<br><br><br><p style=\"color:red\">Invalid data type: <br>
                        Expected: $in_expected<br>
                        Received: $in_type
                        </p>");
    }
}