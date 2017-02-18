<form method="get">
    <input type="text" name="elements" >
    <input type="submit" >
</form>
<?php
if (isset($_GET['elements'])) {
    $input = explode(",", $_GET['elements']);
    $elementsCount = count($input);
    for ($i = 0; $i < $elementsCount; $i++) {
        echo $input[$i] . " " . $input[$elementsCount - 1 - $i];
        echo "<br>";
    }
}