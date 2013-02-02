<?php
require_once "../PHPUnit/Framework/MockObject/Autoload.php";
require_once "../../models/Calculator.php";

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    protected $calculator;
	
	/**
     * @expectedException InvalidArgumentException
     */
    public function testCreateCalculatorWithoutFilename() {
    }

}

?>