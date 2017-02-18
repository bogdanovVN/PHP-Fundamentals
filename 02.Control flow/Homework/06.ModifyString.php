<form method="get">
    <div>
        <input type="text" name="inputString">
        <input type="radio" name="modify" value="palindrome">Check Palindrome
        <input type="radio" name="modify" value="reverse">Reverse String
        <input type="radio" name="modify" value="split">Split
        <input type="radio" name="modify" value="hash">Hash String
        <input type="radio" name="modify" value="shuffle">Shuffle String
        <input type="submit" name="submit" value="Submit">
    </div>
</form>
<?php
if (isset($_GET['submit'])){
    $inputString = $_GET['inputString'];
    $modifyCommand = $_GET['modify'];
    $outputString = "";
    switch ($modifyCommand){
        case 'palindrome':
            $strRev = strrev($inputString);
            if (strtolower($inputString) == strtolower($strRev)){
                echo "{$inputString} is a palindrome.";
            } else {
                echo "{$inputString} is not a palindrome!";
            }
            break;
        case 'reverse':
            $outputString = strrev($inputString);
            echo $outputString;
            break;
        case 'split':
            $splitInput = preg_split("/[\s,-]+/", $inputString);
            foreach ($splitInput as $letter){
                $outputString .= $letter;
            }
            echo $outputString;
            break;
        case 'hash':
            $outputString = hash("sha256", $inputString);
            echo $outputString;
            break;
        case 'shuffle':
            $array = str_split($inputString);
            shuffle($array);
            foreach ($array as $letters){
                echo $letters;
            }
            break;
    }
}