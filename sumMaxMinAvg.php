<?php
/**
 * @author Ida Rolek <ida@immedio.co.uk>
 *
 * Command Line tool to parse file and perform math operations on provided values.
 *
 * @sample:
 *     # php sumMaxMinAvg.php /Path/To/Operations/File.txt
 *     # php sumMaxMinAvg.php "/Path/To/Operations/File.txt"
 *
 */
 
require_once 'conf/Bootstrap.php';

// check is it run from command line 
if (php_sapi_name() != 'cli') {
    die('Must run from command line');
}

try {
    if(!empty($_SERVER['argv'][1])) {
        $calculator = new Calculator($_SERVER['argv'][1], array('SUM', 'MIN', 'MAX', 'AVERAGE'));
        $calculator->processInput();
    } else {
        throw new InvalidArgumentException('No input file provided!');
    }
} catch(InvalidArgumentException $e) {
    echo 'ERROR: ' . $e->getMessage() . "\n\n";
    echo 'Usage instruction: ' . 
         "\n\n" . 
         '# php sumMaxMinAvg.php /Path/To/Operations/File.txt' .
         "\n" . 
         '# php sumMaxMinAvg.php "/Path/To/Operations/File.txt"' . 
         "\n\n";
}
?>