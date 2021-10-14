<?php
    Class Calculator {
        public function calc(string $op = null,$arg1 = null,$arg2 = null){
            try{
                if ($op === null || $arg1 === null || $arg2 === null){
                    throw new ArgumentCountError();
                }
                switch($op){
                    case "+":
                        echo("The sum of the numbers is " . $arg1 + $arg2 . ".");
                        break;
                    case "-":
                        echo("The difference of the numbers is " . $arg1 - $arg2 . ".");
                        break;
                    case "*":
                        echo("The product of the numbers is " . $arg1 * $arg2 . ".");
                        break;
                    case "/":
                        echo("The quotient of the numbers is " . $arg1 / $arg2 . ".");
                        break;
                }
            } catch (DivisionByZeroError $err){
                echo("Cannot divide by zero.");
            } catch (ArgumentCountError $err){
                echo("You must enter a string and two numbers.");
            }

            echo("<br>");
        }
    }

?>