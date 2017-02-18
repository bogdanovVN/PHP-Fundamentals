<form method="get">
    <div>
        Starting index:
        <input type="text" name="startNumber">
        End:
        <input type="text" name="finalNumber">
        <input type="submit" name="calculate" value="Calculate">
    </div>
</form>
<?php
if (isset($_GET['calculate'])){
    $startNumber = $_GET['startNumber'];
    $finalNumber = $_GET['finalNumber'];
    for ($numToCheck = $startNumber; $numToCheck <= $finalNumber; $numToCheck++){
        $isPrime = true;
        for ($j = 2; $j <= intval(sqrt($numToCheck)); $j++){
            if ($numToCheck % $j == 0){
                $isPrime = false;
            }
        }
        if ($isPrime){
            echo "<strong>{$numToCheck}</strong>, ";
        } else {
            echo "{$numToCheck}, ";
        }
    }
}