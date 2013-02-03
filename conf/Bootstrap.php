<?php
/*
 * Bootstrap 
 * Loads files used by sumMinMaxAvg
 *
 * Used also by PHPUnit
 */
 
 include_once('AutoLoader.php');
 
 $dirs = array(dirname(__FILE__) . '/../models',
               dirname(__FILE__) . '/../views',
			   dirname(__FILE__) . '/../cli');
			   
 // Register the directories
 AutoLoader::registerDirectory($dirs);
 
?>