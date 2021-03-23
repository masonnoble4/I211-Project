<?php
/**
 * Author: Karen Bonilla
 * Date: 11/19/2019
 * File: car_controller.class.php
 * Description:
 */

class CarController
{
    private $car_model, $add_car, $delete_car, $update_car;

    public function __construct()
    {
        $this->car_model = CarModel::getCarModel();

   /*     $this->car_model = new CarModel();
        $this->add_car = new AddCar();
        $this->delete_car = new DeleteCar();
        $this->update_car = new UpdateCar();*/
    }

    //display list cars form
    public function index()
    {
      /*  $listCars = new CarModel();
        $listCars->list_car()->display();*/
        $cars = $this->car_model->list_car();
        //$listCars->display();

        if (!$cars) {
            //display an error
            $message = "There was a problem displaying the cars.";
            $this->error($message);
            return;
        }

        // display all cars
        $view = new ListCars();
        $view->display($cars);
    }

    //show details of car
    public function detail($id) {
        //get the details of the car
        $car = $this->car_model->view_car($id);

        /*if(!$car)
        {
            $message = "There was a problem displaying movie details";
            $this->error($message);
            return;
        }*/

        //display the movie
        $view = new CarDetail();
        $view->display($car);

    }


    //adds car to database if necessary when add car
    public function checkCar()
    {
        $return_car = $this->car_model->add_car();
        if($return_car)
        {
            $this->add_car->display("Car was added successfully.");
        }
        else
        {
            $this->add_car->display("Car could not be added.");
        }
    }

    //displays car information to delete
    public function delete($id)
    {
        //echo $id;
        $delete = $this->car_model->delete($id);

        $view = new WelcomeIndex();
        $view->display();
        return $delete;
    }

    public function do_delete()
    {
        $return_delete = $this->car_model->delete_car();
        if($return_delete)
        {
            $this->delete_car->display("Car deleted successfully.");
        }
        else
        {
            $this->delete_car->display("Car could not be deleted.");
        }
    }

    //displays car information editing form
    public function edit($id)
    {
        //get the details of the car
        $car = $this->car_model->view_car($id);

        /*if(!$car)
        {
            $message = "There was a problem displaying car details";
            $this->error($message);
            return;
        }*/

        $edit = new EditCar();
        $edit->display($car);
    }

    //actually edits/updates car information
    public function update($id,$make, $model, $price, $year, $color, $mileage, $image)
    {
        $editRecord = $this->car_model->update_car($id,$make,$model,$price,$year,$color,$mileage,$image);


        return $editRecord;

    }

    //search cars
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);
        //echo $query_terms;

        //if search term is empty, list all cars
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching movies
        $cars = $this->car_model->search_car($query_terms);


        if ($cars === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched movies
        $search = new CarSearch();
        $search->display($query_terms, $cars);
    }


    //connected to the autosuggestion feature
    public function suggest($terms){
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $cars = $this->car_model->search_car($query_terms);
        //retrieve all movie titles and store them in an array
        $titles = array();
        if ($cars) {
            foreach ($cars as $car) {
                $titles[] = $car->getModel();
            }
        }

        echo json_encode($titles);
    }
    //adds car to database if necessary when add car
    public function addCar($make,$model,$price,$year,$color,$mileage,$image)
    {
        //echo $make;
        //echo $make;
        //echo $model;
        $addRecord = $this->car_model->addCar($make,$model,$price,$year,$color,$mileage,$image);


        return $addRecord;


    }
    public function displayaddCar(){
        $view = new AddCar();
        $view->display();
    }
    //provides custom error page. Sent to view.
    public function error($message)
    {
        $error = new CarError();
        $error->display($message);
    }
    //displays rating forms
    public function displayleaveRating($id){

        $view = new AddRating();
        $view->display($id);
    }

    //adds the rating to the database
    public function addRating($id,$num_stars, $email){
        $addRate = $this->car_model->addRating($id,$num_stars,$email);
        return $addRate;
    }
}