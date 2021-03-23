<?php
/**
 * Author: Mason Noble
 * Date: 12/1/2019
 * File: config.php
 * Description:
 */

//error reporting level: 0 to turn off all error reporting; E_ALL to report all
error_reporting(E_ALL);

//local time zone
date_default_timezone_set('America/New_York');

//base url of the application
define("BASE_URL", "http://localhost/I211/I211FINALPROJECTDRAFT3-master/Draft2");

/*************************************************************************************
 *                       settings for cars                                         *
 ************************************************************************************/

//define default path for media images
define("CAR_IMG", "www/img/");