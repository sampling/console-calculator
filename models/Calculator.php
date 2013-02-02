<?php
    
	class Calculator {

	    // Name of input file with operations
	    protected $fileName;
		
        public function __construct($fileName = '') {
			$this->setFileName($fileName);
        }
		
		public function setFileName($fileName) {
		    if (is_string($fileName) && is_file($fileName)) {
				return $this->fileName;
			} else {
				throw new InvalidArgumentException('Incorrect input file name provided!');
			}
		}		

        public function getFileName() {
            return $this->fileName;
		}		
	
	}
?>