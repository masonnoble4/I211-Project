<?php
/**
 * Author: Mason Noble
 * Date: 12/13/2019
 * File: add_rating.class.php
 * Description:
 */

class AddRating extends HomeHeader
{

    public function display($id){
        parent::displayHeader('Leave a rating');

        if(isset($_POST['stars']) && isset($_POST['email'])){
                try{
                $num_stars = $_POST['stars'];
                if(trim($num_stars) ==""){
                    throw new Error("Missing input in stars field");
                }
                if(!is_numeric($num_stars)){
                    throw new Error("Stars must must an integer");
                }
                //echo $num_stars;
                $email = $_POST['email'];
                if(trim($email) ==""){
                    throw new Error("Missing input in email field");
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    throw  new Error("Enter a valid email");
                }
                //echo $email;
                //echo $id;


                $addRate = new CarController();
                echo "<br><br><br><br><br><br><p style='color: red'>Successful record insertion</p>";
                $addRate->addRating($id, $num_stars, $email);
            }catch (Error $e){
                $message = $e->getMessage();
                echo "<br><br><br><br><br><br><p style='color: red'>$message</p>";
            }
        }
        ?>

        <div id = addRating style="display: block; padding: 60px 3px 40% 40%;" ">
        <form method="POST" action="">
            <br>
            <input name="stars" placeholder="Number of stars" value="">
            <br>
            <input  name="email" placeholder="Email" value="">
            <br>
            <input type="submit" value="Add Rating">
        </form>
        </div>

<?php
        parent::displayFooter();
    }
}