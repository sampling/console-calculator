<?php
/*
 * @author Ida Rolek <ida@immedio.co.uk>
 *
 *
 * PHPUnit test suite configuration at /tests/phpunit.xml
 * 
 */
class SumMaxMinAvgTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @requires PHP 5.3
	 */
	public function testConsoleCallWithNoFileName() {
		exec('php ' . dirname(__FILE__) . '/../sumMaxMinAvg.php', $output, $result);
		$this->assertContains('ERROR: No input file provided!', $output);
	}
	
	public function testConsoleCallWithInorrectFileName() {
		exec('php ' . dirname(__FILE__) . '/../sumMaxMinAvg.php fixtures/inputWrong.txt', $output, $result);
		$this->assertNotContains('ERROR: No input file provided!', $output);
		$this->assertContains('Usage instruction:', $output);
	}

	public function testConsoleCallWithCorrectFileName() {
		exec('php ' . dirname(__FILE__) . '/../sumMaxMinAvg.php fixtures/inputSimple.txt', $output, $result);
		$this->assertNotContains('ERROR: No input file provided!', $output);
		$this->assertNotContains('Usage instruction: ', $output);
	}
}