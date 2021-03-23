<?php
/**
 * Author: Mason Noble
 * Date: 11/19/2019
 * File: car_model.class.php
 * Description:
 */

class CarModel
{

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblCar;
    private $tblCarRating;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getCarModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblCar = $this->db->getCarTable();
        $this->tblCarRating = $this->db->getCarRatingTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        /*//initialize book categories
        if (!isset($_SESSION['book_categories'])) {
            $categories = $this->get_book_categories();
            $_SESSION['book_categories'] = $categories;
        }*/

        //initialize car ratings
        if (!isset($_SESSION['car_ratings'])) {
            $ratings = $this->get_car_ratings();
            $_SESSION['car_ratings'] = $ratings;
        }
    }

    //static method to ensure there is just one CarModel instance
    public static function getCarModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new CarModel();
        }
        return self::$_instance;
    }

    public function addCar($make,$model,$price,$year,$color,$mileage,$image){
        //echo $make;
    try {

        $sql = "INSERT INTO cars (make, model, price, year, color, mileage, image) VALUES(" . "'$make'" . "," . "'$model'" . "," . $price . "," . $year . "," . "'$color'" . "," . $mileage . "," . "'$image'" . ")";

        //echo $sql;
        $query = $this->dbConnection->query($sql);
        //header("Location: index.php");

        // if the query failed, return false.
        if (!$query) {
            throw new Error("Error encountered with the database");
        } else {
            return true;

        }
    }catch (Error $e){
        $message = $e->getMessage();
        echo "<br><br><br><br><br><br><p style='color: red'>$message</p>";
    }
    }


    public function list_car() {

        //$sql = "SELECT * FROM " . $this->tblCar;
        $sql = "SELECT cars.*, AVG(car_ratings.num_stars) as rating FROM cars LEFT JOIN car_ratings ON cars.id = car_ratings.cars_id GROUP by cars.id";
        //echo $sql;
        try {
            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query failed, return false.
            if (!$query)
                throw new Error("Error encountered with the database");


            //if the query succeeded, but no car was found.
            if ($query->num_rows == 0)
                return 0;

            //handle the result
            //create an array to store all returned cars
            $cars = array();
            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {
                $car = new Car(stripslashes($obj->make), stripslashes($obj->model), stripslashes($obj->price), stripslashes($obj->year), stripslashes($obj->color), stripslashes($obj->mileage), stripslashes($obj->image), stripslashes($obj->rating));
                //set the id for the book
                //echo $book->getTitle();
                $car->setId($obj->id);
                //echo $car->getRating();
                //add the car into the array
                $cars[] = $car;
            }
            return $cars;
        }catch (Error $e) {
            //echo $e;
            return $e;
        }

    }

    public function view_car($id) {
        //the select sql statement

        try {


            $sql = "SELECT * FROM " . $this->tblCar . " WHERE " . $this->tblCar . ".id='$id'";

            //execute the query
            $query = $this->dbConnection->query($sql);

            if ($query && $query->num_rows > 0) {
                $obj = $query->fetch_object();

                //create a car object
                $car = new Car(stripslashes($obj->make), stripslashes($obj->model), stripslashes($obj->price), stripslashes($obj->year), stripslashes($obj->color), stripslashes($obj->mileage), stripslashes($obj->image), stripslashes($obj->rating));
                //set the id for the book
                $car->setId($obj->id);

                return $car;
            }else{
                throw new Error("Error encountered with database");
            }
        }catch (Error $e){
            $message = $e->getMessage();
            echo "<br><br><br><br><br><br><p style='color: red'>$message</p>";
        }
        return false;
    }

    //search the database for cars that match words in titles. Return an array of cars if succeed; false otherwise.
    public function search_car($terms) {
        //echo $terms;
        try {
            $terms = explode(" ", $terms); //explode multiple terms into an array
            //select statement for AND search
            /*$sql = "SELECT * FROM " . $this->tblCar . "," . $this->tblCarRating.
                " WHERE " . $this->tblCar . ".id=" . $this->tblCarRating . ".id AND (1";

            foreach ($terms as $term) {
                $sql .= " AND model LIKE '%" . $term . "%'";
            }



            $sql .= ")";*/
            //echo "START SQL";
            $sql = "SELECT cars.*, AVG(car_ratings.num_stars) as rating FROM cars LEFT JOIN car_ratings ON cars.id = car_ratings.cars_id WHERE ";
            $termCount = 0;
            foreach ($terms as $term) {
                if ($termCount == 0) {
                    $sql .= $this->tblCar . ".model like '%" . $term . "%' or " . $this->tblCar . ".make like '%" . $term . "%'";
                } else {
                    $sql .= " or " . $this->tblCar . ".model like '%" . $term . "%' or " . $this->tblCar . ".make like '%" . $term . "%'";
                }
                $termCount += 1;
            }


            $sql .= " GROUP by cars.id";
            //echo $sql;
            //SELECT cars.*, AVG(car_ratings.num_stars) as rating FROM cars LEFT JOIN car_ratings ON cars.id = car_ratings.cars_id GROUP by cars.id;

            //echo "END SQL";

            //execute the query
            $query = $this->dbConnection->query($sql);

            // the search failed, return false.
            if (!$query)
                throw new Error("Error encountered with database");

            //search succeeded, but no car was found.
            if ($query->num_rows == 0)
                return 0;

            //search succeeded, and found at least 1 car found.
            //create an array to store all the returned cars
            $cars = array();

            //loop through all rows in the returned record sets
            while ($obj = $query->fetch_object()) {
                $car = new Car($obj->make, $obj->model, $obj->price, $obj->year, $obj->color, $obj->mileage, $obj->image, $obj->rating);

                //set the id for the movie
                $car->setId($obj->id);

                //add the movie into the array
                $cars[] = $car;
            }
            return $cars;
        }catch (Error $e){
            $message = $e->getMessage();
            echo "<br><br><br><br><br><br><p style='color: red'>$message</p>";
        }
    }

    //get all car ratings
     private function get_car_ratings() {
        try {
            $sql = "SELECT * FROM " . $this->tblCarRating;

            //execute the query
            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new Error("Error encountered with database");
            }

            //loop through all rows
            $ratings = array();
            while ($obj = $query->fetch_object()) {
                $ratings[$obj->num_stars] = $obj->id;
            }
            return $ratings;
        }catch (Error $e){
            $message = $e->getMessage();
            echo "<br><br><br><br><br><br><p style='color: red'>$message</p>";
        }
    }


    //the update_car method updates an existing car in the database. Details of the car are posted in a form. Return true if succeed; false otherwise.
    public function update_car($id,$make,$model,$price,$year,$color,$mileage,$image) {
        //echo $id;
            //echo $make;
        try {
            $sql = "Update cars set make= '$make', model= '$model', price='$price', year='$year', color='$color', mileage='$mileage', image='$image' WHERE id='$id'";

            //echo $sql;

            //echo $sql;
            $query = $this->dbConnection->query($sql);


            // if the query failed, return false.
            if (!$query) {
                throw new Error("Error encountered with database");
            } else {
                //header("Location:".BASE_URL/car/index);
                return true;

            }
        }catch (Error $e){
            $message = $e->getMessage();
            echo "<br><br><br><br><br><br><p style='color: red'>$message</p>";
        }
    }

    public function addRating($id,$num_stars, $email){
        //echo $id;
        //echo $num_stars;
        //echo $email;
        try {
            $sql = "INSERT into car_ratings (num_stars, cars_id, email) VALUES (" . "'$num_stars'" . "," . "'$id'" . "," . " '$email'" . ")";
            //echo $sql;
            $query = $this->dbConnection->query($sql);
            // if the query failed, return false.
            if (!$query) {
                throw new Error("Error encountered with database");
            } else {
                //header("Location:".BASE_URL/car/index);
                return true;

            }
        }catch (Error $e){
            $message = $e->getMessage();
            echo "<br><br><br><br><br><br><p style='color: red'>$message</p>";
        }
    }
    //allows the deletion of cars from the database
    public function delete($id){
        //DELETE from cars WHERE cars.id = 12
        try {
            $sql = "DELETE from cars where  cars.id = " . $id;

            $query = $this->dbConnection->query($sql);


            // if the query failed, return false.
            if (!$query) {
                throw new Error("Error encountered with the database");
            } else {
                //header("Location:".BASE_URL/car/index);
                return true;

            }
        }catch (Error $e){
            $message = $e->getMessage();
            echo "<br><br><br><br><br><br><p style='color: red'>$message</p>";
        }
    }
}