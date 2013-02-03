<?php
/**
 * @author Ida Rolek <ida@immedio.co.uk>
 *
 * 
 * Sample invocations:
 *
 *     # php sumMaxMinAvg.php /Path/To/Operations/File.txt
 *     # php sumMaxMinAvg.php "/Path/To/Operations/File.txt"
 *
 */
 
 require_once 'conf/Bootstrap.php';
 
 $arguments = $_SERVER['argv'];
 
 $calculator = new Calculator($arguments[1], array('SUM', 'MIN', 'MAX', 'AVERAGE'));
 $calculator->processInput();
?>