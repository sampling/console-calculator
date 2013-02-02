<?php
/*
 * @author Ida Rolek <ida@immedio.co.uk>
 *
 *
 * PHPUnit test suite configuration at /tests/phpunit.xml
 * 
 */
class CalculatorTest extends PHPUnit_Framework_TestCase
{
    protected $calculator;
	
	/**
     * @expectedException InvalidArgumentException
     */
    public function testCreateCalculatorWithoutFilename() {
	    $this->calculator = new Calculator();
    }

}

?>