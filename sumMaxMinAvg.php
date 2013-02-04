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
    // is filename provided
    if(!empty($_SERVER['argv'][1])) {
        // check is intonly mode
        $intOnly = (!empty($_SERVER['argv'][2]) && $_SERVER['argv'][2] == '--int') ? true : false;
        Calculator::setIntOnly($intOnly);
        
        // inititate Calculator and process input
        $calculator = new Calculator($_SERVER['argv'][1]);
        $calculator->processInput();
        
    } else {
        throw new InvalidArgumentException('No input file provided!');
    }
} catch(InvalidArgumentException $e) {
    echo "\n\n" . 
         'ERROR: ' . $e->getMessage() . "\n\n";
    echo 'Usage instruction: ' . 
         "\n\n" . 
         'To accept all numeric values, including float:' . 
         "\n" . 
         '# php sumMaxMinAvg.php /Path/To/Operations/File.txt' .
         "\n" . 
         '# php sumMaxMinAvg.php "/Path/To/Operations/File.txt"' . 
         "\n\n". 
         'To accept only integer values:' . 
         "\n" . 
         '# php sumMaxMinAvg.php /Path/To/Operations/File.txt --int' .
         "\n" . 
         '# php sumMaxMinAvg.php "/Path/To/Operations/File.txt"  --int' . 
         "\n\n";
}
?>