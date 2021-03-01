<?php
class Calculator{

    public function calc($operator = NULL, $num1 = NULL, $num2 = NULL)
    {
        if(!is_string($operator) || !is_int($num1) || !is_int($num2))    //checks to make sure all the varibles are the correct type
        {
            return "You must enter a string and two numbers<br>";
        }

        switch($operator)
        {
            case "+":
                return "The sum of the numbers is ".($num1 + $num2)."<br>";
            case "-":
                return "The difference of the numbers is ".($num1 - $num2)."<br>";
            case "*":
                return "The product of the numbers is ".($num1 * $num2)."<br>";
            case "/":
                if($num2 == 0)
                {
                    return "Cannot divide by zero <br>";
                }
                return "The division of the numbers is ".($num1 / $num2)."<br>";
            default:
                return $operator." is not a valid operator<br>";
        }
    }
}

?>