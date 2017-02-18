<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Text Colorer</title>
</head>
<body>
<form>
    <div>
        <textarea name="input" rows="1" cols="50" required></textarea>
    </div>
    <div>
        <input type="submit" value="Color text" name="colorBtn">
    </div>
</form>

<?php
if (isset($_GET['input'])) {
    $input = explode(" ", $_GET['input']);
    $input = implode('', $input);    // implode — Join array elements with a string
    $letters = str_split($input);    // str_split — Convert a string to an array
    $output = '';
    foreach ($letters as $letter) {
        $asciiVal = ord($letter);    // ord — Return ASCII value of character
        if ($asciiVal % 2 == 0) {
            $output .= "<font color='red'>{$letter} </font>";
        } else {
            $output .= "<font color='blue'>{$letter} </font>";
        }
    }
    echo trim($output);
}
?>
</body>
</html>