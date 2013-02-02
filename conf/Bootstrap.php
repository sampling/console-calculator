<?php
/*
 * Bootstrap 
 * Loads files used by sumMinMaxAvg
 *
 * Used also by PHPUnit
 */
 
 include_once('AutoLoader.php');
 
 $dirs = array('../models',
               '../views',
			   '../cli');
			   
 // Register the directories
 AutoLoader::registerDirectory($dirs);
 
?>