<?php
if (isset($_GET['input'])) {
    $inputText = strtolower($_GET['input']);
    $inputText = preg_replace('/[\s,\W,\d]+/', ' ', $inputText); //Замествам всички символи различни от букви с интервал
    $inputText = trim($inputText); //Използвам тази функция, за да премахна всички ненужни интервали, включително и този в края на стринга.
    $inputArray = explode(" ", $inputText);
    $outputArray = array_count_values($inputArray);
    ?>
    <table border='2'>
    <?php foreach ($outputArray as $key => $value) {?>
        <tr><td><?= $key;?></td><td><?= $value;?></td></tr>
    <?php };?>
    </table>
    <?php } ?>