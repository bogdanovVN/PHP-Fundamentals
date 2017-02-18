<form method="get">
    <input type="text" name="elements" />
    <input type="submit">
</form>
<?php
$input = explode(",", $_GET['elements']);
if (isset($_GET['elements'])) {
    $biggestNum = $matrix[0][0];
    foreach ($matrix as $row) {
        foreach ($row as $column) {
            if ($column > $biggestNum) {
                $biggestNum = $column;
            }
        }
    }
    echo $biggestNum;
}
?>