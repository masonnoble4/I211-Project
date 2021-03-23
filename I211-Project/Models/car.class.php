<?php
/**
 * Author: Mason Noble
 * Date: 11/19/2019
 * File: car.class.php
 * Description:
 */

class Car
{

    //private properties of a Car object
    private $id, $make, $model, $price, $year, $color, $mileage, $image, $rating;

    //the constructor that initializes all properties
    public function __construct($make, $model, $price, $year, $color, $mileage, $image, $rating) {
        $this->make = $make;
        $this->model = $model;
        $this->price = $price;
        $this->year = $year;
        $this->color = $color;
        $this->mileage = $mileage;
        $this->image = $image;
        $this->rating = $rating;
    }

    //get the id of a car
    public function getId() {
        return $this->id;
    }

    //get the make of car
    public function getMake() {
        return $this->make;
    }

    //get the model of a car
    public function getModel() {
        return $this->model;
    }

    //get the price of a car
    public function getPrice() {
        return $this->price;
    }

    //get the year of a car
    public function getYear() {
        return $this->year;
    }

    //get the color of a car
    public function getColor() {
        return $this->color;
    }

    //get the mileage of a car
    public function getMileage() {
        return $this->mileage;
    }

    //get the image file name of a car
    public function getImage() {
        return $this->image;
    }

    //set car id
    public function setId($id) {
        $this->id = $id;
    }

    public function getRating(){
        return $this->rating;
    }

}