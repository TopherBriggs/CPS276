<?php

class Directories{

    private $filePath;
    private $content;

    public function makeFiles()
    {
        
        $filePath = "/var/www/html/directories/".$_POST["name"];
        $content = $_POST["contents"];
        
        if (file_exists($filePath)) //checks to make sure file doesn't already exist
        {
            return false;
        }
        
        mkdir($filePath, 0777);
        $handle = fopen($filePath."/readme.txt", "w");
        
        fwrite($handle, $content);
        fclose($handle);
        return true;
    }

    //returns path to readme.txt in newly created directory
    public function linkFiles()
    {
        $filePath = "/directories/".$_POST["name"];

        return $filePath."/readme.txt";
    }

}


?>