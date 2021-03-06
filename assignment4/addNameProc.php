<?php
class AddNamesProc
{
    private $output;
    private $listNames;

    public function addClearNames()
    {
        $name;
        $listNames = $_POST["nameList"];
        $name = $_POST["name"];
        $listNames = explode("\n", $listNames);

        //reorders first and last name of the inputted name
        $arr = explode(" ", $name);
        $name = $arr[1].", ".$arr[0];

        //add new name to the array and sort
        array_push($listNames, $name);
        sort($listNames);

        //returns a string version of array with each element on new line
        return implode($listNames, "\n");
    }
}

?>