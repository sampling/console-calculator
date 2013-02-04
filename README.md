console-calculator
==================

Basic command line calculator: MIN, MAX, SUM, AVERAGE operations

Sample usage, accepts all numeric values:

     # php sumMaxMinAvg.php /Path/To/Operations/File.txt
     # php sumMaxMinAvg.php "/Path/To/Operations/File.txt"
     
Sample usage, accepts only int values:

     # php sumMaxMinAvg.php /Path/To/Operations/File.txt --int
     # php sumMaxMinAvg.php "/Path/To/Operations/File.txt" --int

Input File
==================

Expected input file format:

     OPERATIONNAME: val, val, val
     OPERATIONNAME: val, val, val

Sample:

     SUM: 1, 2, 8
     MIN: 9, 10, -1
     AVERAGE: 13, 21, 8
